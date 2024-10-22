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
                <li>
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
                <li class="megamenu-container active">
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
                  <a href="" class="btn btn-outline-primary-2"><span>Sign Up</span><i class="icon-long-arrow-right"></i></a>
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
          style="background-image: url('customer/images/items/item5.gif')">
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

              <form action="#" class="contact-form mb-3">
                <div class="row">
                  <div class="col-sm-6">
                    <label for="cname" class="sr-only">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="cname"
                      placeholder="Name *"
                      required />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="cemail" class="sr-only">Email</label>
                    <input
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
                      type="tel"
                      class="form-control"
                      id="cphone"
                      placeholder="Phone" />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="csubject" class="sr-only">Subject</label>
                    <input
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
                  class="form-control"
                  cols="30"
                  rows="4"
                  id="cmessage"
                  required
                  placeholder="Message *"></textarea>

                <button
                  type="submit"
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

          <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
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



    <div class="mobile-menu-container">
      <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
          <label for="mobile-search" class="sr-only">Search</label>
          <input
            type="search"
            class="form-control"
            name="mobile-search"
            id="mobile-search"
            placeholder="Search in..."
            required />
          <button class="btn btn-primary" type="submit">
            <i class="icon-search"></i>
          </button>
        </form>

        <nav class="mobile-nav">
          <ul class="mobile-menu">
            <li class="active">
              <a href="index-1.html">Home</a>
            </li>

            <li>
              <a href="category.html">Shop</a>
              <ul>
                <li><a href="category-list.html">Shop List</a></li>
                <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                <li><a href="category.html">Shop Grid 3 Columns</a></li>
                <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                <li>
                  <a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a>
                </li>
                <li>
                  <a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a>
                </li>
                <li>
                  <a href="product-category-boxed.html">Product Category Boxed</a>
                </li>
                <li>
                  <a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a>
                </li>
                <li><a href="cart.html">Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="wishlist.html">Wishlist</a></li>
                <li><a href="#">Lookbook</a></li>
              </ul>
            </li>
            <li>
              <a href="product.html" class="sf-with-ul">Gallery</a>
              <ul>
                <li><a href="product.html">Default</a></li>
                <li><a href="product-centered.html">Centered</a></li>
                <li>
                  <a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a>
                </li>
                <li><a href="product-gallery.html">Gallery</a></li>
                <li><a href="product-sticky.html">Sticky Info</a></li>
                <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                <li><a href="product-fullwidth.html">Full Width</a></li>
                <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
              </ul>
            </li>
            <li>
              <a href="#">Pages</a>
              <ul>
                <li>
                  <a href="about.html">About</a>

                  <ul>
                    <li><a href="about.html">About 01</a></li>
                    <li><a href="about-2.html">About 02</a></li>
                  </ul>
                </li>
                <li>
                  <a href="contact.html">Contact</a>

                  <ul>
                    <li><a href="contact.html">Contact 01</a></li>
                    <li><a href="contact-2.html">Contact 02</a></li>
                  </ul>
                </li>
                <li><a href="login.html">Login</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="404.html">Error 404</a></li>
                <li><a href="coming-soon.html">Coming Soon</a></li>
              </ul>
            </li>
            <li>
              <a href="blog.html">Blog</a>

              <ul>
                <li><a href="blog.html">Classic</a></li>
                <li><a href="blog-listing.html">Listing</a></li>
                <li>
                  <a href="#">Grid</a>
                  <ul>
                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#">Masonry</a>
                  <ul>
                    <li>
                      <a href="blog-masonry-2cols.html">Masonry 2 columns</a>
                    </li>
                    <li>
                      <a href="blog-masonry-3cols.html">Masonry 3 columns</a>
                    </li>
                    <li>
                      <a href="blog-masonry-4cols.html">Masonry 4 columns</a>
                    </li>
                    <li>
                      <a href="blog-masonry-sidebar.html">Masonry sidebar</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">Mask</a>
                  <ul>
                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                    <li>
                      <a href="blog-mask-masonry.html">Blog mask masonry</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#">Single Post</a>
                  <ul>
                    <li><a href="single.html">Default with sidebar</a></li>
                    <li>
                      <a href="single-fullwidth.html">Fullwidth no sidebar</a>
                    </li>
                    <li>
                      <a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="elements-list.html">Elements</a>
              <ul>
                <li><a href="elements-products.html">Products</a></li>
                <li><a href="elements-typography.html">Typography</a></li>
                <li><a href="elements-titles.html">Titles</a></li>
                <li><a href="elements-banners.html">Banners</a></li>
                <li>
                  <a href="elements-product-category.html">Product Category</a>
                </li>
                <li><a href="elements-video-banners.html">Video Banners</a></li>
                <li><a href="elements-buttons.html">Buttons</a></li>
                <li><a href="elements-accordions.html">Accordions</a></li>
                <li><a href="elements-tabs.html">Tabs</a></li>
                <li><a href="elements-testimonials.html">Testimonials</a></li>
                <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                <li><a href="elements-portfolio.html">Portfolio</a></li>
                <li><a href="elements-cta.html">Call to Action</a></li>
                <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- End .mobile-nav -->

        <div class="social-icons">
          <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
          <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
          <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
          <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div>
        <!-- End .social-icons -->
      </div>
      <!-- End .mobile-menu-wrapper -->
    </div>
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div
      class="modal fade"
      id="signin-modal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close">
              <span aria-hidden="true"><i class="icon-close"></i></span>
            </button>

            <div class="form-box">
              <div class="form-tab">
                <ul class="nav nav-pills nav-fill" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="signin-tab"
                      data-toggle="tab"
                      href="#signin"
                      role="tab"
                      aria-controls="signin"
                      aria-selected="true">Sign In</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="register-tab"
                      data-toggle="tab"
                      href="#register"
                      role="tab"
                      aria-controls="register"
                      aria-selected="false">Register</a>
                  </li>
                </ul>
                <div class="tab-content" id="tab-content-5">
                  <div
                    class="tab-pane fade show active"
                    id="signin"
                    role="tabpanel"
                    aria-labelledby="signin-tab">
                    <form action="#">
                      <div class="form-group">
                        <label for="singin-email">Username or email address *</label>
                        <input
                          type="text"
                          class="form-control"
                          id="singin-email"
                          name="singin-email"
                          required />
                      </div>
                      <!-- End .form-group -->

                      <div class="form-group">
                        <label for="singin-password">Password *</label>
                        <input
                          type="password"
                          class="form-control"
                          id="singin-password"
                          name="singin-password"
                          required />
                      </div>
                      <!-- End .form-group -->

                      <div class="form-footer">
                        <button type="submit" class="btn btn-outline-primary-2">
                          <span>LOG IN</span>
                          <i class="icon-long-arrow-right"></i>
                        </button>

                        <div class="custom-control custom-checkbox">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="signin-remember" />
                          <label
                            class="custom-control-label"
                            for="signin-remember">Remember Me</label>
                        </div>
                        <!-- End .custom-checkbox -->

                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                      </div>
                      <!-- End .form-footer -->
                    </form>
                    <div class="form-choice">
                      <p class="text-center">or sign in with</p>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#" class="btn btn-login btn-g">
                            <i class="icon-google"></i>
                            Login With Google
                          </a>
                        </div>
                        <!-- End .col-6 -->
                        <div class="col-sm-6">
                          <a href="#" class="btn btn-login btn-f">
                            <i class="icon-facebook-f"></i>
                            Login With Facebook
                          </a>
                        </div>
                        <!-- End .col-6 -->
                      </div>
                      <!-- End .row -->
                    </div>
                    <!-- End .form-choice -->
                  </div>
                  <!-- .End .tab-pane -->
                  <div
                    class="tab-pane fade"
                    id="register"
                    role="tabpanel"
                    aria-labelledby="register-tab">
                    <form action="#">
                      <div class="form-group">
                        <label for="register-email">Your email address *</label>
                        <input
                          type="email"
                          class="form-control"
                          id="register-email"
                          name="register-email"
                          required />
                      </div>
                      <!-- End .form-group -->

                      <div class="form-group">
                        <label for="register-password">Password *</label>
                        <input
                          type="password"
                          class="form-control"
                          id="register-password"
                          name="register-password"
                          required />
                      </div>
                      <!-- End .form-group -->

                      <div class="form-footer">
                        <button type="submit" class="btn btn-outline-primary-2">
                          <span>SIGN UP</span>
                          <i class="icon-long-arrow-right"></i>
                        </button>

                        <div class="custom-control custom-checkbox">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="register-policy"
                            required />
                          <label
                            class="custom-control-label"
                            for="register-policy">I agree to the
                            <a href="#">privacy policy</a> *</label>
                        </div>
                        <!-- End .custom-checkbox -->
                      </div>
                      <!-- End .form-footer -->
                    </form>
                    <div class="form-choice">
                      <p class="text-center">or sign in with</p>
                      <div class="row">
                        <div class="col-sm-6">
                          <a href="#" class="btn btn-login btn-g">
                            <i class="icon-google"></i>
                            Login With Google
                          </a>
                        </div>
                        <!-- End .col-6 -->
                        <div class="col-sm-6">
                          <a href="#" class="btn btn-login btn-f">
                            <i class="icon-facebook-f"></i>
                            Login With Facebook
                          </a>
                        </div>
                        <!-- End .col-6 -->
                      </div>
                      <!-- End .row -->
                    </div>
                    <!-- End .form-choice -->
                  </div>
                  <!-- .End .tab-pane -->
                </div>
                <!-- End .tab-content -->
              </div>
              <!-- End .form-tab -->
            </div>
            <!-- End .form-box -->
          </div>
          <!-- End .modal-body -->
        </div>
        <!-- End .modal-content -->
      </div>
      <!-- End .modal-dialog -->
    </div>
    <!-- End .modal -->

    <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="{{ asset ('customer/images/logo.png') }}" class="footer-logo" alt="Footer Logo" width="105"
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

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

    <!-- Plugins JS File -->
    <script src="{{ asset('customer/js/jquery.min.js') }}"></script>
    <script src="{{ asset('customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('customer/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('customer/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('customer/js/superfish.min.js') }}"></script>
    <script src="{{ asset('customer/js/owl.carousel.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
</body>

</html>