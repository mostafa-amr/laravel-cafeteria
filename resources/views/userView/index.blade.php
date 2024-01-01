@extends('layouts.app') @section('content')


<form method="Post" action="{{route('Order.store')}}" class="adminHomePage">
  @error('userID')
  <div class="alert col-4  alert-danger d-flex align-items-center" role="alert">
    <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <div>
      <p class="text-danger mt-3">{{$message}}</p>
    </div>
  </div>
  @enderror
  @if (session()->has('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  @csrf
  @error('quantity')
  <div class="alert col-4  alert-danger d-flex align-items-center" role="alert">
    <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <div>
      <p class="text-danger mt-3">{{$message}}</p>
    </div>
  </div>

  @enderror
  <div class="container-fluid">
    <div class="col-md-3 ms-auto mb-3">
      <div>
        <input class="form-control" id="search" placeholder="Type to search..." />
      </div>
    </div>
    <div class="row">
      <div class=" col-md-4 ">
        <div class="indexRight border border-2 border-black">

          <form>
            <div class="rig ">
              <div class="ta">
                <table class="table">
                  <tbody class="tableBody">



                  </tbody>
                </table>
              </div>
              <div class="notes my-3">
                <h4 for="are" class="form-label">Notes</h4>
                <textarea class="form-control" id="are" name="comment" rows="3"></textarea>
              </div>

              <div class="select d-flex align-items-center">
                <h4 for="are" class="form-label mb-0 me-2">Room</h4>

                <select class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="lin"></div>
              <div class="total text-right">
                <h3>Total: <span id="finalPrice">0</span></h3>

              </div>
              <td><input type="submit" class="btn btn-danger" /></td>
            </div>
          </form>
        </div>
      </div>
      {{--
      <div class="col-md-4"></div>
      --}}
      <div class="col-md-8">


        <div class="lef m-0 mt-3 mt-md-0">
          <div class="lin"></div>
          <h4 class="mt-4">Products</h4>

          <div class="selected row overLef">
            @foreach ($products as $product)
            <div data-item-id="{{$product->id}}" id="{{$product->id}}" class="drink text-center">
              <div class="drinkPrice">{{$product->price}}</div>
              <img src="{{asset('/images/productsImage/'.$product->image)}}" alt="" class="" />

              <p class="fw-bold">{{$product->name}}</p>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  const products = @json($products);
</script>
<script src="{{asset('js/index.js')}}"></script>
@endsection