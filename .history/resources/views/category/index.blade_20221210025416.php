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
                <div class="modal-content"  style="border-radius:10px">
                    
                    <!-- Modal Header -->
                    {{-- <div class="d-flex justify-content-end">
                        <button type="button" class="btn text-danger mr-5 pr-5" aria-label="Close" data-bs-dismiss="modal">
                            <span aria-hidden="true" >&times;</span>
                        </button>
                    </div> --}}

                    <button type="button" class="btn text-danger" style="position: absolute; top:0px; right:10px; font-size:35px;" aria-label="Close" data-bs-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <!-- Product Content -->
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
                        <div class="col-lg-7">
                            <div class=" pl-3mt-4">
                                <!-- Product Title -->
                                <div class="col-10 d-flex justify-content-start">
                                    <p id="product-title" class="product-title"></p>
                                </div>
                                <!-- Favourite action -->
                                <i class='bx bx-heart col' style="font-size: 30px;"></i>
                            </div>
                            <!-- Category -->
                            <div class="text-muted d-flex" style="font-size:14px" id="product-category">
                                
                            </div>
                            
                            <!-- Contents -->
                            <p class="d-flex text-left" id="product-description"> </p>
                            <!-- Price -->
                            <div class="d-flex">
                                <p id="product-price" class="product-price">RM </p>
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

    {{-- <script type='text/javascript'>
        // Change image
        function changeImage(element) {
            var main_prodcut_image = document.getElementById('main_product_image');
            main_prodcut_image.src = element.src;
        }        
    </script>   --}}

    

    @section('script')
        <script type="text/javascript">
        
        $(document).ready(function(){
            $('body').on('click', '#show-product', function(){
                var productURL = $(this).data('url');
                $.get(productURL, function(data){
                    $('#productShowModal').modal('show');
                        $('#product-title').text(data.title);
                        $('#product-price').text("RM " + data.price.toFixed(2));
                        $('#product-category').text("Category: " + data.category.name);
                        $('#main_product_image').attr("src", data.image);
                });
            });
        });

        </script>
    @endsection

        
    

</x-category-master>