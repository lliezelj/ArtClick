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
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/plugins/nouislider/nouislider.css') }}">
</head>

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

            <nav class="main-nav">
              <ul class="menu sf-arrows">
                <li>
                  <a href="{{ route('homepage') }}" class="sf-with-ul">Home</a>
                </li>
                <li class="megamenu-container active">
                  <a href="{{ route('shop-category') }}" class="sf-with-ul">Shop</a>
                </li>
                <li>
                  <a href="{{ route('gallery') }}" class="sf-with-ul">Gallery</a>
                </li>

                <li>
                  <a href="{{ route('announcement') }}" class="sf-with-ul">Announcement</a>
                </li>
                <li>
                  <a href="{{ route('about') }}" class="sf-with-ul">About</a>
                </li>
                <li>
                  <a href="{{ route('contact') }}" class="sf-with-ul">Contact</a>
                </li>
              </ul>

              <!-- End .menu -->
            </nav>
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
                  <a href="{{ route('signin') }}" class="btn btn-outline-primary-2"><span>Sign Up</span><i class="icon-long-arrow-right"></i></a>
                </div><!-- End .dropdown-cart-total -->
              </div><!-- End .dropdown-menu -->
            </div>
            <!-- End .compare-dropdown -->

            <div class="dropdown cart-dropdown">
              <a href="{{ route('cart') }}" class="dropdown-toggle" role="button">
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
                                            <img id="product-zoom" src="{{ asset('customer/images/products/single/1.jpg') }}"
                                                data-zoom-image="{{ asset('customer/images/products/single/1-big.jpg') }}"
                                                alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{ asset('customer/images/products/single/1.jpg') }}"
                                                data-zoom-image="{{ asset('customer/images/products/single/1-big.jpg') }}">
                                                <img src="{{ asset('customer/images/products/single/1-small.jpg') }}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('customer/images/products/single/2.jpg') }}"
                                                data-zoom-image="{{ asset ('customer/images/products/single/2-big.jpg') }}">
                                                <img src="{{ asset ('customer/images/products/single/2-small.jpg') }}"
                                                    alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('customer/images/products/single/3.jpg') }}"
                                                data-zoom-image="{{ asset('customer/images/products/single/3-big.jpg') }}">
                                                <img src="{{ asset('customer/images/products/single/3-small.jpg') }}"
                                                    alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#"
                                                data-image="{{ asset('customer/images/products/single/4.jpg') }}"
                                                data-zoom-image="{{ asset('customer/images/products/single/4-big.jpg') }}">
                                                <img src="{{ asset('customer/images/products/single/4-small.jpg') }}" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details"> <br><br>
                                    <h1 class="product-title">Qwerty</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews
                                            )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        $84.00
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>Qwerty sfidgfisdf idfgifgeds fgfisdf dsfsfof efdis fdsigfids fisdfisd fdsifsdif sidfsif sif
                                        </p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Select a size</option>
                                                <option value="s">Small</option>
                                                <option value="m">Medium</option>
                                                <option value="l">Large</option>
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1"
                                                max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="#" class="size-guide"><i class="btn-product btn-cart"></i>add to
                                            cart</a>
                                    </div><!-- End .details-filter-row -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true">Description</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra
                                        non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                        fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque
                                        felis. Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer
                                        ligula vulputate sem tristique cursus. </p>
                                    <ul>
                                        <li>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. </li>
                                        <li>Vivamus finibus vel mauris ut vehicula.</li>
                                        <li>Nullam a magna porttitor, dictum risus nec, faucibus sapien.</li>
                                    </ul>

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

        <footer class="footer">
            <div class="footer-middle">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                      <img
                        src="{{ asset('customer/images/logo.png') }}"
                        class="footer-logo"
                        alt="Footer Logo"
                        width="105"
                        height="25"
                      />
                      <p>
                        Asiano's Arts and Crafts offers handmade creations 
                        by skills artisan, showcasing authentic, high-quality 
                        products that blend traditon and creativity.
                      </p>
        
                      <div class="social-icons">
                        <a
                          href="#"
                          class="social-icon"
                          target="_blank"
                          title="Facebook"
                          ><i class="icon-facebook-f"></i
                        ></a>
                        <a
                          href="#"
                          class="social-icon"
                          target="_blank"
                          title="Twitter"
                          ><i class="icon-twitter"></i
                        ></a>
                        <a
                          href="#"
                          class="social-icon"
                          target="_blank"
                          title="Instagram"
                          ><i class="icon-instagram"></i
                        ></a>
                        <a
                          href="#"
                          class="social-icon"
                          target="_blank"
                          title="Youtube"
                          ><i class="icon-youtube"></i
                        ></a>
                        <a
                          href="#"
                          class="social-icon"
                          target="_blank"
                          title="Pinterest"
                          ><i class="icon-pinterest"></i
                        ></a>
                      </div>
                      <!-- End .soial-icons -->
                    </div>
                    <!-- End .widget about-widget -->
                  </div>
                  <!-- End .col-sm-6 col-lg-3 -->
        
                  <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                      <h4 class="widget-title">Useful Links</h4>
                      <!-- End .widget-title -->
        
                      <ul class="widget-list">
                        <li><a href="about.html">About Molla</a></li> <!-- wala pang html ito-->
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="login.html">Log in</a></li>
                      </ul>
                      <!-- End .widget-list -->
                    </div>
                    <!-- End .widget -->
                  </div>
                  <!-- End .col-sm-6 col-lg-3 -->
    
        
                  <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                      <h4 class="widget-title">My Account</h4>
                      <!-- End .widget-title -->
        
                      <ul class="widget-list">
                        <li><a href="login.html">Sign In</a></li>
                        <li><a href="cart.html">View Cart</a></li>
                      </ul>
                      <!-- End .widget-list -->
                    </div>
                    <!-- End .widget -->
                  </div>
                  <!-- End .col-sm-6 col-lg-3 -->
                </div>
                <!-- End .row -->
              </div>
              <!-- End .container -->
            </div>
            <!-- End .footer-middle -->
    
          </footer>
           <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index-1.html">Home</a>
                    </li>
                    <li>
                        <a href="category-boxed.html">Shop</a>
                        <ul>
                            <li><a href="category-list.html">Shop List</a></li>
                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span
                                            class="tip tip-hot">Hot</span></span></a></li>
                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span
                                            class="tip tip-new">New</span></span></a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="#">Lookbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index-7.html" class="sf-with-ul">Gallery</a>
                    </li>
                    <li>
                        <a href="announcement.html">Announcements</a>
                    </li>
                    <li>
                        <a href="about.html">about</a>
                    </li>
                    <li>
                        <a href="contact.html">contact</a>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

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
    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->

</html>