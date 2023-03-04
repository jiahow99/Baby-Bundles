<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Shopping Cart</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/shopping-cart.css')}}">
        <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- SweetAlert plugin -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>


    <body>
        <!-- Header -->
        <x-header.header></x-header.header>

        <!-- Item Removed -->
        @if(session('deleted'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Item Removed',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>  
        @endif
        
        
        <!-- Container -->
        <div class="card mt-6"  >
            <div class="row">
                <div class="col-md-8 cart" id="shopping-cart">
                    <div class="title">
                        <!-- Header -->
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <!-- Total item quantity -->
                            <div class="col align-self-center text-right text-muted">{{$item_quantity}} items</div>
                        </div>
                    </div>

                    <div class="row border-top"></div>

                    {{-- Empty Card --}}
                    @if ($cart_items->isEmpty())

                        <div class="text-center">
                            <img class="img-fluid" style="width:70%" src="{{asset('/img/empty-cart.png')}}" alt="">
                        </div>

                    @else

                        <!-- Cart Items -->
                        @foreach ($cart_items as $item)
                        <div class="row border-bottom">
                            <div class="row main align-items-center"> 
                                <div class="col-2"><img class="img-fluid" src="{{$item->images->first()->src}}">
                                </div> 
                                <div class="col">
                                    <div class="row text-muted">
                                    {{$item->title}}    
                                    </div>
                                    <div class="row">Title</div>
                                </div> 
                                <div class="col">
                                    <span>1</span>
                                </div>
                                <div class="col price-label">RM {{$item->price}}  
                                    <a href="{{route('user.cart.remove', $item->id)}}" class="close">&#10005;</a> 
                                </div>
                            </div>
                        </div>
                        @endforeach

                    @endif

                    

                    <!-- Back Home -->
                    <div class="back-to-shop mt-3">
                        <a href="shopping-page.php">&leftarrow;<span class="text-muted ml-1">Back to shop</span></a>
                    </div>

                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <!-- Total Item Quantity -->
                        <div class="col text-lg">Quantity : {{$item_quantity}}</div>
                    </div>
                    <div>
                        <p  style="margin-top:23px;">PROMO CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div id="total-price" class="col text-right" style="font-size:20px;">RM 0.00
                        </div>
                    </div>
                    <a href="#">
                        <button type="submit" class="btnn">Place Order</button>
                    </a>
                </div>

                <button id="order-placed" hidden></button>
            </div>
        </div>

        <!-- Footer -->
        <x-header.footer></x-header.footer>
    </body>

    <script src="{{asset('js/navbar-transition.js')}}"></script>
    <script>
        // Buttons
        var order_placed = document.getElementById('order-placed');

        // Order Placed Successfully
        order_placed.addEventListener('click',function(){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Order Confirmed',
                showConfirmButton: false,
                timer: 1500,
                width: 500,
                padding: '3em',
            })
            // Prevent add to cart again
            setTimeout('window.location.href="index.php"', 1600);
        })
    </script>
    
</html>