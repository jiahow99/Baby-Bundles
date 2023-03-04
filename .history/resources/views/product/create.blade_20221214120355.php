<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Sell Product</title>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- Main CSS-->
    <link href="{{asset('css/upload-product.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet">
    <link href="{{asset('css/header-style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <x-header.header></x-header.header>
    
    <div class="page-wrapper upload-bg-dark p-t-100 p-b-50"  id="upload-product">
        <div class="wrapper wrapper--w900">
            <div class="upload-card card-6">
                <div class="card-heading">
                    <h2 class="title text-center my-4">Sell Your Product</h2>
                </div>
                <div class="upload-card-body">
                    <!-- Form -->
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Title -->
                        <div class="form-row">
                            <div class="name text-uppercase">Title</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="title" placeholder="Enter product title" autofocus>
                                <!-- Error Message -->
                                @error('title')
                                    <div class="text-danger text-md fw-bold">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Product Category -->
                        <div class="form-row">
                            <div class="name text-uppercase">Category</div>
                            <div class="value">
                                <div class="input-group">
                                    <select class="form-select" name="category" aria-label="multiple select example" required>
                                        <option>-- Select Category --</option>
                                        <option value="top">Top</option>
                                        <option value="bottom">Bottom</option>
                                        <option value="shoes">Shoes</option>
                                        <option value="outfit">Outfit</option>
                                    </select>
                                </div>
                            <<!-- Error Message -->
                            @error('category')
                                <div class="text-danger text-md fw-bold">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="form-row">
                            <div class="name text-uppercase">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="description" placeholder="Say something about your product"></textarea>
                                </div>
                                <!-- Error Message -->
                                @error('description')
                                    <div class="text-danger text-md fw-bold">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Product Condition -->
                        <div class="form-row">
                            <div class="name text-uppercase">Condition</div>
                            <div class="value">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" required id="inlineRadio1" value="1">
                                    <label class="form-check-label small" for="inlineRadio1">1 (Very Poor)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" required id="inlineRadio2" value="2">
                                    <label class="form-check-label small" for="inlineRadio2">2 (Poor)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" required id="inlineRadio3" value="3">
                                    <label class="form-check-label small" for="inlineRadio3">3 (Good)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" required id="inlineRadio4" value="4">
                                    <label class="form-check-label small" for="inlineRadio4">4 (Very Good)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="condition" required id="inlineRadio5" value="5">
                                    <label class="form-check-label small" for="inlineRadio5">5 (Like New)</label>
                                </div>
                                <!-- Error Message -->
                                @error('condition')
                                    <div class="text-danger text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Product Price -->
                        <div class="form-row">
                            <div class="name text-uppercase">Price</div>
                                <div class="value">
                                    <div class="d-flex">
                                        <span class="input-group-text fw-bold">RM</span>
                                        <input class="input--style-6" type="text" name="price" placeholder="0.00">
                                    </div>
                                    <!-- Error Message -->
                                    @error('price')
                                        <div class="text-danger text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                        </div>  
                        <div class="form-row">
                            <!-- Product Image -->
                            <div class="name text-uppercase">Media</div>
                            <div class="value">
                                <input type="file" name="image" id="file">
                                <!-- Error Message -->
                                @error('image')
                                    <div class="text-danger pt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                                <div class="label--desc">Upload your product image.</div>
                            </div>
                        </div>
                        <div class="form-row" style="justify-content: right">
                            <button class="upload-btn btn--radius-2 btn--red" type="submit" name="submit">Save</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
</div>

    <!-- Footer -->
    <x-header.footer></x-header.footer>
</body>

<script src="{{asset('js/navbar-transition.js')}}"></script>


</html>
<!-- end document-->