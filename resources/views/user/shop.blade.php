<x-category-master>

@section('title')

    <title>Shop</title>

@endsection


@section('product')

<div class="row justify-content-around mx-auto">

    @foreach ($products as $product_item)
        <div class="col-3 mb-4">
            <div class="product card border-0" style="width:250px;">
                <!-- Product image-->
                <div class="overflow-hidden">
                    <a href='{{ route('product.profile', $product_item->id) }}'><img src='{{ asset($product_item->images->first()->src ?? "") }}' class='card-img-top' style='width:250px;height:260px;' ></a>
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
    

</div>

@endsection

</x-category-master>