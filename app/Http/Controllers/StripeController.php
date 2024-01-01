<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function checkOut()
    {
        if (Auth::user()) {
            if (Auth::user()->role != "admin") {

                return to_route("indexUser");
            }
            return to_route("adminIndex");
        }
    }
    // public function session(Request $request)
    // {
    //     \Stripe\Stripe::setApiKey(config('stripe.sk'));

    //     $productname = $request->get('productname');
    //     $totalprice = $request->get('total');

    //     $two0 = "00";
    //     $total = "$totalprice$two0";

    //     $session = \Stripe\Checkout\Session::create([
    //         'line_items'  => [
    //             [
    //                 'price_data' => [
    //                     'currency'     => 'USD',
    //                     'product_data' => [
    //                         "name" => $productname,
    //                     ],
    //                     'unit_amount'  => $total,
    //                 ],
    //                 'quantity'   => 1,
    //             ],

    //         ],
    //         'mode'        => 'payment',
    //         'success_url' => route('success'),
    //         'cancel_url'  => route('checkOut'),
    //     ]);

    //     return redirect()->away($session->url);
    // }

    public function success($id)
    {
        $order_obj = Order::find($id);
        if (Auth::user()) {
            if (Auth::user()->role != "admin") {
                $order_obj->paied = 'true';
                $order_obj->save();
                session()->flash('success', 'Order added successfully.');
                return to_route("indexUser");
            }
            return to_route("adminIndex");
        }




        // return to_route("indexUser");


    }
}
