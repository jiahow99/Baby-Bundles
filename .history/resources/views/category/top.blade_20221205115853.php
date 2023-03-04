<x-category-master>
    @section('product')
    @foreach ($products as $product_item)
        <div class="col">
            <div class="product card border-0" style="width:250px;">
                <!-- Product image-->
                <div class="overflow-hidden">
                    <a href='#'><img class='card-img-top' style='width:250px;height:260px;' src=''></a>
                </div>
                <!-- Product details-->
                <div class="card-body pt-3 pb-3" style="height:120px;">
                    <div>
                        <!-- Product name-->
                        <div class="row " style="height:40px;">
                            <h6 class="justify-content-start col-10 text-black">{{$product_item->title}}</h6>
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
                            <span class="text-primary fw-bold text-lg col-9 justify-content-start">RM <?php echo $top['price'] ?></span>
                        </div>
                    </div>
                    
                </div>
                <!-- Product actions-->
                
            </div>
        </div>
    @endforeach
    
    @endsection
</x-category-master>