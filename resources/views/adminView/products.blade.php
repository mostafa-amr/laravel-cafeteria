@extends('layouts.app')

@section('content')
<div class="adminProductPage">
  <div class="container">
    <div class="dis mb-5 d-flex justify-content-between align-items-center">
      <h1 class=" ">All Products </h1>
      <a href="{{route('AddProduct')}}" class="btn btn-info">Add New Product</a>
    </div>
    {{-- <div class="dat ">
                <span>Date From</span>
                <input type="date" name="" id="" placeholder="Date From" class="me-4">
                <span>Date To</span>
                <input type="date" name="" id="" placeholder="Date To">
            </div> --}}

    <div class="for">
      <table class="table text-center">
        <thead>
          <tr>
            <th>Products</th>
            <th>Price</th>
            <th>Image</th>
            <th>Categort</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($products as $product)
          <tr>
            <th>{{$product->name}}</th>
            <td>{{$product->price}}$</td>
            <td class="imgTable"><img src="{{asset('/images/productsImage/'.$product->image)}}" alt="" class="" />
            </td>
            @if ($product->category->id !== 1)
             <td><a href="{{route('categories.show',$product->category->id)}}">{{$product->category->name}}</a>  </td>
            @else
            
            <td> Empty </td>
            @endif
            <td><a href="{{route('destroyProducts',$product->id)}}" class="btn btn-danger">delete</a>
              <a href="{{route('editProduct',$product->id)}}" class="btn btn-danger">edit</a>
              <a href="{{route('showProduct',$product->id)}}" class="btn btn-info">show</a>
            </td>
          </tr>
          @endforeach


          {{-- <tr>
                  <th  >Tea</th>
                  <td>50$</td>
                  <td class="imgTable"><img src="{{asset('images/drink2.png')}}" class="img-fluid rounded-top" alt=""></td>
          <td><a href="" class="btn btn-danger">Cancel</a></td>
          </tr> --}}
          {{-- <tr>
                  <th  >Pepsi</th>
                  <td>40$</td>
                  <td class="imgTable"><img src="{{asset('images/drink5.png')}}" class="img-fluid rounded-top" alt=""></td>
          <td><a href="" class="btn btn-danger">Cancel</a></td>
          </tr>
          <tr>
            <th>cofe</th>
            <td>10$</td>
            <td class="imgTable"><img src="{{asset('images/drink4.png')}}" class="img-fluid rounded-top" alt=""></td>
            <td><a href="" class="btn btn-danger">Cancel</a></td>
          </tr> --}}
        </tbody>
      </table>
      {{-- <div class="productDetails">
              <div class="row justify-content-center productDet">
                  <div class="proIndex text-center ">
                      <img src="{{asset('images/drink1.png')}}" alt="" class="">
      <p class="fw-bold">Cofe</p>
    </div>
    <div class="proIndex text-center ">
      <img src="{{asset('images/drink2.png')}}" alt="" class="">
      <p class="fw-bold">Pepsi</p>
    </div>
    <div class="proIndex text-center ">
      <img src="{{asset('images/drink6.png')}}" alt="" class="">
      <p class="fw-bold">Lemon</p>
    </div>
    <div class="proIndex text-center  ">
      <img src="{{asset('images/drink4.png')}}" alt="" class="">
      <p class="fw-bold">Lemon</p>
    </div>
    <div class="proIndex text-center ">
      <img src="{{asset('images/drink5.png')}}" alt="" class="">
      <p class="fw-bold">Cofe</p>
    </div>
  </div>
</div> --}}
{{-- <div class="total d-flex justify-content-center">
             <h2> Total : <span> 9999</span></h2>
            </div> --}}


</div>
</div>
</div>
@endsection