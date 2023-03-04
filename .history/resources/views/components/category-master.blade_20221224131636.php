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
        <!-- JQuery-->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @livewireStyles
        @livewireScripts
    </head>

    <body>
        {{-- Header Nav --}}
        <livewire:navigation />
        
        {{-- Main Content --}}
        <section style="padding-top:90px">
            <div class="row px-5">
                <!-- Filter-->
                <div class="col-3 card pt-4">
                    <div class="text-center">
                        <h3 class="text-primary">Filter</h3>
                    </div>
                    <livewire:filter />
                </div>
                <!-- Products-->
                <div class="col-9 px-1">
                    @yield('product')
                </div>
            </div>
        </section>
        <!-- Footer-->
        <x-header.footer></x-header.footer>
        
       
    </body>
    <script src="{{asset('js/navbar-transition.js')}}"></script>
</html>
