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
    <!--JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/order-style.css')}}">
</head>
<body>

  <!-- Header -->
  <x-header.header></x-header.header>

  <!-- Orders Table -->
  <div class="bg-image pt-6" style="background-image: url('{{asset('img/order-background2.jpg')}}'); background-size:cover;">
      <div class="container">
          <div class="row justify-content-center">
            <div class="col-12" >
              <div class="card shadow-2-strong" style="border-radius:10px">
                <div class="card-body">
                    <!-- Table -->
                  <div class="table-responsive" >
                    <table class="table mb-0" >
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
                          <!-- Title -->
                          <th scope="row" class="orderid">#{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }}</th>
                          <!-- Created_at -->
                          <td>{{ $order->created_at }}</td>
                          <!-- ETA Arrival -->
                          <td>{{ $order->created_at->addDays(5)->format('d/m/Y')}}</td>
                          <!-- Status -->
                          <td><span class="badge rounded-pill bg-success">In Transit</span></td>
                          <!-- Price -->
                          <td>RM {{ number_format((float)$order->total_price, 2, '.', '') }}</td>
                          <!-- Track Button -->
                          <td><button id="trackbtn" class="btn-track" data-url="{{ route('order.view', $order->id) }}">TRACK</button></td>
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

  <!-- Modal -->
  <div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-12" >
                    <!-- Order Status -->
                    <div class="card card-stepper text-black" style="border-radius: 16px;">
                      <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <div>
                            <!-- Order ID -->
                            <h5 class="mb-0">INVOICE <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
                          </div>
                          <!-- Arrival -->
                          <div class="text-end">
                            <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                            <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                          </div>
                        </div>
                        <!-- Progress Bar -->
                        <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                          <li class="step0 active text-center" id="step1"></li>
                          <li class="step0 active text-center" id="step2"></li>
                          <li class="step0 active text-center" id="step3"></li>
                          <li class="step0 text-muted text-end" id="step4"></li>
                        </ul>
                        <!-- Progress Label -->
                        <div class="d-flex justify-content-between">
                          <div class="d-lg-flex align-items-center">
                            <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                            <div>
                              <p class="fw-bold mb-1">Order</p>
                              <p class="fw-bold mb-0">Processed</p>
                            </div>
                          </div>
                          <div class="d-lg-flex align-items-center">
                            <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                            <div>
                              <p class="fw-bold mb-1">Order</p>
                              <p class="fw-bold mb-0">Shipped</p>
                            </div>
                          </div>
                          <div class="d-lg-flex align-items-center">
                            <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                            <div>
                              <p class="fw-bold mb-1">Order</p>
                              <p class="fw-bold mb-0">En Route</p>
                            </div>
                          </div>
                          <div class="d-lg-flex align-items-center">
                            <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                            <div>
                              <p class="fw-bold mb-1">Order</p>
                              <p class="fw-bold mb-0">Arrived</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Products Lists -->
                    <div class="card mt-4" id="order-detail-products">
                      <div class="d-flex justify-content-between pe-5">
                        <div class="d-flex align-items-center">
                          <!-- Product Image -->
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCoqdm79zMiEiUiXmo4yDpsLCpitrafero8w&usqp=CAU" width="120" alt="">
                          <!-- Product Title -->
                          <div class="col">
                            <div class="row">123</div>
                            <div class="row">213</div>
                          </div>
                        </div>
                        <!-- Product Price -->
                        <div class="d-flex align-items-center"><span>RM 12.98</span></div>
                      </div>

                      <div class="row justify-content-between align-items-center">
                        <div class="col">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCoqdm79zMiEiUiXmo4yDpsLCpitrafero8w&usqp=CAU" width="120" alt="">
                          <p>123</p>
                        </div>
                        <div class="col">price</div>
                      </div>
                    </div>

                  </div>
                </div>
            </div>

        </div>
    </div>
  </div>

  <!-- Footer -->
  <x-header.footer></x-header.footer>
      
  <script src="{{asset('js/navbar-transition.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      $('body').on('click', '#trackbtn', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        // Get order products
        var productsURL = $(this).data('url');
        // Show Modal
        $('#orderDetailsModal').modal('show');
        // Empty Div
        // $('#order-detail-products').empty();

        $.ajax({
          url: productsURL,
          type: 'get',
          dataType: 'JSON',
          success:function(data)
          {
            var len = data.length;

            for(i=0 ; i<len; i++){
              var html = '<div class="d-flex justify-content-between pe-5">' +
              '<div class="d-flex align-items-center">' +
              '<img src="' + data[i].image + '" width="120" alt="">' +
              '<span class="ms-4">' + data[i].title + '</span></div>' +
              '<div class="d-flex align-items-center"><span>RM ' + data[i].price + '</span></div></div></div>' ;
              $('#order-detail-products').append(html);
            }
          }
        });

        

        
          // Modal Data
          // $.each(products), function( index, value ){
            // var html = '<div class="d-flex justify-content-between pe-5">' +
            //   '<div class="d-flex align-items-center">' +
            //   '<img src="' + products.image + '" width="120" alt="">' +
            //   '<span>' + products.title + '</span></div>' +
            //   '<div class="d-flex align-items-center"><span>RM ' + products.price + '</span></div></div></div>' ;
            //   $('#order-detail-products').append(html);
          // }

        
        

      })
    });
  </script>

</body>
</html>