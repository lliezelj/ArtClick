<!DOCTYPE html>
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ArtClick</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('customer/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('customer/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('customer/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('customer/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('customer/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('customer/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('customer/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/plugins/nouislider/nouislider.css') }}">
</head>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
       <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    text: '{{ session('error') }}'
                });
            @endif
        });
    </script>
<style>
    .review-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin: 10px;
}
    .modal-dialog {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: calc(100vh - 1rem);
    }

    .modal-content {
      width: 80%;
      /* Adjust the width as needed */
      max-width: 600px;
      /* Maximum width */
      margin: auto;
      box-sizing: border-box;
      /* Apply box-sizing */
    }
</style>

<body>
    <div class="page-wrapper">
    <header class="header">
      <div class="header-top">
        <div class="container"></div>
        <!-- End .container -->
      </div>
      <!-- End .header-top -->

      <div class="header-middle sticky-header">
        <div class="container">
          <div class="header-left">
            <button class="mobile-menu-toggler">
              <span class="sr-only">Toggle mobile menu</span>
              <i class="icon-bars"></i>
            </button>

            <a href="index-1.html" class="logo">
              <img
                src="{{ asset('customer/images/logo.png') }}"
                alt="Molla Logo"
                width="105"
                height="25" />
            </a>

            @include('includes.nav')
            <!-- End .main-nav -->
          </div>
          <!-- End .header-left -->

          <div class="header-right">
            <div class="header-search">
              <a href="#" class="search-toggle" role="button" title="Search"><i
                  class="icon-search"></i></a>
              <form action="#" method="get">
                <div class="header-search-wrapper">
                  <label for="q" class="sr-only">Search</label>
                  <input type="search" class="form-control" name="q" id="q" placeholder="Search in..."
                    required />
                </div>
                <!-- End .header-search-wrapper -->
              </form>
            </div>
            <!-- End .header-search -->
            <div class="dropdown compare-dropdown">
              <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-display="static"
                title="Account" aria-label="Compare Products">
                <i class="icon-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-cart-action">
                  <a href="cart.html" class="btn btn-primary">Account</a>
                  @if(Auth::user())
                  <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-outline-primary-2"><span>Log out</span><i class="icon-long-arrow-left"></i></button>
                </form>
                  @else
                  <a href="{{route('login')}}" class="btn btn-outline-primary-2"><span>Sign Up</span><i class="icon-long-arrow-right"></i></a>
                  @endif
                </div><!-- End .dropdown-cart-total -->
              </div><!-- End .dropdown-menu -->
            </div>
            <!-- End .compare-dropdown -->

            <div class="dropdown cart-dropdown">
              <a href="{{ route('customer.cart') }}" class="dropdown-toggle" role="button">
                <i class="icon-shopping-cart"></i>
              </a>


              <!-- End .dropdown-menu -->
            </div>
            <!-- End .cart-dropdown -->
          </div>
          <!-- End .header-right -->
        </div>
        <!-- End .container -->
      </div>
      <!-- End .header-middle -->
    </header>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                        @if(!empty($viewProductDetails->frame))
                                        {!! $viewProductDetails->frame !!}
                                        @else
                                            <img id="product-zoom" src="{{ $viewProductDetails->product_image ? asset('storage/productPictures/' . $viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                data-zoom-image="{{ $viewProductDetails->product_image ? asset('storage/productPictures/' . $viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                alt="product image">
                                        @endif
                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            
                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                data-zoom-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}">
                                                <img src="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                data-zoom-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}">
                                                <img src="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                    alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                data-zoom-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}">
                                                <img src="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                    alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}"
                                                data-zoom-image="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}">
                                                <img src="{{$viewProductDetails->product_image ? asset('storage/productPictures/' .$viewProductDetails->product_image) : asset('icon/null-image.png') }}" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <br><br>
                                    <h1 class="product-title">{{$viewProductDetails->name}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$reviewsValue}}%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( {{ $reviews }} reviews )</a>
                                        <a class="ratings-text" href="#" data-toggle="modal" data-target="#reviewModal1">Add Review</a>
                                    
                                    </div><!-- End .ratings-container -->
                                    <div class="modal fade" id="reviewModal1" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel1"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="reviewModalLabel1">Add review for product <span class="text-success">{{$viewProductDetails->name}}</span></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <form method="POST" action="{{route('add.review')}}">
                                                    @csrf
                                                    <label for="rating_percentage">Rate:</label>
                                                    <!-- <span id="rangeValue">50</span>
                                                    <input style="width:100%" type="range" id="rating_percentage" name="rating_percentage" min="0" max="100"  oninput="displayValue(this.value)">-->
                                                    <select class="form-control" name="rating_percentage" id="">  
                                                        <option value="" selected disabled>Choose Rate</option>             
                                                        <option style="color:#FFD300; font-size:20px;" value="20">★</option>
                                                        <option style="color:#FFD300; font-size:20px;" value="40">★★</option>
                                                        <option style="color:#FFD300; font-size:20px;" value="60">★★★</option>
                                                        <option style="color:#FFD300; font-size:20px;" value="80">★★★★</option>
                                                        <option style="color:#FFD300; font-size:20px;" value="100">★★★★★</option>
                                                    </select>
                                                    <label for="comment">Comment:</label>
                                                    <textarea style="width:100%" rows="1" class="form-control" id="comment" name="comment"></textarea>
                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $viewProductDetails->id }}">
                                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                                    <div style="margin-top: 10px;">
                                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
                                                    </div>
                                                </form>

                                                <script>
                                                    function displayValue(value) {
                                                        document.getElementById('rangeValue').textContent = value;
                                                    }
                                                </script>

                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <div class="product-price">
                                        {{$viewProductDetails->price}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{$viewProductDetails->description}}</p>
                                    </div><!-- End .product-content -->

                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <div class="details-filter-row details-row-size">
                                            <label for="qty">Qty:</label>
                                            <div class="product-details-quantity">
                                                <input type="number" id="qty" name="order_quantity" class="form-control" value="1" min="1" max="10" step="1" required>
                                            </div><!-- End .product-details-quantity -->
                                        </div><!-- End .details-filter-row -->

                                        <input type="hidden" name="productId" value="{{$viewProductDetails->id}}">

                                        <div class="details-filter-row details-row-size">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right: 15px;">
                                                <i class="icon-cart-plus"></i>Add to cart
                                            </button>
                                            <a href="#" class="btn btn-primary btn-sm">
                                                <i class="icon-shopping-bag"></i>Buy now
                                            </a>
                                        </div><!-- End .details-filter-row -->
                                    </form>
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->

                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true"></a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Review</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                        non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                        fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                        felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                        ligula vulputate sem tristique cursus. </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                aria-labelledby="product-shipping-link">
                               
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->

                        
                    </div><!-- End .product-details-tab -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true"></a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <h6>Product Reviews</h6>
                                @foreach ($productReviews as $review)
                                <div class="product-desc-content">
                                    
                                    <div class="ratings-container">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{ $review->user->profile_image ? asset('storage/pictures/' .$review->user->profile_image) : asset('storage/pictures/null-profile.png') }}" alt="product" class="review-image">
                                    </a>
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{$review->rating_percentage}}%;"></div>
                                          
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link"></a>
                                        
                                    </div>
                                    <p>{{$review->comment}}</p>
                                </div><!-- End .product-desc-content -->
                                @endforeach
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                                aria-labelledby="product-shipping-link">
                               
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->

                        
                    </div><!-- End .product-details-tab -->


                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        @include('includes.footer')

    </div><!-- End .page-wrapper -->
    @include('includes.mobile-nav')

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                        aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email"
                                                name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy"
                                                    required>
                                                <label class="custom-control-label" for="register-policy">I agree to the
                                                    <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="{{ asset ('customer/js/jquery.min.js') }}"></script>
    <script src="{{ asset ('customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('customer/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset ('customer/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset ('customer/js/superfish.min.js') }}"></script>
    <script src="{{ asset ('customer/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset ('customer/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset ('customer/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ asset ('customer/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset ('customer/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->

</html>