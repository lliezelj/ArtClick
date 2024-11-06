<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>ArtClick</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Molla - Bootstrap eCommerce Template" />
    <meta name="author" content="p-themes" />
    <!-- Favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset('customer/images/icons/apple-touch-icon.png') }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('customer/images/icons/favicon-32x32.png') }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('customer/images/icons/favicon-16x16.png') }}"
    />
    <link rel="manifest" href="{{ asset('customer/images/icons/site.html') }}" />
    <link
      rel="mask-icon"
      href="{{ asset('customer/images/icons/safari-pinned-tab.svg') }}"
      color="#666666"
    />
    <link rel="shortcut icon" href="{{ asset('customer/images/icons/favicon.ico') }}" />
    <meta name="apple-mobile-web-app-title" content="Molla" />
    <meta name="application-name" content="Molla" />
    <meta name="msapplication-TileColor" content="#cc9966" />
    <meta
      name="msapplication-config"
      content="{{ asset('assets/images/icons/browserconfig.xml') }}"
    />
    <meta name="theme-color" content="#ffffff" />
    <link
      rel="stylesheet"
      href="{{ asset('customer/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}"
    />
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}" />
    <link
      rel="stylesheet"
      href="{{ asset('customer/css/plugins/owl-carousel/owl.carousel.css') }}"
    />
    <link
      rel="stylesheet"
      href="{{ asset('customer/css/plugins/magnific-popup/magnific-popup.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('customer/css/plugins/jquery.countdown.css') }}" />
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/skins/skin-demo-2.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/demos/demo-2.css') }}" />
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
                  <a href="" class="btn btn-outline-primary-2"><span>Sign Up</span><i class="icon-long-arrow-right"></i></a>
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
      <!-- End .header -->

      <main class="main">
        <div class="intro-slider-container">
          <div
            class="owl-carousel owl-simple owl-light owl-nav-inside"
            data-toggle="owl"
            data-owl-options='{"nav": false}'
          >
            <div
              class="intro-slide"
            >
              <div class="container intro-content">
                <p class="intro-subtitle">Express your art with handmade art</p>
                <!-- End .h3 intro-subtitle -->
                <h4 class="intro-title">
                  Enhance your space with unique handmade <br />
                  art and unique crafts that showcase your style <br />
                  and add character.
                </h4>
                <!-- End .intro-title -->

                <a href="login.html" class="btn btn-primary">
                  <span>Sign Up</span>
                  <i class="icon-long-arrow-right"></i>
                </a>
              </div>
            </div>
            <!-- End .intro-slide -->
          </div>
          <!-- End .owl-carousel owl-simple -->
          <span class="slider-loader text-white"></span
          ><!-- End .slider-loader -->
        </div>
        <!-- End .intro-slider-container -->

       
        <div
          class="brands-border owl-carousel owl-simple"
          data-toggle="owl"
          data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 0,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1024": {
                            "items":6
                        },
                        "1360": {
                            "items":7
                        }
                    }
                }'
        ></div>
        <!-- End .brands-border -->

        <div class="mb-3"></div>
        <!-- End .mb-6 -->

        <div class="container-fluid">
          <div class="tab-content tab-content-carousel">
            <div
              class="tab-pane p-0 fade show active"
              id="products-featured-tab"
              role="tabpanel"
              aria-labelledby="products-featured-link"
            >
              <div
                class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                data-toggle="owl"
                data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'
              ></div>
              <!-- End .owl-carousel -->
            </div>
            <!-- .End .tab-pane -->
          </div>
          <!-- End .tab-content -->
        </div>
        <!-- End .container-fluid -->

        <div class="mb-5"></div>
        <!-- End .mb-5 -->
      </main> 
      <!-- End .main -->
      <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="105"
                                    height="25" />
                                <p>
                                    Asiano's Arts and Crafts offers handmade creations
                                    by skills artisan, showcasing authentic, high-quality
                                    products that blend traditon and creativity.
                                </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                                            class="icon-youtube"></i></a>
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
                                    <li><a href="about.html">About Asiano</a></li> <!-- wala pang html ito-->
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="login.html">Register</a></li>
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
                                    <li><a href="login.html">Account</a></li>
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
      <!-- Plugins JS File -->
      <script src="{{ asset('customer/js/jquery.min.js') }}"></script>
      <script src="{{ asset('customer/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('customer/js/jquery.hoverIntent.min.js') }}"></script>
      <script src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script>
      <script src="{{ asset('customer/js/superfish.min.js') }}"></script>
      <script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('customer/js/jquery.plugin.min.js') }}"></script>
      <script src="{{ asset('customer/js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{ asset('customer/js/jquery.countdown.min.js') }}"></script>
      <!-- Main JS File -->
      <script src="{{ asset('customer/js/main.js') }}"></script>
      <script src="{{ asset('customer/js/demos/demo-2.js') }}"></script>
    </div>
    <!-- End .page-wrapper -->
  </body>
</html>
