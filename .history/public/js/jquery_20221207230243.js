$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/user/fetch/cart",
        type: "get",
        dataType: "JSON",
        success:function(product)
        {
            var len = product.length;
            if(len > 0){
                for(i=0 ; i<len; i++){
                var str = '<div class="row border-bottom">' + '<div class="row main align-items-center">' +
                '<div class="col-2"><img class="img-fluid" src="' + product[i].src +  '"></div>' +
                '<div class="col"><div class="row text-muted">' + product[i].category  +  '</div><div class="row">' + product[i].title +  '</div></div>' +
                '<div class="col"><span>1</span></div>' + '<div class="col price-label">RM ' + product[i].price + '<a  href="shopping-cart.php?action=remove&id=' + product[i].product_id + '"class="close">&#10005;</a>' +
                '</div></div></div>';

                var backToHome = '<div class="back-to-shop"><a href="shopping-page.php">&leftarrow;<span class="text-muted ml-1">Back to shop</span></a></div>';
                var totalPrice = 0;

                $('#shopping-cart').append(str);
                }
            $('#shopping-cart').append(backToHome);
            }
        }
    });
});