<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Events\OrderUpdated;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderStatus;
use App\Ingredient;
use App\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::user()->id) {
            throw new ModelNotFoundException();
        }

        return $order->load(['user', 'drink']);
    }

    public  function index()
    {
        $orders = Order::where('status', Order::PENDING)->with(['drink.ingredients'])->get();
        $cancelCurrent = Cache::pull('cancel-order', false);

        return [
            'orders' => $orders,
            'cancel-current' => $cancelCurrent
        ];
    }

    public function store(StoreOrderRequest $storeOrderRequest)
    {
        $drink = Drink::with('ingredients')->findOrFail($storeOrderRequest->get('drink_id'));

        // Check if ingredients are in stock
        if ($drink->inStock === false) {
            return response()->json(['message' => 'Out of stock'], Response::HTTP_BAD_REQUEST);
        }

        // Create order
        $order = Order::create([
            'drink_id' => $drink->id,
            'user_id'  => $storeOrderRequest->user()->id,
            'price'    => $drink->price,
            'status'   => Order::PENDING
        ]);

        // Update stock
        $drink->ingredients->map(function (Ingredient $ingredient) {
            $ingredient->update([
                'amount' => $ingredient->amount - $ingredient->pivot->amount
            ]);
        });

        return $order->load(['user', 'drink']);
    }

    public function update(UpdateOrderStatus $orderStatus, Order $order)
    {
        $status = $orderStatus->get('status');

        if ($status) {
            $order->update(['status' => $status]);
        }

        if ($status === Order::CANCELLED) {
            Cache::put('cancel-order', true);
        }

        event(new OrderUpdated($order, $orderStatus->get('message')));

        return $order;
    }
}
