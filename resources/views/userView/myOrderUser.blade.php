@extends('layouts.app')

    @section('content')
    <div class="userOrderPage">
        <div class="container">
            <h1 class=" ">My Order </h1>
            <div class="dat ">
                <span>Date From</span>
                <input type="date" name="" id="" placeholder="Date From" class="me-4">
                <span>Date To</span>
                <input type="date" name="" id="" placeholder="Date To">
            </div>
            <table class="table text-center">
                <thead>
                  <tr>
                    <th >Order Date</th>
                    <th >Status</th>
                    <th >Amount</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th class="d-flex justify-content-between align-items-center" >1/2/2023 25-5  <a href="" class="fs-3  text-decoration-none"> + </a></th>
                    <td>Mark</td>
                    <td>81</td>
                    <td><a href="" class="btn btn-danger">Cancel</a></td>
                  </tr>
                  <tr>
                    <th class="d-flex justify-content-between align-items-center" >1/2/2023 25-5  <a href="" class="fs-3  text-decoration-none"> + </a></th>
                    <td>Jacob</td>
                    <td>36</td>
                    <td><a href="" class="btn btn-danger">Cancel</a></td>
                  </tr>
                  <tr>
                    <th class="d-flex justify-content-between align-items-center" >1/2/2023 25-5  <a href="" class="fs-3  text-decoration-none"> + </a></th>
                    <td >good</td>
                    <td >253</td>
                    <td><a href="" class="btn btn-danger">Cancel</a></td>
                  </tr>
                </tbody>
              </table>
              <div class="orderDetails">
                <div class="row justify-content-center orderDet">
                    <div class="orderIndex text-center ">
                        <img src="{{asset('images/drink1.png')}}" alt="" class="">
                        <p class="fw-bold">Cofe</p>
                    </div>
                    <div class="orderIndex text-center ">
                        <img src="{{asset('images/drink2.png')}}" alt="" class="">
                        <p class="fw-bold">Pepsi</p>
                    </div>
                    <div class="orderIndex text-center ">
                        <img src="{{asset('images/drink6.png')}}" alt="" class="">
                        <p class="fw-bold">Lemon</p>
                    </div>
                    <div class="orderIndex text-center  ">
                        <img src="{{asset('images/drink4.png')}}" alt="" class="">
                        <p class="fw-bold">Lemon</p>
                    </div>
                    <div class="orderIndex text-center ">
                        <img src="{{asset('images/drink5.png')}}" alt="" class="">
                        <p class="fw-bold">Cofe</p>
                    </div>
                   </div>
              </div>
              <div class="total d-flex justify-content-center">
               <h2> Total : <span> 9999</span></h2>
              </div>

        </div>
    </div>
    @endsection
