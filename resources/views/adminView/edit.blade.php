@extends('layouts.app')

    @section('content')
    <div class="adminEditUserPage">
        <div class="container">
            <h1>Edit User</h1>
         <div class="for col-md-9 col-lg-6 col-10 m-auto" >
            <form action="{{route('storeProduct')}}"  method="post">
                <div class="mb-1">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
                  </div>
                  <div class="mb-1">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                  </div>
                <div class="mb-1">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Enter Your Password">
                  </div>
                <div class="mb-1">
                    <label for="conPassw" class="form-label">Confirmed Password</label>
                    <input type="text" class="form-control" id="conPassw" name="confirmedPassword" placeholder="Enter Your Confirmed Password">
                  </div>
                <div class="mb-1">
                    <label for="roomNo" class="form-label">Room</label>
                    <input type="text" class="form-control" id="roomNo" name="room" placeholder="Enter Your Room">
                  </div>
                <div class="mb-1">
                    <label for="roomNo" class="form-label">Personal Image</label>
                    <input type="file" class="form-control" id="roomNo" name="image" placeholder="Enter Your Image">
                  </div>

                  <div class="bt mt-4">
                    <input type="submit" value="Save" class="btn btn-success">
                    <input type="button" value="Reset" class="btn btn-info">
                  </div>

            </form>
         </div>
        </div>
    </div>
    @endsection
