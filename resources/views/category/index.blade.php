<x-category-master>

    @section('title')
        <title>Product - {{$category->name}}</title>
    @endsection

    @section('product')

    <div class="row justify-content-around mx-auto">
        @foreach ($products as $product_item)
            <div class="col-3 mb-4">
                <div class="product card border-0" style="width:250px;">
                    <!-- Product image-->
                    <div class="overflow-hidden">
                        <a 
                        href="javascript:void(0)"
                        id="show-product"
                        data-url={{ route('product.profile', $product_item->id) }}
                        data-id={{ $product_item->id }}
                        data-title={{ $product_item->title }}
                        data-img={{ $product_item->images }}
                        data-price={{ $product_item->price }}
                        data-category={{ $product_item->category->name }}
                        >
                            <img class='card-img-top' style='width:250px;height:260px;' src='{{asset($product_item->images->first()->src)}}'>
                        </a>
                    </div>
                    <!-- Product details-->
                    <div class="card-body pt-3 pb-3" style="height:120px;">
                        <div>
                            <!-- Product name-->
                            <div class="row " style="height:40px;">
                                <h6 class="justify-content-start col-10 product-title-card">{{mb_strimwidth($product_item->title, 0, 38, "...")}}</h6>
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
                                <span class="col-9 justify-content-start product-price-card">RM {{$product_item->price}}</span>
                            </div>
                            <span id="product_title_{{$product_item->id}}" class="d-none">{{ $product_item->title }}</span>
                            <span id="product_description_{{$product_item->id}}" class="d-none">{{ $product_item->description }}</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    
                </div>
            </div>
        @endforeach

        {{-- Pagination Links --}}
        <div class="d-flex justify-content-center">
            {{$products->links('pagination::bootstrap-4')}}
        </div>



        <!-- Modal View -->
        <div class="modal fade bd-example-modal-lg" id="productShowModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"  style="border-radius:10px">
                    <!-- Close Modal -->
                    <button type="button" class="btn text-danger" style="position: absolute; top:0px; right:10px; font-size:35px;" aria-label="Close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row mt-3">
                        <!-- Product Image -->
                        <div class="col-lg-5">
                            <!-- Main image -->
                            <div class="main_image">
                                <img src="" id="main_product_image" width="350">
                            </div>
                            <!-- Thumbnail images -->
                            <div class="thumbnail_images row">
                                <ul id="thumbnail">
                                    <li>
                                        <img onclick="changeImage(this)" id="preview_product_image_1" src="{{asset('img/top/top01.jpg')}}" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" id="preview_product_image_2" src="{{asset('img/top/top02.jpg')}}" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" id="preview_product_image_3" src="{{asset('img/top/top03.jpg')}}" width="70">
                                    </li>
                                    <li>
                                        <img onclick="changeImage(this)" id="preview_product_image_4" src="{{asset('img/top/top04.jpg')}}" width="70">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 ">
                            <div class="mt-5">
                                <!-- Product Title -->
                                <div class="col-10 d-flex justify-content-start">
                                    <p id="product-title" class="product-title"></p>
                                </div>
                                <!-- Favourite action -->
                                <i class='bx bx-heart col' style="font-size: 30px;"></i>
                            </div>
                            <!-- Category -->
                            <div class="text-muted d-flex" style="font-size:14px" id="product-category"></div>
                            <!-- Description -->
                            <p class="d-flex text-left" id="product-description"> </p>
                            <!-- Price -->
                            <div class="d-flex"><p id="product-price" class="product-price">RM </p></div>
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
                                {{-- <button class="btn-outline-add addToCartBtn" style="border-width: 3px;">
                                    Add to Cart
                                </button> --}}
                                <button class="add-to-cart">
                                    <span class="text">Add To Cart</span>
                                    <span class="spinner">
                                        <div class="loader"></div>
                                    </span>
                                </button>
                                <input type="hidden" id="selected-product-id" value="">
                            </div>
                
                            <!-- Accordian -->
                            <div class="row" style="margin-top:1rem; margin-bottom:2rem">
                                <div class="col-lg-9 mx-auto-custom" style="width:100%">
                                    <!-- Accordion -->
                                    <div id="accordionExample" class="accordion shadow">
                                        <!-- Accordion item 1 -->
                                        <div class="card">
                                            <div id="headingOne" class="card-header bg-white shadow-sm border-0" >
                                                <h2 class="mb-0">
                                                    <!-- Title -->
                                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="btn btn-link text-dark  text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                        SIZE DETAILS
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample" class="collapse">
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
                                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link" style="font-size:15px;font-weight:bold;">
                                                        DELIVERY FEE
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" class="collapse">
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
                                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link " style="font-size:15px;font-weight:bold;">
                                                    SHIPPING INFO
                                                </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample" class="collapse">
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


    @section('script')

        // Change image
        function changeImage(element) {
            var main_prodcut_image = document.getElementById('main_product_image');
            main_product_image.src = element.src;
        }      
        
        // Product Modal Show
        $(document).ready(function(){
            $('body').on('click', '#show-product', function(){
                $('#productShowModal').modal('show');   // Show modal
                
                let productURL = $(this).data('url');   // Add to cart (url)
                let product_id = $(this).data('id');    

                let get_by_title = '#product_title_' + product_id;
                let get_by_description = '#product_description_' + product_id;

                $('#product-title').text($(get_by_title).text());
                $('#product-description').text($(get_by_description).text());

                $('#selected-product-id').val($(this).data('id'))   // Selected product(id)
                $('#product-price').text("RM " + $(this).data('price'));
                $('#product-category').text("Category: " + $(this).data('category'));
                $('#main_product_image').attr('src', "http://127.0.0.1:8000/" + $(this).data('img')[0].src  );
                // $('#preview_product_image_1').attr('src', data.image);
                // $('#preview_product_image_2').attr('src', data.image);
                // $('#preview_product_image_3').attr('src', data.image);
                // $('#preview_product_image_4').attr('src', data.image);
                
            });

            // Add To Cart
            $('.add-to-cart').click(function(e){
                e.preventDefault();
                
                // Get Product ID
                var product_id = $('#selected-product-id').val();

                // Loading animation
                $(this).addClass('loading');

                // Ajax Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "{{route('cart.addToCart')}}",
                    data: {
                        'product_id' : product_id,
                    },
                    // Added Successfully
                    success: function(response){
                        if(response.status == 'success'){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Your product has been added',
                                showConfirmButton: false,
                                timer: 1500,
                                width: 500,
                                padding: '3em',
                            })
                            
                        }
                    },
                    // Item already in cart
                    error: function(text){
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Item already in your cart',
                            showConfirmButton: false,
                            timer: 1500,
                            width: 400,
                            padding: '3em',
                        })
                    },
                    complete: function(){
                        $('.add-to-cart').removeClass('loading');
                    }
                });

            });
        });

        


    @endsection

        
    

</x-category-master>
