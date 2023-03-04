<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Index</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-style.css')}}">
</head>
<body>

    <x-header.header></x-header.header>

    <div class="bg-image pt-6" style="background-image: url('{{asset('img/order-background2.jpg')}}'); background-size:cover;">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12" >
                <div class="card  shadow-2-strong" style="border-radius:10px">
                  <div class="card-body">
                      <!-- Table -->
                    <div class="table-responsive" >
                      <table class="table  mb-0" >
                        <thead style="background-color:rgb(23, 206, 139);">
                          <tr >
                            <th scope="col">Order #</th>
                            <th scope="col">Payment Made On</th>
                            <th scope="col">ETA Arrival</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Track</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach ($orders as $order)
                          <tr>
                            <th scope="row" class="orderid">{{$order->id}}</th>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->created_at->addDays(5)->format('d/m/Y')}}</td>
                            <td>RM {{ number_format((float)$order->total_price, 2, '.', '') }}</td>
                            <td><span class="badge bg-success">In Transit</span></td>
                            <td><button class=" btn-track">TRACK</button></td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>


    <x-header.footer></x-header.footer>
      
    <script src="{{asset('js/navbar-transition.js')}}"></script>
</body>
</html>