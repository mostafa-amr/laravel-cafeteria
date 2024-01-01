<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class checkController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    protected function index(Request $request)
    {
        $users = User::all();

        $productDetails = DB::table('products')->join('product_order', 'products.id', '=', 'product_order.product_id')->get();


        $orders = Order::all();


        return view('adminView.checks', ["users" => $users, "productDetails" => $productDetails, "orders" => $orders]);
    }

    public function showOrders($user_id, Request $request)
    {

        $order = Order::where('user_id', $user_id)->get();

        return $order;
    }


    public function showProducts($order_id)
    {

        $productDetails = DB::table('products')
            ->join('product_order', 'products.id', '=', 'product_order.product_id')
            ->join('orders', 'product_order.order_id', '=', 'orders.id')
            ->where('orders.id', $order_id)->get();

        return $productDetails;
    }






    function searchByDate(Request $request)
    {



        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $user_id = $request->input('user_id');



        // $orders = Order::query();

        // if ($user_id) {
        //     $orders = $orders->where('user_id', $user_id);
        // }
        // if ($start_date && $end_date) {
        //     $orders = $orders->whereBetween('created_at', [$start_date, $end_date]);
        // }

        // $orders = $orders->get();


        $orders = Order::where('user_id', $user_id)->get();


        $users = User::where('id', $user_id)->get();


        return view('adminView.checks', ['users' => $users, 'orders' => $orders]);
    }
}
