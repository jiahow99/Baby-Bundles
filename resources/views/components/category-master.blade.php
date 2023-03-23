<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        @yield('title')
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/shopping-style.css')}}" rel="stylesheet" />
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
        <link rel="stylesheet" href="{{asset('css/product-page.css')}}">
        <link rel="stylesheet" href="{{asset('css/accordian.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <!-- JQuery-->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Alpine Js -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @livewireStyles
        @livewireScripts
    </head>

    <body>
        {{-- Header Nav --}}
        <livewire:navigation />

        {{-- Start Cart Sidebar --}}
        <div class="p-0 m-0 position-fixed sidebar-cart">
            <div class="col-12 pt-3 px-2 m-0">
            <div class="col-11 p-0 m-0 mx-auto" id="sidebar_cart_container">
                {{-- Cart header --}}
                <div class="header col-12 p-0 m-0 mb-2 row justify-content-between">
                <span class="col-5 p-0 m-0">Shopping Cart</span>
                <span id="close_sidebar_cart" class="col-2 row m-0 close justify-content-center align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                </span>
                </div>
                <hr class="col-12 p-0 m-0 mb-3"></hr>
                <a class="col-12 p-0 m-0 view-cart btn btn-primary text-center py-2 mb-4" href="{{ route('user.cart') }}">View Cart</a>
    
            </div>
            
            </div>
        </div>
        {{-- End Cart Sidebar --}}
        
        {{-- Main Content --}}
        <section style="padding-top:90px">
            <form  action="{{ route('product.filter') }}" method="post"class="row px-5">
                <!-- Filter-->
                    @csrf
                    <div class="col-3 card p-0 pt-4">
                        <div class="col-10 m-0 p-0 mx-auto">
                            <div class="text-center">
                                <h3 class="text-primary">Filter</h3>
                            </div>
                            <div class="mt-3">
                                <h5>Price</h5>
                                <div id="price-range-select" class="d-flex align-items-center justify-content-between ">
                                    <button class="btn btn-outline-primary" >RM 0 - 50</button>
                                    <button class="btn btn-outline-primary" >RM 50 - 150</button>
                                    <button class="btn btn-outline-primary" >RM 100 - 200</button>
                                </div>
                                {{-- Price Range --}}
                                <div id="price-range" class="d-flex justify-content-between align-items-center mt-3">
                                    <select class="form-select" style="width: 40%;" name="min" >
                                        <option value="0">0</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                    </select>
                                    <span class="mx-3">-</span>
                                    <select class="form-select" style="width: 40%;" name="max" >
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="60">60</option>
                                    </select>
                                    <button class="btn btn-primary p-0 py-2 px-4 ms-3" onclick="document.getElementById('form-id').submit();" style="border-radius: 10px; ">Filter</button>
                                </div>
                                {{-- Categories --}}
                                <div id="categories" class="mt-3">
                                    <h5>Categories</h5>
                                    <div class="ps-3">
                                        <a href="#" class="d-block py-2 text-lg ">Top</a>
                                        <a href="#" class="d-block py-2 text-lg ">Bottom</a>
                                        <a href="#" class="d-block py-2 text-lg ">Outfit</a>
                                        <a href="#" class="d-block py-2 text-lg ">Shoes</a>
                                    </div>
                                </div>
                                {{-- Condition --}}
                                <div id="condition" class="mt-3">
                                    <h5>Condition</h5>
                                    <div class="ps-3">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="Like New">
                                            <label class="form-check-label" for="Like New">
                                            Like New
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="Very Good">
                                            <label class="form-check-label" for="Very Good">
                                            Very Good
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="Good">
                                            <label class="form-check-label" for="Good">
                                            Good
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="Poor">
                                            <label class="form-check-label" for="Poor">
                                            Poor
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="Very Poor">
                                            <label class="form-check-label" for="Very Poor">
                                            Very Poor
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Products-->
                <div class="col-9 px-5">
                    @yield('product')
                </div>
            </form>
        </section>
        <!-- Footer-->
        <x-header.footer></x-header.footer>
        
        <script>
        // Display sidebar cart contents
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        const cart_url = $('#cart-toggler').data('url');
        const cart_index = "{{route('user.cart')}}";

        $.ajax({
            url: cart_url,
            type: 'get',
            dataType: 'JSON',
            success:function(data)
            {
            var len = data.products.length;

            for(i=0 ; i<len; i++){
                let product = data.products[i];

                var html = `<div class="product col-12 row justify-content-between p-0 m-0">
                <a class="product-image col-3 p-0 m-0" href=${cart_index}>
                <div class="col-12 p-0 m-0"><img src="{{ asset('${product.images[0].src}') }}" alt="" width="100%"></div>
                </a>
                <div class="product-details col-6 p-0 m-0">
                <div class="col-12 p-0 m-0 .product-title-card" style="font-size: 15px;">${product.title}</div>
                <div class="col-12 p-0 m-0" style="font-size: 16px; font-weight: 600; color: crimson !important">RM ${product.price}</div>
                </div>
            </div>
            <hr class="col-12 p-0 m-0 my-3"></hr>`;

                $('#sidebar_cart_container').append(html);
            }        
            }
        });


        // Open sidebar
        $("#cart-toggler").click(function() {
            $(".sidebar-cart").width("28%");
            $(".blur-me").addClass('blur-bg');
        });


        // Close sidebar
        $("#close_sidebar_cart").click(function(event) {
            $(".sidebar-cart").width("0");
            $(".blur-me").removeClass('blur-bg');
        });

    
        @yield('script')

        </script>
        <script src="{{asset('js/navbar-transition.js')}}"></script>
    </body>
    
</html>
