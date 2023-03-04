$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/user/fetch/cart/quantity",
        type: "get",
        dataType: "JSON",
        success:function(data)
        {
            var quantity = $("#cartItemQuantity")
         console.log("");
        }
    });
  });