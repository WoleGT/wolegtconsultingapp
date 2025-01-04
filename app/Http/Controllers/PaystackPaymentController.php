<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

class PaystackPaymentController extends Controller
{

    public function index()
    {
        return view('paystack.payment');
    }



    // Initiate Payment
    public function initiatePayment(Request $request)
    {
        $amount = $request->amount * 100; // Paystack uses kobo (cents), so multiply by 100
        $client = new Client();
        $response = $client->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'email' => $request->email,
                'amount' => $amount,
                'callback_url' => route('paystack.callback')
            ]
        ]);

        $result = json_decode($response->getBody());

        if ($result->status) {
            return redirect($result->data->authorization_url);
        }

        return back()->with('error', 'Payment initiation failed.');
    }

    // Callback after payment
    public function handleCallback(Request $request)
    {
        $reference = $request->query('reference');
        $client = new Client();
        $response = $client->get(env('PAYSTACK_PAYMENT_URL') . '/transaction/verify/' . $reference, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
            ]
        ]);

        $result = json_decode($response->getBody());

        if ($result->status) {
            // Handle successful payment (e.g., update database, send email)
            return view('paystack.success', ['data' => $result->data]);
        }

        return view('paystack.error', ['message' => $result->message]);
    }


}