 @extends('layouts.app')
 @section('content')
 <div class="adminAddProductrPage">
   <div class="container">
     @if ($errors->any())
     <div>
       <ul>
         @foreach ($errors->all() as $error)
         {{-- <li>{{ $error }}</li> --}}
         @endforeach
       </ul>
     </div>
     @endif
     <h1>Add Product</h1>
     <div class="Productfor col-md-9 col-lg-6 col-10 m-auto">
       {{-- <form  method="Post" action="{{route('product.edit')}}" enctype="multipart/form-data"> --}}
       <form method="Post" action="{{route('storeProduct')}}" enctype="multipart/form-data">
         @csrf
         <div class="mb-1">
           <label for="name" class="form-label">Product</label>
           <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter Your Name" />
         </div>
         @error('name') <p class="text-danger">{{$message}}</p> @enderror


       
         <div class="mb-1">
          <label for="categ" class="form-label">Category</label>
          <select
            class="form-select"
            aria-label="Default select example"
            name="category_id"
          >
          
            <option selected value="1">Select Category</option>

            @foreach ($categories as $category)
            @if($category->id != 1)
                        <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
            {{-- <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option> --}}
          </select>
        </div>
        @error('category_id') <p class="text-danger">{{$message}}</p> @enderror


         {{-- <div class="mb-1">
           <label for="category" class="form-label">category</label>
           <input type="text" class="form-control" id="category" name="category" value="{{old('category')}}" placeholder="Enter Your category" />
         </div> --}}

         {{--
        <div class="mb-1">
          <label for="email" class="form-label">Email address</label>
          <input
            type="email"
            class="form-control"
            id="email"
            placeholder="name@example.com"
          />
        </div>
        --}}

         <div class="mb-1">
           <label for="price" class="form-label">Price</label>
           <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="price" />
         </div>
         @error('price') <p class="text-danger">{{$message}}</p> @enderror
         <div class="mb-1">
           <label for="stock" class="form-label">Stock</label>
           <input type="number" class="form-control" id="stock" name="stock" value="{{old('stock')}}" placeholder="stock" />
         </div>

         <div class="mb-1">
           <label for="price" class="form-label">image</label>
           <input type="file" class="form-control" id="image" name="image" placeholder="image Pr" />
         </div>
         @error('image') <p class="text-danger">{{$message}}</p> @enderror

         {{--
        <div class="mb-1">
          <label for="conPassw" class="form-label">Confirmed Password</label>
          <input
            type="text"
            class="form-control"
            id="conPassw"
            placeholder="Enter Your Confirmed Password"
          />
        </div>
        --}} {{--
        <div class="mb-1">
          <label for="roomNo" class="form-label">Room</label>
          <input
            type="text"
            class="form-control"
            id="roomNo"
            placeholder="Enter Your Room"
          />
        </div>
        --}}

         {{-- <div class="mb-1">
          <label for="categ" class="form-label">Category</label>
          <select
            class="form-select"
            aria-label="Default select example"
            name="category"
          >
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div> --}}
         {{-- <div class="mb-1">
          <label for="proImag" class="form-label">Product Image</label>
          <input
            type="file"
            class="form-control"
            id="proImag"
            name="image"
            placeholder="Product Image"
          />
        </div> --}}

         <div class="bt mt-4">
           <input type="submit" value="Save" class="btn btn-success" />
           <input type="button" value="Reset" class="btn btn-info" />
         </div>
       </form>
     </div>
   </div>
 </div>
 @endsection