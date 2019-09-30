<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Events\OrderUpdated;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderDrinkStatus;
use App\Order;
use App\Services\MollieService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::user()->id) {
            throw new ModelNotFoundException();
        }

        return $order->load(['user', 'machine', 'drinks']);
    }

    public function store(StoreOrderRequest $storeOrderRequest)
    {
        $orderedDrinks = collect($storeOrderRequest->get('drinks'));
        $drinks        = Drink::whereIn('id', $orderedDrinks->pluck('id')->toArray())->get();
        $totalPrice    = $this->calculatePrice($drinks, $orderedDrinks);

        $order = Order::create([
            'machine_id'          => $storeOrderRequest->get('machine_id'),
            'user_id'             => Auth::user()->id,
            'price'               => $totalPrice
        ]);

        $order->drinks()->sync($orderedDrinks->keyBy('id')->map(function ($drink) {
            return [
                'quantity' => $drink['quantity']
            ];
        })->toArray());

        // Create payment
        $order->update([
            'payment_external_id' => MollieService::createPayment($totalPrice, $order->id)
        ]);

        return $order;
    }

    public function startPayment(Order $order)
    {
        $paymentUrl = MollieService::getPaymentUrl($order->payment_external_id);

        return redirect($paymentUrl, Response::HTTP_SEE_OTHER);
    }

    public function updateDrinkStatus(UpdateOrderDrinkStatus $orderDrinkStatus, Order $order, Drink $drink)
    {
        $status     = $orderDrinkStatus->get('status');
        $orderDrink = $order->drinks->find($drink->id);
        $data       = [
            'status' => $status
        ];

        if ($status === 'complete' && $orderDrink->pivot->quantity_complete < $orderDrink->pivot->quantity) {
            $data['quantity_complete'] = $orderDrink->pivot->quantity_complete + 1;
        }

        $order->drinks()->updateExistingPivot($drink->id, $data);
        event(new OrderUpdated($order));
    }

    private function calculatePrice($drinks, $orderedDrinks)
    {
        return $orderedDrinks->reduce(function ($prevTotal, $orderedDrink) use ($drinks) {
            $drink = $drinks->firstWhere('id', '=', $orderedDrink['id']);

            return $prevTotal + $drink->price * $orderedDrink['quantity'];
        });
    }
}
