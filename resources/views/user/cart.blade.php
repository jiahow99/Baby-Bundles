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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- SweetAlert plugin -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>


    <body>
        <!-- Header -->
        <livewire:navigation />

        <!-- Item Removed -->
        @if(session('deleted'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Item Removed',
                    showConfirmButton: false,
                    timer: 1000
                });
            </script>  
        @endif

        <!-- Confirm Plce Order -->
        <script>
            $(document).ready(function(){
                $('#place-order').click(function(){
                    
                    Swal.fire({
                    title: 'Confirm Place Order ?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Place order',
                    cancelButtonText: 'Back',
                    reverseButtons: true
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='/user/order/create';
                    }
                    })

                });
            });
        </script>  
     
        
        <!-- Container -->
        <div class="card mt-6" >
            <div class="row" style="min-height:620px">
                {{-- Cart Items --}}
                <div class="col-md-8 cart" id="shopping-cart">
                    <div class="title">
                        <!-- Header -->
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart</b></h4></div>
                            <!-- Total item quantity -->
                            <div class="col align-self-center text-right text-muted">@isset($item_quantity)
                                {{ $item_quantity }}
                            @endisset items</div>
                        </div>
                    </div>
                    <div class="row border-top"></div>
                    
                    @if (isset($cart_items))
                        @foreach ($cart_items as $item)
                            <div class="row border-bottom">
                                <div class="row main align-items-center"> 
                                    <div class="col-3"><img class="img-fluid" src="{{asset($item->images->first()->src)}}">
                                    </div> 
                                    <div class="col">
                                        <div class="row text-muted">
                                        {{$item->title}}    
                                        </div>
                                        <div class="row">{{$item->category->name}}</div>
                                    </div> 
                                    <div class="col">
                                        <span>1</span>
                                    </div>
                                    <div class="col price-label">RM {{number_format((double)$item->price, 2, '.', '');}}
                                        <a href="{{route('user.cart.remove', $item->id)}}" class="close">&#10005;</a> 
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <img class="img-fluid" style="width:70%" src="{{asset('/img/empty-cart.png')}}" alt="">
                        </div>
                    @endif

                    <!-- Back Home -->
                    <div class="back-to-shop mt-3">
                        <a href="{{ route('user.shop') }}">&leftarrow;<span class="text-muted ml-1">Back to shop</span></a>
                    </div>
                </div>

                {{-- Right Tab --}}
                <div class="col-md-4 summary">
                    <div><h5><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <!-- Total Item Quantity -->
                        <div class="col text-lg">Quantity : {{$item_quantity ?? '0'}}</div>
                    </div>
                    <div>
                        <p  style="margin-top:23px;">PROMO CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div id="total-price" class="col text-right" style="font-size:20px;">RM 
                            @isset($total)
                                {{ number_format((double)$total, 2, '.', '') }}    
                            @else
                                0.00
                            @endisset
                        </div>
                    </div>

                    <!-- Place Order -->
                    <button type="submit" class="btnn" id="place-order" 
                    @isset($item_quantity)
                        @if ($item_quantity==0)
                            disabled
                        @endif
                    @endisset
                    >Place Order</button>
                    
                </div>
                <!-- Button Trigger Modal (Order Details) -->
                <button id="order-placed" hidden data-bs-toggle="modal" 
                data-bs-target="#orderDetails"></button>

            </div>
        </div>

        <!-- Order Modal -->
        <div class="modal fade" id="orderDetails" tabindex="-1" aria-labelledby="orderDetailsLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"  style="border-radius:10px">
            <div class="modal-header border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start text-black p-4">
                <!-- Order ID -->
                <h5 class="modal-title mb-5" id="orderDetailsLabel">ORDER ID: <span class="orderid">#@if (session('order'))
                    {{ str_pad(session('order')->id, 8, '0', STR_PAD_LEFT) }}
                @endif</span></h5>
                <h4 class="mb-5" style="color: #35558a;">Thanks for your order</h4>
                <p class="mb-0" style="color: #35558a;">Payment summary</p>
                <hr class="mt-2 mb-4"
                style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">
                <div class="d-flex justify-content-between">
                    <!-- Quantity -->
                    <p class="fw-bold mb-0">Item Quantity</p>
                    <p class=" mb-0">@if (session('order'))
                        {{session('item_quantity')}}
                    @endif</p>
                </div>
                <!-- Shipping Fee -->
                <div class="d-flex justify-content-between">
                    <p class="small mb-0">Shipping</p>
                    <p class="small mb-0">RM 2.40</p>
                </div>
                <!-- Packaging Fee -->
                <div class="d-flex justify-content-between">
                    <p class="small mb-0">Packaging Fee</p>
                    <p class="small mb-0">RM 1.00</p>
                    </div>
                <!-- Total Price -->
                <div class="d-flex justify-content-between pb-1">
                    <p class="small">Item Price</p>
                    <p class="small">RM @if (session('order'))
                        {{ number_format((double)session('item_price'), 2, '.', '') }}
                    @endif</p>
                </div>

                <div class="d-flex justify-content-between">
                <p class="fw-bold">Total</p>
                <p class="fw-bold text-lg" style="color: #35558a;">RM @if (session('order'))
                    {{ number_format((double)session('total'), 2, '.', '') }}
                @endif</p>
                </div>
            </div>
            
            <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
                <a href="{{route('order.index')}}" class="btn text-white btn-lg mb-1" style="background-color: #35558a;">
                Track order
                </a>
            </div>
            </div>
        </div>
        </div>
        <!-- Footer -->
        <x-header.footer></x-header.footer>
    </body>

    
    @if(session('order-placed') and session('order'))

        <script>
            $(document).ready(function(){
                $('#orderDetails').modal('show');
            });
        </script>

    @endif
    
    <!-- Navbar transition -->
    <script src="{{asset('js/navbar-transition.js')}}"></script>
</html>