@extends('layouts.app')

@section('content')


<div class="container checks">
  <h1>Checks</h1>

  <div class="dat ">

    <form method="get" action="/filterAdmin">
      @csrf
      <span>Date From</span>
      <input type="date" name="start_date" id="" placeholder="Date From" class="me-4">
      <span>Date To</span>
      <input type="date" name="end_date" id=""><br>
      <select class="form-select w-50 mt-5" name="user_id" aria-label="Default select example" data-select="filter">
        <option selected>User</option>
        @forEach($users as $user)
        @if($user->role != 'admin')
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endif
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary mt-4 px-4" data-button="filter">filter</button>
    </form>
  </div>

  <table class="table text-center">
    <thead>
      <tr>
        <th>Name</th>
        <th>totalAmount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      @if($user->role!="admin")
      <tr>

        <td>
          <button class="btn btn-danger order" id="{{$user->id}}">+</button>
          {{$user->name}}
        </td>

        <td>
          @endif

          {{$user->totalPrice}}
        </td>
      </tr>



      @endforeach






    </tbody>

  </table>

  {{--
  <table class="table text-center" id="orderTable" hidden>
    <thead>
      <tr>
        <th>Name</th>
        <th>totalAmount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)

      <tr>
        <td>{{$order->created_at}}</td>
  <td>{{$order->totalPrice}}</td>
  </tr>

  @endforeach
  </tbody>
  </table> --}}








  <div class="mt-5">
    <div class="d-flex justify-content-center align-items-center" id="products">

    </div>

  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script>
    const divv = document.createElement("div");



    let order = document.querySelectorAll('.order');

    const div = document.createElement("div");

    div.classList.add("d-flex");

    order.forEach(element => {

      element.addEventListener('click', () => {


        var Test_HTML = "";
        let user_id = element.id;
        $.ajax({
          url: "/showOrders/" + user_id,
          type: "get",
          dataType: "json",
          success: function(response) {
            //console.log(response)

            Test_HTML = `<table class="table text-center ">
                              <thead>
                                  <tr>
                                    <th>orderDate</th>
                                    <th>totalAmount</th>      
                                  </tr>
                              </thead>
                              <tbody> `


            $.each(response, function(index) {


              Test_HTML += `
                                 <tr>
                                  <td>
                                   <button class="btn btn-danger product" data-id="${response[index].id}" data-button="item">+</button>
                                    ${response[index].created_at}</td>  
                                  <td>${response[index].totalPrice}</td> 
                                </tr>
                                `;

            });

            `
                    </tbody>  
                    </table>`

            //console.log(Test_HTML);
            divv.innerHTML = Test_HTML;
            document.body.appendChild(divv);


          }
        });



      })
    });







    $(document).on("click", "[data-button=item]", function(e) {
      let order_id = $(this).data("id");


      let Test_HTML = "";
      $.ajax({
        url: "/showProducts/" + order_id,
        type: "get",
        dataType: "json",
        success: function(response) {
          //console.log(response)



          $.each(response, function(index) {
            console.log(response);

            Test_HTML += `<div class="orderItems mt-5 mx-3">
                        <div class="checkDrink text-center ">
                          <div class="drink">
                              <img src="/images/` + response[index].image + `" class="img-fluid rounded-top" alt="" width=50 height=50 />
                              <div >` + response[index].order_id + `</div>
                              <p class="fw-bold drinkPrice"">` + response[index].price + `</p>
                              <p class="fw-bold">` + response[index].name + `</p>

                                    
                          </div>
                          
                        </div>  
                    </div>`;

          });


          div.innerHTML = Test_HTML;
          document.querySelector('#products').appendChild(div);



        }
      })
    });
















    // let users = @json($users);

    // $(document).on("click", "[data-button=filter]", function (e) {
    //   e.preventDefault();


    //   let user_id = $("[data-select=filter]").val();

    //   let filtered = users.filter(v => v.id == user_id);

    //   // update table to have only filtered user(s)


    // });

    //clear filter
  </script>


</div>




@endsection