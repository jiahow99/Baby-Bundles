<?

require_once('dbcontroller.php');

$db_controller = new DBController();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Product - Top</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset}}" rel="styles('css/shopping-style.cssheet" />
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
        <link rel="stylesheet" href="{{asset('css/header-style.css')}}">

    </head>

    <body>
        {{-- Header Nav --}}
        <x-header.header></x-header.header>
        <!-- Header-->
        <section class="img-fluid bg-secondary py-6" style="padding-top:150px;background-image: url(img/top-banner.jpg);background-position: center;background-size: cover;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="text-lg fw-bolder text-white">Accessories</h1>
                </div>
            </div>
        </section>
        <!-- Section-->
        <section class="pt-5">
            <div class="container px-4 px-lg-5 mt-2">
                <div class="row gx-2 gx-lg-0 gy-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- Product Display -->
                    <form action="" class="p-0">
                        <div class="col">
                            <div class="product card border-0" style="width:250px;">
                                <!-- Product image-->
                                <div class="overflow-hidden">
                                    <?php echo "<a href='product-page.php?id=".$accessories['product_id']."'><img class='card-img-top' style='width:250px;height:260px;' src='".$accessories['image']."'</a>"; ?>
                                </div>
                                <!-- Product details-->
                                <div class="card-body pt-3 pb-3" style="height:120px;">
                                    <div>
                                        <!-- Product name-->
                                        <div class="row " style="height:40px;">
                                            <h6 class="justify-content-start col-10 text-black"><?php echo mb_strimwidth($accessories['title'], 0, 40, "...") ?></h6>
                                            <!-- Favourite icon -->
                                            <i class="fa fa-heart justify-content-end col-2"></i>
                                        </div>
                                        <!-- Product condition-->
                                        <div class="d-flex small mb-1 gap-1">
                                        </div>
                                        <!-- Product price-->
                                        <div class="row">
                                            <span class="text-primary fw-bold text-lg col-9 justify-content-start">RM <?php echo $accessories['price'] ?></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Product actions-->
                                
                            </div>
                        </div>
                    </form>
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
