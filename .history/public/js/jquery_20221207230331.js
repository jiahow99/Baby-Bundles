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
            alert("Hello");
        }
    });
});