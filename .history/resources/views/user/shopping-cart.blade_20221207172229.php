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

        <!-- Cart Items -->
        <script>
            $(document).ready(function(){
                $.ajax({
                    url: "fetch_shopping_cart.php",
                    type: "get",
                    dataType: "JSON",
                    success:function(product)
                    {
                        var len = product.length;
                        for(i=0 ; i<len; i++){
                            var str = '<div class="row border-bottom">' + '<div class="row main align-items-center">' +
                            '<div class="col-2"><img class="img-fluid" src="' + product[i].image +  '"></div>' +
                            '<div class="col"><div class="row text-muted">' + product[i].category  +  '</div><div class="row">' + product[i].title +  '</div></div>' +
                            '<div class="col"><span>1</span></div>' + '<div class="col price-label">RM ' + product[i].price + '<a  href="shopping-cart.php?action=remove&id=' + product[i].product_id + '"class="close">&#10005;</a>' +
                            '</div></div></div>';

                            var backToHome = '<div class="back-to-shop"><a href="shopping-page.php">&leftarrow;<span class="text-muted ml-1">Back to shop</span></a></div>';
                            var totalPrice = 0;

                            $('#shopping-cart').append(str);
                        }
                        $('#shopping-cart').append(backToHome);
                    }
                });
            });
        </script>
    </head>


    <body>
        <!-- Header -->
        <x-header.header></x-header.header>
        
        <!-- Container -->
        <div class="card mt-6"  >
            <div class="row" style="height:80vh;">
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
                        <div id="total-price" class="col text-right" style="font-size:20px;">RM 
                            @foreach ($cart_items as $item)
                                $total += $item->price;
                            @endforeach</div>
                    </div>
                    <a href="shopping-cart.php?action=placeorder&item_list=<?php echo $products['product'] ?>">
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