<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class UserOrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function store()
    {
        // dd(\request()->all());

        $user = Auth::id();
        // dd($user);
        $user_obj = User::find($user);
        // dd($user_obj);


        $comment = \request()->get("comment");
        $product_id = \request()->get("productID");
        $quantity = \request()->get("quantity");

        if ($user_obj->role == "admin") {
            $userID = \request()->get("userID");
            \request()->validate([
                'quantity' => 'required|array|min:1',
                'userID' => 'required|not_regex:/^[a-zA-Z\s]*$/',
            ], [
                "quantity.required" => "no items",
                "userID.required" => "no user selected",
                "userID.not_regex" => "no users selected",
            ]);
        } else {
            $userID = $user;
            \request()->validate([
                'quantity' => 'required|array|min:1',

            ], [
                "quantity.required" => "no items",

            ]);
        }
        // dd($products);


        $orderTotalPrice = 0;
        for ($i = 0; $i < count($product_id); $i++) {
            $products = Product::findorfail($product_id[$i]);
            $orderTotalPrice = $orderTotalPrice + ($products->price * $quantity[$i]);
        }

        $order = new Order();
        $order->comment = $comment;
        $order->totalPrice = $orderTotalPrice;
        $order->user_id = $userID;

        $order->save();
        for ($i = 0; $i < count($product_id); $i++) {
            $order->product()->attach([$product_id[$i] => ['quantity' => $quantity[$i]]]);
        }
        // $order->product()->attach([3 => ['quantity' => 1], 4 => ['quantity' => 2], 5 => ['quantity' => 3]]);
        // dd($order);
        if ($user_obj->role == "admin") {
            $order->paied = 'true';
            $order->save();
            session()->flash('success', 'Order added successfully.');
            return redirect()->back();
        } elseif ($user_obj->role == "user") {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $productname = "Order";
            $totalprice = $orderTotalPrice;

            $two0 = "00";
            $total = "$totalprice$two0";

            $session = \Stripe\Checkout\Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'USD',
                            'product_data' => [
                                "name" => $productname,
                            ],
                            'unit_amount'  => $total,
                        ],
                        'quantity'   => 1,
                    ],

                ],
                'mode'        => 'payment',
                'success_url' => route('success', $order->id),
                'cancel_url'  => route('checkOut'),
            ]);
            return redirect()->away($session->url);
        }
    }
}
