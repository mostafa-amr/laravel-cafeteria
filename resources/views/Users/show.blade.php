@extends('layouts.app')

@section('content')
<div class="adminUserPage">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mt-5">
        {{-- <h1>id: {{$user->id}}</h1>--}}
        <h1>Name: {{$user->name}}</h1>
        <h1>Role: {{$user->role}}</h1>
        <h1>Email: {{$user->email}}</h1>
        <h1>Address: {{$user->address}}</h1>
      </div>
      <div class="col-md-6">
        <img src="{{asset('images/user1.png')}}" alt="">
      </div>
    </div>
  </div>
</div>


@stop