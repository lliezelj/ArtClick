<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>ArtClick</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('manager/img/artclick-shortcut-icon.png') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/owlcarousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/style.css') }}">
</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

    @include('includes.header')

        @include('includes.sidebar')

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Item Details</h4>
                        <h6>Full details of a item</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="card">
                        
                            <div class="card-body">
                            <div class="search-set" style="margin-bottom: 12px">
                        <div class="search-path">
                                    <a class="btn btn-filter"  href="javascript:history.back()">
                                    <i class="fa fa-arrow-left" style="font-size: 1em; color: white;"></i>
                                    </a>
                                </div> </div>
                                <div class="productdetails">
                                    <ul class="product-bar">
                                        <li>
                                            <h4>Product</h4>
                                            <h6>{{$product->name}}</h6>
                                        </li>
                                        <li>
                                            <h4>Category</h4>
                                            <h6>{{$product->category->name}}</h6>
                                        </li>
                                        <li>
                                            <h4>Price</h4>
                                            <h6>{{$product->price}}</h6>
                                        </li>
                                        <li>
                                            <h4>Size</h4>
                                            <h6>{{$product->size}}</h6>
                                        </li>
                                        <li>
                                            <h4>Description</h4>
                                            <h6>{{$product->description}}</h6>
                                        </li>
                                        <li>
                                        <h4>Artist</h4>
                                        @if($product->artist)
                                            <h6>{{ $product->artist->lastname }}, {{ $product->artist->firstname }}</h6>
                                        @else
                                            <h6></h6>
                                        @endif
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="slider-product-details">
                                    <div class="owl-carousel owl-theme product-slide">
                                        <div class="slider-product">
                                        <img src="{{$product->product_image ? asset('storage/productPictures/' .$product->product_image) : asset('icon/null-image.png') }}" alt="product">
                                            <h4>{{$product->name}}</h4>
                                            <h6>{{$product->category->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('manager/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('manager/js/feather.min.js') }}"></script>

    <script src="{{ asset('manager/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('manager/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>