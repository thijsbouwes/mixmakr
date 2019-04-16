<?php

namespace App\Http\Controllers;

use App\Http\Requests\MollieWebhookRequest;
use App\Order;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;

class MollieWebhookController extends Controller
{
    public function handle(MollieWebhookRequest $request)
    {
        Log::info("whats up");
        $molliePayment = Mollie::api()->payments()->get($request->get('id'));
        $order         = Order::where('payment_external_id', $request->get('id'))->firstOrFail();

        if ($molliePayment->isPaid()) {
            $order->update(['status' => 'pending']);
        } else if($molliePayment->isCanceled() || $molliePayment->isExpired()) {
            $order->update(['status' => 'cancelled']);
        } else {
            Log::info("not found status");
        }

        return response()->json();
    }
}
