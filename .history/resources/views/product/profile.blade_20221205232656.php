<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$product->title}}</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
        
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/product-page.css')}}">
        <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
        <link rel="stylesheet" href="{{asset('css/accordian.css')}}">
        <!-- SweetAlert plugin -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        
        </head>

        {{-- Header --}}
        <x-header.header></x-header.header>

        <section class="body">
        <body className='snippet-body'>
            <div class="container mb-5" style="padding-top:7rem;">
                <form class="card" method="POST">
                    @csrf
                    <div class="row g-0">
                        <div class="col-md-6 border-end">
                            <div class="d-flex flex-column justify-content-center">
                                <!-- Main image -->
                                <div class="main_image">
                                    <img src="{{$product->images->first()->src ?? ""}}" id="main_product_image" width="350">
                                </div>
                                <!-- Thumbnail images -->
                                <div class="thumbnail_images">
                                    <ul id="thumbnail">
                                        <li>
                                            <img onclick="changeImage(this)" src="{{$product->images->first()->src ?? ""}}" width="70">
                                        </li>
                                        <li>
                                            <img onclick="changeImage(this)" src="https://i.imgur.com/w6kEctd.jpg" width="70">
                                        </li>
                                        <li>
                                            <img onclick="changeImage(this)" src="https://i.imgur.com/L7hFD8X.jpg" width="70">
                                        </li>
                                        <li>
                                            <img onclick="changeImage(this)" src="https://i.imgur.com/6ZufmNS.jpg" width="70">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 right-side">
                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Product title -->
                                    <h2 class="product-title" style="width:90%;">{{$product->title}}</h2>
                                    <!-- Favourite icon -->
                                    <span class="heart text-lg" style="position:absolute;top:30px;right:20px;">
                                        <i class='bx bx-heart'></i>
                                    </span>
                                </div>
                                <div class="text-muted" style="font-size:14px">Category: {{$product->category->name}}</div>
                                <!-- Contents -->
                                <div class="mt-2 pr-3 content">
                                    <p style="font-size:17px">
                                        {{$product->description}}
                                    </p>
                                </div>
                                <!-- Price -->
                                <h3>RM {{$product->price}}</h3>
                                <!-- Stars rating -->
                                <div class="ratings d-flex flex-row align-items-center">
                                    <div class="d-flex flex-row">
                                        <!-- Filled Star -->
                                        @for($x=0; $x<$product->condition; $x++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                        <!-- Unfilled Star -->
                                        @for($x=0; $x<5-$product->condition; $x++)
                                            <div class="bi-star"></div>
                                        @endfor
                                    </div>
                                    <!-- review count -->
                                    <span>441 reviews</span>
                                </div>
                                <!-- Buttons -->
                                <div class="buttons d-flex flex-row gap-3" style="margin-top:80px">
                                    <a class="btn-add">
                                        Buy Now
                                    </a>
                                    <button class="btn-outline-add addToCartBtn" style="border-width: 3px;">
                                        Add to Cart
                                    </button>
                                    <input type="hidden" id="product_id" value="{{$product->id}}">
                                    <button hidden id="add-to-cart"></button>
                                    <button hidden id="item-existed"></button>
                                </div>
                    
                                <!-- Accordian -->
                                <div class="row" style="margin-top:6rem;">
                                    <div class="col-lg-9 mx-auto-custom" style="width:100%">
                                        <!-- Accordion -->
                                        <div id="accordionExample" class="accordion shadow">
                                            <!-- Accordion item 1 -->
                                            <div class="card">
                                                <div id="headingOne" class="card-header bg-white shadow-sm border-0" >
                                                    <h2 class="mb-0">
                                                        <!-- Title -->
                                                        <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="btn btn-link text-dark  text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                            SIZE DETAILS
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body p-5">
                                                        <!-- Content -->
                                                        <p class="font-weight-light m-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- End -->
                                            <!-- Accordion item 2 -->
                                            <div class="card">
                                                <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                                    <h2 class="mb-0">
                                                        <!-- Title -->
                                                        <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                            DELIVERY FEE
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body p-5">
                                                        <!-- Content -->
                                                        <p class="font-weight-light m-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- End -->
                                            <!-- Accordion item 3 -->
                                            <div class="card">
                                                <div id="headingThree" class="card-header bg-white shadow-sm border-0 ">
                                                    <h2 class="mb-0">
                                                        <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link " style="font-size:15px;font-weight:bold;">
                                                        SHIPPING INFO
                                                    </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body p-5">
                                                        <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                                    </div>
                                                </div>
                                            </div><!-- End -->
                                            <!-- Accordion item 4 -->
                                            <div class="card">
                                                <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                                    <h2 class="mb-0">
                                                        <!-- Title -->
                                                        <button type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                            Collapsible Group Item #4
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                                                    <div class="card-body p-5">
                                                        <!-- Content -->
                                                        <p class="font-weight-light m-0">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div><!-- End -->
                                        </div><!-- End -->
                                    </div>
                                </div>
                                <!-- End of accordian -->
                            </div>	
                        </div>	
                    </div>	
                </form> 
            </div>
            <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
            <script type='text/javascript'>

            // Change image
            function changeImage(element) {
                var main_prodcut_image = document.getElementById('main_product_image');
                main_prodcut_image.src = element.src;
            }

            // Buttons
            var add_cart_button = document.getElementById('add-to-cart');
            var item_existed = document.getElementById('item-existed');

                // Item Added Successfully
            add_cart_button.addEventListener('click',function(){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your product has been added',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 500,
                    padding: '3em',
                })
                // Prevent add to cart again
                setTimeout('history.go(-1)', 1600);
            })

            // Item exist in cart
            item_existed.addEventListener('click',function(){
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Item already in your cart',
                    showConfirmButton: false,
                    timer: 1500,
                    width: 400,
                    padding: '3em',
                })
                // Prevent add to cart again
                setTimeout('history.go(-1)', 1600);
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // JQuery
            $(document).ready(function(){

                // Add To Cart (clicked)
                $('.addToCartBtn').click(function(e){
                    e.preventDefault();
                    // Get Product ID
                    var product_id = $('#product_id').val();

                    // Ajax
                    $.ajax({
                        method: "POST",
                        url: "/add-to-cart",
                        data: {
                            'product_id' : product_id,
                        },
                        dataType: "dataType",
                        success: function(response){
                            alert(response.status);
                        }
                    });
                });
            });
            
            </script>
                    
                    
            {{-- Footer --}}
            <x-header.footer></x-header.footer>

        </body>
        </section>
        <script src="js/navbar-transition.js"></script>
    </html>