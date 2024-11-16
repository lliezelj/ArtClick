<!DOCTYPE html>
<html lang="en">
<!-- molla/contact.html  22 Nov 2019 10:04:01 GMT -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>ArtClick</title>
  <meta name="keywords" content="HTML5 Template" />
  <meta name="description" content="Molla - Bootstrap eCommerce Template" />
  <meta name="author" content="p-themes" />
  <!-- Favicon -->
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="{{ asset('customer/images/icons/apple-touch-icon.png') }}" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="{{ asset('customer/images/icons/favicon-32x32.png') }}" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="{{ asset('customer/images/icons/favicon-16x16.png') }}" />
  <link rel="manifest" href="{{ asset('customer/images/icons/site.html') }}" />
  <link
    rel="mask-icon"
    href="{{ asset('customer/images/icons/safari-pinned-tab.svg') }}"
    color="#666666" />
  <link rel="shortcut icon" href="{{ asset('customer/images/icons/favicon.ico') }}" />
  <meta name="apple-mobile-web-app-title" content="Molla" />
  <meta name="application-name" content="Molla" />
  <meta name="msapplication-TileColor" content="#cc9966" />
  <meta
    name="msapplication-config"
    content="{{ asset('customer/images/icons/browserconfig.xml') }}" />
  <meta name="theme-color" content="#ffffff" />
  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}" />
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
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
            <form action="{{route('search')}}" method="get">
              <a href="#" type="submit" name="submit" class="search-toggle" role="button" title="Search"><i
                  class="icon-search"></i></a>
                <div class="header-search-wrapper">
                  <label for="q" class="sr-only">Search</label>
                  <input type="search" class="form-control" name="search" id="q" placeholder="Search in..."
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
    <!-- End .header -->

    <main class="main">
      <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page">
              Asiano's Arts and Crafts
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->
      <div class="container">
        <div
          class="page-header page-header-big text-center"
          style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('customer/images/backgrounds/contact.jpg') }}'); background-size: cover; background-position: center;">
          <!-- background pic ng asiano-->
          <h1 class="page-title text-white">
            Contact us<span class="text-white">keep in touch with us</span>
          </h1>
        </div>
        <!-- End .page-header -->
      </div>
      <!-- End .container -->

      <div class="page-content pb-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
              <h2 class="title mb-1">Contact Information</h2>
              <!-- End .title mb-2 -->
              <p class="mb-3">
                Need assistance or have a concern? Our Contact page is here to
                help! Use this space to request information, ask questions, or
                address any issues. We’re always ready to assist you.
              </p>
              <div class="row">
                <div class="col-sm-7">
                  <div class="contact-info">
                    <h3>The Address</h3>

                    <ul class="contact-list">
                      <li>
                        <i class="icon-map-marker"></i>
                        Rizal Avenue, Baranggay San Miguel,
                        Puerto Princesa City
                      </li>
                      <li>
                        <i class="icon-phone"></i>
                        <a href="tel:#">09467293562</a>
                      </li>
                      <li>
                        <i class="icon-envelope"></i>
                        <a href="mailto:#">asianoshop@gmail.com</a>
                      </li>
                    </ul>
                    <!-- End .contact-list -->
                  </div>
                  <!-- End .contact-info -->
                </div>
                <!-- End .col-sm-7 -->
              </div>
              <!-- End .row -->
            </div>
            <!-- End .col-lg-6 -->
            <div class="col-lg-6">
              <h2 class="title mb-1">Got Any Questions?</h2>
              <!-- End .title mb-2 -->
              <p class="mb-2">
                Use the form below to get in touch with the sales team
              </p>

              <form method="POST" action="{{route('add.message')}}" class="contact-form mb-3">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <label for="cname" class="sr-only">Name</label>
                    <input
                      name="fullname"
                      type="text"
                      class="form-control"
                      id="cname"
                      placeholder="Full Name *"
                      required />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="cemail" class="sr-only">Email</label>
                    <input
                     name="email"
                      type="email"
                      class="form-control"
                      id="cemail"
                      placeholder="Email *"
                      required />
                  </div>
                  <!-- End .col-sm-6 -->
                </div>
                <!-- End .row -->

                <div class="row">
                  <div class="col-sm-6">
                    <label for="cphone" class="sr-only">Phone</label>
                    <input
                     name="phone"
                      type="tel"
                      class="form-control"
                      id="cphone"
                      placeholder="Phone" />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="csubject" class="sr-only">Subject</label>
                    <input
                       name="subject"
                      type="text"
                      class="form-control"
                      id="csubject"
                      placeholder="Subject" />
                  </div>
                  <!-- End .col-sm-6 -->
                </div>
                <!-- End .row -->

                <label for="cmessage" class="sr-only">Message</label>
                <textarea
                 name="message"
                  class="form-control"
                  cols="30"
                  rows="4"
                  id="cmessage"
                  required
                  placeholder="Message *"></textarea>

                <button
                  type="submit" name="submit"
                  class="btn btn-outline-primary-2 btn-minwidth-sm">
                  <span>SUBMIT</span>
                  <i class="icon-long-arrow-right"></i>
                </button>
              </form>
              <!-- End .contact-form -->
            </div>
            <!-- End .col-lg-6 -->
          </div>
          <!-- End .row -->

          <div id="faqs" class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
              <div class="container">
                <h1 class="page-title">FAQs</h1>
              </div>
              <!-- End .container -->
            </div>
            <!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">

            </nav>
            <!-- End .breadcrumb-nav -->
             
          <div class="page-content">
              <div class="container">
                <div class="accordion accordion-rounded" id="accordion-1">
                  <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-1">
                      <h2 class="card-title">
                        <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true"
                          aria-controls="collapse-1">
                          What kind of products does ArtClick offer?
                        </a>
                      </h2>
                    </div>
                    <!-- End .card-header -->
                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                      <div class="card-body">
                        ArtClick features a diverse selection of handcrafted items
                        Palawan, including jewerly, texttiles, sculptures, home decor, and more.
                      </div>
                      <!-- End .card-body -->
                    </div>
                    <!-- End .collapse -->
                  </div>
                  <!-- End .card -->

                  <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading-2">
                      <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2"
                          aria-expanded="false" aria-controls="collapse-2">
                          Can I learn more about the cultural background of
                          the products?
                        </a>
                      </h2>
                    </div>
                    <!-- End .card-header -->
                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
                      <div class="card-body">
                        Yes, ARTCLICK products highlight the rich heritage of
                        Asiano and Palawan. They feature traditional pottery, texttiles,
                        and scultures, showcasing the unique artisy and craftmanship of
                        Palawan's local artisans.
                      </div>
                      <!-- End .card-body -->
                    </div>
                    <!-- End .collapse -->
                  </div>
                  <!-- End .card -->

                </div>
                <!-- End .accordion -->

                <h2 class="title text-center mb-3">Orders and Returns</h2>
                <!-- End .title -->
                <div class="accordion accordion-rounded" id="accordion-2">
                  <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-1">
                      <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-1"
                          aria-expanded="false" aria-controls="collapse2-1">
                          How do I place an order to ArtClick?
                        </a>
                      </h2>
                    </div>
                    <!-- End .card-header -->
                    <div id="collapse2-1" class="collapse" aria-labelledby="heading2-1" data-parent="#accordion-2">
                      <div class="card-body">
                        To place an order to ArtClick, browse ands select items, add them to your cart,
                        review your cart, and then proceed to checkout. Enter shipping and payment information.
                      </div>
                      <!-- End .card-body -->
                    </div>
                    <!-- End .collapse -->
                  </div>
                  <!-- End .card -->

                  <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-2">
                      <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-2"
                          aria-expanded="false" aria-controls="collapse2-2">
                          Is it safe to shop online with ArtClick?
                        </a>
                      </h2>
                    </div>
                    <!-- End .card-header -->
                    <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2" data-parent="#accordion-2">
                      <div class="card-body">
                        Yes, it is safe to shop online with ArtClick. We use secure payment
                        methods and encrypt your personal information to protect
                        your privacy.
                      </div>
                      <!-- End .card-body -->
                    </div>
                    <!-- End .collapse -->
                  </div>
                  <!-- End .card -->

                  <div class="card card-box card-sm bg-light">
                    <div class="card-header" id="heading2-3">
                      <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-3"
                          aria-expanded="false" aria-controls="collapse2-3">
                          How do I find a specific product on ArtClick?
                        </a>
                      </h2>
                    </div>
                    <!-- End .card-header -->
                    <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3" data-parent="#accordion-2">
                      <div class="card-body">
                        To find a specific product on ArtClic, use the search bar
                        at the top of the homepage. Enter keywords related to the
                        product you're looking for. You can also browse through categories.
                      </div>
                      <!-- End .card-body -->
                    </div>
                    <!-- End .collapse -->
                  </div>
                  <!-- End .card -->
                </div>
                <!-- End .accordion -->


              </div>
              <!-- End .accordion -->
            </div>

          <!-- End .stores -->
        </div>
        <!-- End .container -->

      </div>
      <!-- End .page-content -->
    </main>
    <!-- End .main -->


    @include('includes.footer')

</div><!-- End .page-wrapper -->
@include('includes.mobile-nav')

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

    <!-- Plugins JS File -->
    <script src="{{ asset('customer/js/jquery.min.js') }}"></script>
    <script src="{{ asset('customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('customer/js/superfish.min.js') }}"></script>
    <script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
</body>

</html>