<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Product - {{$category->name}}</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/shopping-style.css')}}" rel="stylesheet" />
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <link rel="stylesheet" href="{{asset('css/header-style.css')}}">

    </head>

    <body>
        {{-- Header Nav --}}
        <x-header.header></x-header.header>
        {{-- <!-- Header-->
        <section class="img-fluid bg-secondary py-6" style="padding-top:150px;background-image: url({{asset('img/top-banner.jpg')}});background-position: center;background-size: cover;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="text-lg fw-bolder text-white">Accessories</h1>
                </div>
            </div>
        </section> --}}
        <!-- Section-->
        <section style="padding-top:90px">
            <div class="row px-5">
                <div class="col-3">Filter</div>
                <div class="col-9 px-1">
                    @yield('product')
                </div>
            </div>
        </section>
        <!-- Footer-->
        <x-header.footer></x-header.footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
       
    </body>
    <script src="{{asset('js/navbar-transition.js')}}"></script>

</html>
