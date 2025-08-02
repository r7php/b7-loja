<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class PayController extends Controller
{

    public function index(Request $request){
        return view('checkout');
    }

    public function createSession(Request $request){
        $valorFinal = $request->valorVal;
        $nomePro = $request->nomePro;

        Stripe::setApiKey(env('STRIPE_SECRET'));
        //http://127.0.0.1:8000/pagamento-sucesso
        $session = Session::create([
            'payment_method_types' => ['card'], // Se habilitado no painel Stripe
            'line_items' => [[
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => "$nomePro",
                    ],
                    'unit_amount' => $valorFinal, // R$50,00 (em centavos)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('pagamento.sucesso') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('pagamento.cancelado'),
        ]);
       // dd($session);
        // Retorna a URL da sessão para redirecionar o usuário
        return response()->json(['url' => $session->url]);

    }
}
