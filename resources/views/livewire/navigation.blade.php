<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm bg-opacity-75"  id="navbar">
    <div class="container">
      <a href="{{route('home')}}" class="d-flex align-items-center">
        <img src="img/baby-bundles-logo.png" width="60" alt="" class="navbar-brand" style="margin-right:0 ;">
        <span class="nav-title" style="width: 200px;">Baby Bundles</span>
      </a>
      <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <!-- Home (navigation) -->
          <li class="nav-item mx-2">
            <a class="nav-link text-uppercase" href="{{route('home')}}" id="home">Home</a>
          </li>
          <!-- Shop (navigation) -->
          <li class="nav-item mx-2">
            <a class="nav-link text-uppercase" href="{{route('user.shop')}}" id="Shopping Page">Shop</a>
          </li>
          <!-- Categories (navigation) -->
          <li class="nav-item mx-2 dropdown">
            <a class="nav-link text-uppercase dropdown-toggle pe-1" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu mt-lg-3 text-sm bg-light bg-opacity-75" aria-labelledby="navbarDropdownMenuLink" id="dropdown-menu">
              @foreach ($category_id as $category => $id)
                <a class="dropdown-item" href="{{route('category.index', $id)}}">{{$category}}</a>
              @endforeach
            </div>
          </li>
          <li class="nav-item mx-2">
            <script>
              function redirect(){
                location.replace("index.php");
              }
              if(document.title != "Home"){
                document.write('<a class="nav-link text-uppercase" href="index.php#about" id="About" >About</a>')
              }else{
                document.write('<a class="nav-link text-uppercase" href="#about" id="About">About</a>')
              }
            </script>
            
          </li>
          
          <li class="nav-item ms-3">
            <a class="btn btn-primary px-4" href="contact-form.php#contact-form">Contact </a>
          </li>
          
            <!-- if logged in -->
            @if (Auth::check())
                
            {{-- <li id="cart-toggler">
                <a class="btn btn-outline-dark px-4 ms-lg-3 py-2" href="{{route('user.cart')}}" style="padding-top: 0.37rem;padding-bottom: 0.37rem;">
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill" id="cartItemQuantity">{{Auth::user()->cart->product_qty ?? 0}}</span>
                </a>
            </li> --}}

            <li id="cart-toggler" data-url="{{route('product.sidebarcart')}}">
              <div class="btn btn-outline-dark px-4 ms-lg-3 py-2" style="padding-top: 0.37rem;padding-bottom: 0.37rem;">
                  Cart
                  <span class="badge bg-dark text-white ms-1 rounded-pill" id="cartItemQuantity">{{Auth::user()->cart->product_qty ?? 0}}</span>
              </div>
          </li>
  
              <!-- User account dropdown -->
              <li class="nav-item dropdown mx-lg-3 col-2 col-lg-1" >
                <a href="#" class="nav-link dropdown-toggle user-account text-black" id="userDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu text-sm " aria-labelledby="userDropdownMenuLink">
                  <a href="{{route('user.edit', Auth::user()->id)}}" class="dropdown-item">Account</a>
                  <a href="#" class="dropdown-item">My Listing</a>
                  <a href="{{route('order.index')}}" class="dropdown-item">My Orders</a>
                  <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                </div>
              </li>
            
            @else
              <li><a href="{{route('login')}}" class="btn btn-outline-dark ms-4 px-4">Sign In</a></li>

            @endif
        </ul>
      </div>
    </div>
</nav>
