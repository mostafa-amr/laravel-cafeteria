@extends('layouts.app')

@section('content')

<div style="margin:128px">
    <div class="container">
        <div class="row justify-content-center">
            <!--  project and team member start -->
            <div class="col-xl-12 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h1 class="text-center">All Orders </h1>
                        <!-- <div class="card-header-right">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(8, 119, 230, 1);transform: ;msFilter:;"><path d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"></path></svg> 
                                </a>
                            </div> -->
                    </div>

                    <div class="card-block">
                        <div class="for">
                            <table class="table table-responsive text-center w-75 mx-auto">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Date</th>
                                        <th>Products</th>
                                        <th>TotalPrice</th>
                                        <th>comment</th>
                                        <th>username</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td style="">{{$order->created_at}}</td>
                                        <td>
                                            <div class="row">
                                                @foreach ($order->product as $product)
                                                <div class="col-md-4">
                                                    <img class="img-fluid rounded" src="{{asset('images/productsImage/'.$product->image)}}" width="30%">
                                                    <span class="text-danger fw-bold">{{$product->name}}</span>
                                                </div>

                                                @endforeach
                                            </div>

                                        </td>
                                        <td style="">{{$order->totalPrice}}</td>
                                        <td style="">{{$order->comment}}</td>
                                        <td style="">{{$order->username}}</td>
                                        <td>

                                            <form action="{{ route('confirm', ['id' => $order->id]) }}" method="POST">
                                                @csrf
                                                @if($order->status === 'Processing')
                                                <button type="submit" class="btn btn-primary">{{$order->status}}</button>
                                                @elseif($order->status === 'Out for Delivery')
                                                <button type="submit" class="btn btn-success">{{$order->status}}</button>
                                                @else
                                                <button type="submit" class="btn btn-danger">{{$order->status}}</button>
                                                @endif
                                            </form>

                                        </td>

                                    </tr>

                                    @endforeach



                                </tbody>
                            </table>




                        </div>

                    </div>
                    <div class="d-flex justify-content-center  container mt-5">
                        <div col-8>
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>

                {{-- {{ $orders->links('pagination::bootstrap-4') }} --}}
            </div>
        </div>
    </div>

</div>


@stop