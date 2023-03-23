<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="{{ asset("css/header-style.css") }}">
  <link rel="stylesheet" href="{{ asset("css/style.default.css") }}">
  <link rel="stylesheet" href="{{ asset("css/login.css") }}">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>  
    <livewire:navigation />

    <div class="cont height" style="margin-top:150px;" id="container">

        <!-- Sign in form -->
        <form class="form sign-in" method="post" action="{{ route('login') }}">
            @csrf

            <h2>Welcome back,</h2>
            <label>
                <span>Email</span>
                <input type="email" name="email" autofocus value=""/>
                <!-- Error message -->
                @error('email')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>
                @enderror
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="password" />
                <!-- Error message -->
                @error('password')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>
                @enderror
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <input class="m-0 p-0" style="width:16px; height:16px;" type="checkbox" name="remember">
                <label class="m-0 p-0 text-muted" style="width:auto;font-size:15px;" for=""> Remember me</label>
            </div>
            <button type="submit" class="submit" name="signin">Sign In</button>
            <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
        </form>

        <!-- Change view to Sign Up -->
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                    </div>
                    <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                    </div>
                    <div class="img__btn" id="change-button">
                    <span class="m--up" id="m-up">Sign Up</span>
                    <span class="m--in" id="m-in">Sign In</span>
                </div>
            </div>

            <!-- Sign up form -->
            <form class="form sign-up" method="post" action="{{ route('register') }}">
                @csrf

                <h2 id="title">Time to feel like home,</h2>

                <label>
                <!-- username -->
                <span >Username</span>
                <input type="text" name="name" value=" " required autofocus>
                <!-- error message  -->
                @error('name')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                </label>

                <label>
                <!-- email -->
                <span>Email</span>
                <input type="email" name="email" value="" required>
                <!-- error message -->
                @error('email')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                </label>

                <label>
                <!-- password -->
                <span>Password</span>
                <input type="password" name="register_password" required>
                <!-- error message -->
                @error('register_password')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                </label>

                <label>
                <!-- confirm password -->
                <span>Confirm Password</span>
                <input type="password" name="confirm_register_password" required>
                <!-- error message -->
                @error('confirm_register_password')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                </label>

                <label>
                <!-- contact -->
                <span>Contact</span>
                <div class="d-flex">
                    <input type="text" name="country_code" class="col-3 bg-secondary bg-opacity-50" style="border-radius:30px;" placeholder="60" value="">
                    <input type="text" name="contact" placeholder="187754338" value="">
                </div>
                <!-- error message -->
                @error('country_code')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                @error('contact')
                <p class='text-danger text-sm' style='margin:0;'>*** {{ $message }}</p>     
                @enderror
                </label>
                <button type="submit" class="submit" name="signup">Sign Up</button>
                <button type="button" class="fb-btn">Join with <span>facebook</span></button>
            </form>
    </div>


        <!-- partial -->
        <script>

    function addHeight(){
      document.getElementById('container').style.height = "800px";
    }

    document.getElementById('change-button').onclick = function(){
      addHeight();
    }

    document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
    });

  </script>
  <script src="{{ asset("js/navbar-transition.js") }}"></script>

</body>

</html>
