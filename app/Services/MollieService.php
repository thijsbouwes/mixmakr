<?php

namespace App\Services;
use Mollie\Laravel\Facades\Mollie;

class MollieService
{
    static public function createPayment($amount, $orderId)
    {
        // Create payment
        $molliePayment = Mollie::api()->payments()->create([
            'amount'      => [
                'currency' => 'EUR',
                'value'    => (string) number_format($amount, 2)
            ],
            'webhookUrl'  => 'http://5d0b4cf0.ngrok.io/webhooks/mollie', //route('webhooks.mollie'),
            'redirectUrl' => "http://5d0b4cf0.ngrok.io/orders/$orderId/status", //route('order.status', ['order' => $orderId]),
            'description' => config('app.name') . " order " . $orderId
        ]);

        return $molliePayment->id;
    }

    static public function getPaymentUrl($molliePaymentId)
    {
        // Fetch payment
        $payment = Mollie::api()->payments()->get($molliePaymentId);

        return $payment->getCheckoutUrl();
    }
}