<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;

class orderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $user = Auth::id();


        $order = Order::where('user_id', $user)->get();

        return view('orders.index', ["orders" => $order]);
    }


    public function Test($Order_id)
    {

        $order = Order::find($Order_id);

        // $productNames = $order->products()->pluck('name');


        $productDetails = DB::table('products')
            ->join('product_order', 'products.id', '=', 'product_order.product_id')
            ->join('orders', 'product_order.order_id', '=', 'orders.id')
            ->where('orders.id', $Order_id)->get();



        return $productDetails;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return to_route("orders.index");
    }




    function searchByDate(Request $request)
    {


        $user = auth()->user();
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $orders = Order::where('user_id', $user->id)
            ->whereDate('created_at', [$start_date, $end_date])
            ->get();
        return view('orders.index', compact('orders'));
    }
    function adminManualOrder()
    {

        //$user = Auth()->user();
        // $mytime = date("Y-m-d");

        // $orders = Order::join('users', 'users.id', 'orders.user_id')
        //     ->select('users.name as username', 'orders.*')
        //     ->whereDate('orders.created_at', Carbon::parse($mytime)->format('Y-m-d'))
        //     ->where('orders.paied', 'true')
        //     ->paginate(5);
        $mytime = date("Y-m-d");

        $orders = Order::join('users', 'users.id', 'orders.user_id')
            ->select('users.name as username', 'orders.*')
            ->where('orders.created_at', '>=', Carbon::parse($mytime)->startOfDay())
            ->where('orders.created_at', '<=', Carbon::parse($mytime)->endOfDay())
            ->where('orders.paied', true)
            ->paginate(3);

        foreach ($orders as $order) {
            /*
                $productDetails = Product::join('product_order', 'products.id', '=', 'product_order.product_id')
                                         ->join('orders', 'product_order.order_id', '=', 'orders.id')
                                         ->where('orders.id', $order->id)->get();  
                                         dd($productDetails);
                                         */
        }
        return view('adminView.manualOrder', ['orders' => $orders])->with('i', (request()->input('page', 1) - 1) * 3);

        // return view('adminView.manualOrder',['orders' => $orders,'productDetails' => $productDetails])->with('i', (request()->input('page', 1)-1) * 5);
    }

    public function confirm(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Update the order confirmation field
        if ($order->status === 'Processing') {
            $order->status = 'Out for Delivery';
        } else if ($order->status === 'Out for Delivery') {
            $order->status = 'Done';
        }
        //$reservation->confirmed_by = auth()->user()->id;
        $order->save();

        return redirect()->route('adminManualOrder');
    }
}
