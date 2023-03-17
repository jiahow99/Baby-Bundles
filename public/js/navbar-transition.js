var navbar = document.getElementById("navbar");
var dropdown_menu = document.getElementById("dropdown-menu");


window.onscroll = function(){
  if(window.scrollY > 10){
    navbar.classList.remove("bg-opacity-75");
    dropdown_menu.classList.remove("bg-opacity-75");
  }else{
    navbar.classList.add("bg-opacity-75");
    dropdown_menu.classList.add("bg-opacity-75");
  }
}


$( document ).ready(function(event) {

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

  
  // Remove sidebar contents
  $("#remove_sidecart").click(function() {
    const product_id = $(this).data('id');
    const remove_url = $(this).data('url');

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      url: remove_url,
      type: 'post',
      dataType: 'JSON',
      success:function(data)
      {
        console.log("product removed");   
      }
    });
  });


});