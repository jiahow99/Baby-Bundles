<?php
use App\Models\Category;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;display=swap">
    <!-- Modal Video-->
    <link rel="stylesheet" href="vendor/modal-video/css/modal-video.min.css">
    <!-- Leaflet-->
    <link rel="stylesheet" href="vendor/leaflet/leaflet.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/header-style.css')}}">
    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireScripts
    @livewireStyles
  </head>

  

  {{-- Header --}}
  <livewire:navigation />

  <body>

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


    <!-- navbar-->
    <!-- Hero Slider -->
    <section class="blur-me">
      <div class="swiper hero-slider">
        <div class="swiper-wrapper" >
          <!-- Hero Slide-->
          <div class="swiper-slide hero-slide bg-size bg-center py-5" style="background: url({asset('img/hero-banner-1.jpg')})">
            <div class="container text-white py-5 index-forward">
              <div class="row">
                <div class="col-lg-7">
                  <h1>All items here are afforfable</h1>
                  <p class="lead">It's more affordable than buying new items.</p>
                  <ul class="list-inline">
                    <li class="list-inline-item me-0"><a class="btn btn-primary px-5" href="{{route('product.create')}}">Sell</a></li>
                    <li class="list-inline-item"></li><a class="btn btn-outline-light px-5" href="top.php">Buy</a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Hero Slide-->
          <div class="swiper-slide hero-slide bg-size bg-center py-5" style="background: url(img/hero-banner-2.jpg)">
            <div class="container text-white py-5 index-forward">
              <div class="row">
                <div class="col-lg-7">
                  <h1>Save money on the things you need for baby.</h1>
                  <p class="lead">By buying your baby essentials in bulk, you’ll cut costs and always have a stock of everything you need for your baby.</p>
                  <ul class="list-inline">
                    <li class="list-inline-item me-0"><a class="btn btn-primary px-5" href="{{route('product.create')}}">Sell</a></li>
                    <li class="list-inline-item"></li><a class="btn btn-outline-light px-5" href="top.php">Buy</a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Hero Slide-->
          <div class="swiper-slide hero-slide bg-size bg-center py-5" style="background: url(img/hero-banner-3.jpg)">
            <div class="container text-white py-5 index-forward">
              <div class="row">
                <div class="col-lg-7">
                  <h1>You always get the best quality</h1>
                  <p class="lead">We assure the product here are best condition.</p>
                  <ul class="list-inline">
                    <li class="list-inline-item me-0"><a class="btn btn-primary px-5" href="{{route('product.create')}}">Sell</a></li>
                    <li class="list-inline-item"></li><a class="btn btn-outline-light px-5" href="top.php">Buy</a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-next swiper-nav-custom d-none d-lg-block"></div>
        <div class="swiper-button-prev swiper-nav-custom d-none d-lg-block"></div>
        <div class="swiper-pagination py-3 d-block d-lg-none"></div>
      </div>
    </section>

    <section class=" bg-light blur-me" id="categories">
      <p class="h4 mt-4 text-uppercase text-primary mb-3 text-center">Categories</p>

      <div class="mx-5 mt-4">
        <div class="col-12">
          <a href="{{route('category.index', Category::whereSlug('outfit')->first()->id)}}" style="height:400px" class="category card overflow-hidden">
            <img src="img/outfit2.jpg" class="card-img" alt="">
            <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
              <h2 class="card-title display-6 text-white fw-normal  underline">Outfit</h2>
            </div>
          </a>
        </div>
        <div class="row g-0">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <a href="{{route('category.index', Category::whereSlug('bottom')->first()->id)}}" style="height:350px" class="category card overflow-hidden">
                        <img src="img/bottom.jpg" class="card-img" alt="">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                          <h2 class="card-title display-6 text-light fw-normal underline">Bottom</h2>
                        </div>
                      </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                      <a href="{{route('category.index', Category::whereSlug('shoes')->first()->id)}}" style="height:350px" class="category card overflow-hidden">
                        <img src="img/shoes.jpg" class="card-img" alt="">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                          <h2 class="card-title display-6 text-white fw-normal  underline">Shoes</h2>
                        </div>
                      </a>
                    </div>
                </div>
            </div>

            <div class="col-6 text-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                      <a href="{{route('category.index', Category::whereSlug('top')->first()->id)}}" style="height:700px" class="category card overflow-hidden">
                        <img src="{{asset('img/top.jpg')}}" class="card-img" alt="">
                        <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                          <h2 class="card-title display-5 text-white fw-normal  underline">Top</h2>
                        </div>
                      </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- Featured Products -->
    <section id="featured-product" class="blur-me">
      <div class="container">
        <p class="h4 mt-5 text-uppercase text-primary mb-3 text-center">Featured Product</p>
        <div class="row gx-0 mb-5">
         
          @foreach ($featured_products as $product)
            <div class="col-3 mb-4" >
              <div class="product card border-0" style="width:280px; border-radius:5px">
                  <!-- Product image-->
                  <div class="overflow-hidden" style="border-radius:5px">
                      <a href='{{route('product.profile', $product->id)}}'><img class='card-img-top' style='width:300px;height:300px; ' src='{{$product->images->first()->src ?? ''}}'></a>
                  </div>
                  <div class="card-body pt-3 pb-3" >
                      <div>
                          <!-- Product name-->
                          <div class="row" style="height:20px;">
                              <h6 class="justify-content-start col-10">{{mb_strimwidth($product->title, 0, 20)}}</h6>
                              <!-- Favourite icon -->
                              <i class="fa fa-heart justify-content-end col-2"></i>
                          </div>
                        
                      </div>
                      
                  </div>
                  
              </div>
            </div>

          @endforeach


        </div>
      </div>
    </section>
  
    
    <!-- Features Section -->
    <section class="py-5 bg-light" id="about" class="blur-me">
      <div class="container py-5">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <p class="h6 mb-1 text-uppercase text-primary mb-3">Our main goals</p>
            <h2 class="mb-4">You will find a range of aesthetic and cute clothes for your baby.</h2>
            <ul class="list-check list-unstyled row px-3 mb-4 gy-2">
              <li class="text-sm text-muted col-lg-6">Cute Top</li>
              <li class="text-sm text-muted col-lg-6">Fancy Bottom</li>
              <li class="text-sm text-muted col-lg-6">Adorable Shoes</li>
              <li class="text-sm text-muted col-lg-6">Outgoing asseccories</li>
              <li class="text-sm text-muted col-lg-6">Pretty Socks</li>
              <li class="text-sm text-muted col-lg-6">Enjoyful Toys</li>
            </ul> 
            <ul class="list-inline py-4 border-top border-bottom d-flex align-items-center">
              <li class="list-inline-item pr-4 mr-0"><img src="img/about-sign.png" alt="" width="80"></li>
              <li class="list-inline-item px-4 mr-0 border-left">
                <h5 class="mb-0">Yee Zhen</h5>
                <p class="small font-weight-normal text-muted mb-0">Chairman and founder </p>
              </li>
              <li class="list-inline-item pl-4 border-left">
                <h5 class="mb-0">+420 754 6545 656  4</h5>
                <p class="small font-weight-normal text-muted mb-0">Call to ask any question</p>
              </li>
              
            </ul>
            <ul class="list-inline py-4 border-top border-bottom d-flex align-items-center">
              <li class="list-inline-item pr-4 mr-0"><img src="img/about-sign.png" alt="" width="80"></li>
              <li class="list-inline-item px-4 mr-0 border-left">
                <h5 class="mb-0">Kah How</h5>
                <p class="small font-weight-normal text-muted mb-0">Chairman and founder </p>
              </li>
              <li class="list-inline-item pl-4 border-left">
                <h5 class="mb-0">+132 724 4253 323  1</h5>
                <p class="small font-weight-normal text-muted mb-0">Call to ask any question</p>
              </li>
              
            </ul>
          </div>
          <div class="col-lg-5 ms-auto mb-4 mb-lg-0 order-1 order-lg-2">
            <div class="p-2 border"><img class="img-fluid" src="img/about-img.jpg" alt=""></div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Divider Section -->
    <section class="bg-cover bg-center" style="background: url(img/hero-banner-2.jpg)">
      <div class="primary-overlay py-5">
        <div class="overlay-content">
          <div class="container">
            <div class="row align-items-center gy-4">
              <div class="col-lg-7 text-center text-lg-start">
                <h2 class="text-white mb-2">Need help on purchased clothes?</h2>
                <p class="text-white mb-0">If you have any questions, comments, suggestions, or if you want to contact us, please contact us ASAP.</p>
              </div>
              <div class="col-lg-3 ms-auto text-center text-lg-end"><a class="btn btn-outline-light px-4" href="#!">Contact Us</a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Testimonials Section-->
    <section class="py-5" class="blur-me">
      <div class="container py-5">
        <p class="h6 mb-1 text-uppercase text-primary mb-3">Our customers say</p>
        <div class="row mb-5">
          <div class="col-lg-5">
            <h2 class="mb-5">The Best Quality Used Clothing You Can Find</h2>
          </div>
          <div class="col-lg-7">
            <p class="text-muted">Just what I was looking for. Man, this thing is getting better and better as I learn more about it. Thanks for the great service.</p>
          </div>
        </div>
        <div class="swiper testimonials-slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide p-3">
              <div class="testimonial p-5 shadow-sm mb-5">
                <div class="d-flex align-items-center mb-4">
                  <div class="testimonial-img flex-shrink-0"><img class="img-fluid rounded-circle" src="img/person-1.jpg" alt=""></div>
                  <div class="ms-4">
                    <h5 class="mb-0">Rodel Colez</h5>
                    <p class="small text-muted mb-1">Businessman</p>
                    <ul class="small list-inline text-primary mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <p class="text-muted text-sm mb-0">Thanks Clothes! Clothes has got everything I need. I love your system. I wish I would have thought of it first.</p>
              </div>
            </div>
            <div class="swiper-slide p-3">
              <div class="testimonial p-5 shadow-sm mb-5">
                <div class="d-flex align-items-center mb-4">
                  <div class="testimonial-img flex-shrink-0"><img class="img-fluid rounded-circle" src="img/person-2.jpg" alt=""></div>
                  <div class="ms-4">
                    <h5 class="mb-0">Mark Huff</h5>
                    <p class="small text-muted mb-1">Businessman</p>
                    <ul class="small list-inline text-primary mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <p class="text-muted text-sm mb-0">Clothes is exactly what our business has been lacking. Clothes did exactly what you said it does. Definitely worth the investment.</p>
              </div>
            </div>
            <div class="swiper-slide p-3">
              <div class="testimonial p-5 shadow-sm mb-5">
                <div class="d-flex align-items-center mb-4">
                  <div class="testimonial-img flex-shrink-0"><img class="img-fluid rounded-circle" src="img/person-1.jpg" alt=""></div>
                  <div class="ms-4">
                    <h5 class="mb-0">Rodel Colez</h5>
                    <p class="small text-muted mb-1">Businessman</p>
                    <ul class="small list-inline text-primary mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <p class="text-muted text-sm mb-0">Thank you so much for your help. Clothes is the next killer app. If you aren't sure, always go for Clothes. I don't always clop, but when I do, it's because of Clothes.</p>
              </div>
            </div>
            <div class="swiper-slide p-3">
              <div class="testimonial p-5 shadow-sm mb-5">
                <div class="d-flex align-items-center mb-4">
                  <div class="testimonial-img flex-shrink-0"><img class="img-fluid rounded-circle" src="img/person-1.jpg" alt=""></div>
                  <div class="ms-4">
                    <h5 class="mb-0">Rodel Colez</h5>
                    <p class="small text-muted mb-1">Businessman</p>
                    <ul class="small list-inline text-primary mb-0">
                      <li class="list-inline-item m-0"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star"></i></li>
                    </ul>
                  </div>
                </div>
                <p class="text-muted text-sm mb-0">The service was excellent. This is simply unbelievable! Thanks to Clothes, we've just launched our 5th website!</p>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <div class="bg-primary py-5 text-white">
      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center">
              <h6 class="h1 mb-0">305</h6>
              <p class="ms-3 flex-grow-1 text-uppercase mb-0">Clothes completed </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center">
              <h6 class="h1 mb-0">809</h6>
              <p class="ms-3 flex-grow-1 text-uppercase mb-0">Satisfied customers </p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center">
              <h6 class="h1 mb-0">354</h6>
              <p class="ms-3 flex-grow-1 text-uppercase mb-0">Feedbacks provided </p>
            </div>
          </div>
          
        </div>
      </div>
    </div>

    {{-- Footer --}}
    <x-header.footer />

    <!-- JavaScript files-->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/navbar-transition.js')}}"></script>
    <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('vendor/modal-video/js/modal-video.js')}}"></script>
    <script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      
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
              <div class="col-12 p-0 m-0"><img src="${product.images[0].src}" alt="" width="100%"></div>
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

    </script>

    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="{{asset('js/navbar-transition.js')}}"></script>
  </body>
</html>