<x-category-master>

    @section('title')
        <title>Product - {{$category->name}}</title>
    @endsection

    @section('product')

    <div class="row justify-content-start">
        @foreach ($products as $product_item)
            <div class="col-3 mb-4">
                <div class="product card border-0" style="width:250px;">
                    <!-- Product image-->
                    <div class="overflow-hidden">
                        {{-- <a href='{{route('product.profile', $product_item->id)}}'><img class='card-img-top' style='width:250px;height:260px;' src='{{$product_item->images->first()->src ?? ""}}'></a> --}}
                        <a 
                        href="javascript:void(0)"
                        id="show-product"
                        data-url={{ route('product.profile', $product_item->id) }}
                        >
                            <img class='card-img-top' style='width:250px;height:260px;' src='{{$product_item->images->first()->src ?? ""}}'>
                        </a>
                    </div>
                    <!-- Product details-->
                    <div class="card-body pt-3 pb-3" style="height:120px;">
                        <div>
                            <!-- Product name-->
                            <div class="row " style="height:40px;">
                                <h6 class="justify-content-start col-10 text-black">{{mb_strimwidth($product_item->title, 0, 38, "...")}}</h6>
                                <!-- Favourite icon -->
                                <i class="fa fa-heart justify-content-end col-2"></i>
                            </div>
                            <!-- Product condition-->
                            <div class="d-flex small mb-1 gap-1">
                                <i class="bi bi-star-fill star-filled"></i>
                                <i class="bi bi-star-fill star-filled"></i>
                                <i class="bi bi-star-fill star-filled"></i>
                                <i class="bi bi-star-fill star-filled"></i>
                                <i class="bi bi-star-fill star-filled"></i>
                            </div>
                            <!-- Product price-->
                            <div class="row">
                                <span class="text-primary fw-bold text-lg col-9 justify-content-start">RM {{$product_item->price}}</span>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Product actions-->
                    
                </div>
            </div>
        @endforeach

        <!-- Modal View -->
        <div class="modal fade bd-example-modal-lg" id="productShowModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header justify-content-end">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <!-- Product Content -->
                    <div class="row mt-3">
                        <div class="col-lg-5">
                            <!-- Main image -->
                            <div class="main_image">
                                <img src="img/item-1.jpg" id="main_product_image" width="350">
                            </div>
                            <!-- Thumbnail images -->
                            <div class="thumbnail_images row">
                                <ul id="thumbnail">
                                    <li>
                                        <img onclick="changeImage(this)" src="img/item-2.jpg" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" src="img/item-2.jpg" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" src="img/item-2.jpg" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" src="img/item-2.jpg" width="70">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="col-lg-7 p-3">
                            <div class="row align-items-center">
                                <!-- Product Title -->
                                <div class="col-10 d-flex justify-content-start">
                                    <h3>This is title</h3>
                                </div>
                                <!-- Favourite action -->
                                <i class='bx bx-heart col' style="font-size: 30px;"></i>
                            </div>
                            <!-- Category -->
                            <div class="text-muted d-flex" style="font-size:14px">
                                Category: Top
                            </div>
                            
                            <!-- Contents -->
                            <p class="d-flex text-left" style="flex-wrap: nowrap;"> sdacdacsdacacd sdacdacsdacacd sdacdacsdacacd sdacdacsdacacd</p>
                            <!-- Price -->
                            <div class="d-flex">
                                <h3>RM 32.00</h3>
                            </div>
                            <!-- Stars rating -->
                            <div class="ratings d-flex flex-row align-items-center">
                                <div class="d-flex flex-row">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- review count -->
                                <span>441 reviews</span>
                            </div>
                            <!-- Buttons -->
                            <div class="buttons d-flex flex-row gap-3" style="margin-top:30px">
                                <a class="btn-add">
                                    Buy Now
                                </a>
                                <button class="btn-outline-add addToCartBtn" style="border-width: 3px;">
                                    Add to Cart
                                </button>
                                {{-- <input type="hidden" id="product_id" value="{{$product->id}}"> --}}
                            </div>
                
                            <!-- Accordian -->
                            <div class="row" style="margin-top:6.5rem;">
                                <div class="col-lg-9 mx-auto-custom" style="width:100%">
                                    <!-- Accordion -->
                                    <div id="accordionExample" class="accordion shadow">
                                        <!-- Accordion item 1 -->
                                        <div class="card">
                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0" >
                                                <h2 class="mb-0">
                                                    <!-- Title -->
                                                    <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="btn btn-link text-dark  text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                        SIZE DETAILS
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse">
                                                <div class="card-body p-5">
                                                    <!-- Content -->
                                                    <p class="font-weight-light m-0">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                    </p>
                                                </div>
                                            </div>
                                        </div><!-- End -->
                                        <!-- Accordion item 2 -->
                                        <div class="card">
                                            <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                                <h2 class="mb-0">
                                                    <!-- Title -->
                                                    <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                        DELIVERY FEE
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                                <div class="card-body p-5">
                                                    <!-- Content -->
                                                    <p class="font-weight-light m-0">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                                    </p>
                                                </div>
                                            </div>
                                        </div><!-- End -->
                                        <!-- Accordion item 3 -->
                                        <div class="card">
                                            <div id="headingThree" class="card-header bg-white shadow-sm border-0 ">
                                                <h2 class="mb-0">
                                                    <button type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link " style="font-size:15px;font-weight:bold;">
                                                    SHIPPING INFO
                                                </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                                                <div class="card-body p-5">
                                                    <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                                </div>
                                            </div>
                                        </div><!-- End -->
                                    </div><!-- End -->
                                </div>
                            </div>
                            <!-- End of accordian -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    @endsection

    <script type='text/javascript'>
            

        // Change image
        function changeImage(element) {
            var main_prodcut_image = document.getElementById('main_product_image');
            main_prodcut_image.src = element.src;
        }          

        // JQuery
        $(document).ready(function(){

            // Add To Cart (clicked)
            // $('.addToCartBtn').click(function(e){
            //     e.preventDefault();
            //     // Get Product ID
            //     var product_id = $('#product_id').val();

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     // Ajax
            //     $.ajax({
            //         type: "post",
            //         url: "{{route('cart.addToCart')}}",
            //         data: {
            //             'product_id' : product_id,
            //         },
            //         success: function(response){
            //             if(response.status == 'success'){
            //                 Swal.fire({
            //                     position: 'center',
            //                     icon: 'success',
            //                     title: 'Your product has been added',
            //                     showConfirmButton: false,
            //                     timer: 1500,
            //                     width: 500,
            //                     padding: '3em',
            //                 })
            //             }
            //         },
            //         error: function(text){
            //             Swal.fire({
            //                 position: 'center',
            //                 icon: 'warning',
            //                 title: 'Item already in your cart',
            //                 showConfirmButton: false,
            //                 timer: 1500,
            //                 width: 400,
            //                 padding: '3em',
            //             })
            //         }
            //     });
            // });


            // Product Modal
            $("#show-product").click(function(){
                console.log('jello');
            });


        });
        
    </script>

</x-category-master>