<!DOCTYPE html>
<html lang="en">

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
  <link rel="shortcut icon" href="{{ asset('manager/img/artclick-shortcut-icon.png') }}">
  <meta name="apple-mobile-web-app-title" content="Molla" />
  <meta name="application-name" content="Molla" />
  <meta name="msapplication-TileColor" content="#cc9966" />
  <meta
    name="msapplication-config"
    content="{{ asset('assets/images/icons/browserconfig.xml') }}" />
  <meta name="theme-color" content="#ffffff" />
  <link
    rel="stylesheet"
    href="{{ asset('customer/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}" />
  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}" />
  <link
    rel="stylesheet"
    href="{{ asset('customer/css/plugins/owl-carousel/owl.carousel.css') }}" />
  <link
    rel="stylesheet"
    href="{{ asset('customer/css/plugins/magnific-popup/magnific-popup.css') }}" />
  <link rel="stylesheet" href="{{ asset('customer/css/plugins/jquery.countdown.css') }}" />
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('customer/css/skins/skin-demo-2.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
  <link rel="stylesheet" href="{{ asset('customer/css/demos/demo-2.css') }}" />
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
                 @if(Auth::user())
                  <a href="{{ route('account') }}" class="btn btn-primary">Account</a>
                  @endif
                  @if(Auth::user())
                  <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-outline-primary-2"><span>Log out</span><i class="icon-long-arrow-left"></i></button>
                </form>
                  @else
                  <a href="{{route('login')}}" class="btn btn-outline-primary-2" style="width: 250px;"><span>Sign Up</span><i class="icon-long-arrow-right"></i></a>
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
            <div 
            class="page-header text-center" 
            style="background-image: url('customer/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($myCart as $cart)
                                          @if($cart->cart_status !== 'Removed' && $cart->cart_status !== 'Ordered'  )
                                              <tr>
                                                  <td class="product-col">
                                                      <div class="product">
                                                          <figure class="product-media">
                                                              <a href="#">
                                                                  <img src="{{$cart->product->product_image ? asset('storage/productPictures/' .$cart->product->product_image) : asset('icon/null-img.png') }}"
                                                                      alt="Product image">
                                                              </a>
                                                          </figure>

                                                          <h3 class="product-title">
                                                              <a href="#">{{$cart->product->name}}</a>
                                                          </h3><!-- End .product-title -->
                                                      </div><!-- End .product -->
                                                  </td>
                                                  <td class="price-col">{{$cart->product->price}}</td>
                                                  <td class="quantity-col">
                                                      <div class="cart-product-quantity">
                                                          <input type="number" name="order_quantity" value="{{$cart->order_quantity}}" class="form-control" min="1" max="10"
                                                              step="1" data-decimals="0" required>
                                                      </div><!-- End .cart-product-quantity -->
                                                  </td>
                                                  <td class="total-col">{{$cart->order_total}}</td>
                                                  <td class="text-primary fw-bold">{{$cart->cart_status}}</td>
                                                  <form method="POST" action="{{route('delete.cart', ['id' => $cart->id]) }}">
                                                      @csrf
                                                      @method('PUT')
                                                      <td class="remove-col"><button type="submit" name="submit" class="btn-remove"><i
                                                          class="icon-close"></i></button></td>
                                                  </form>
                                              </tr>
                                          @elseif($cart->cart_status === 'Ordered')
                                          <tr>
                                                  <td class="product-col">
                                                      <div class="product">
                                                          <figure class="product-media">
                                                              <a href="#">
                                                                  <img src="{{$cart->product->product_image ? asset('storage/productPictures/' .$cart->product->product_image) : asset('icon/null-img.png') }}"
                                                                      alt="Product image">
                                                              </a>
                                                          </figure>

                                                          <h3 class="product-title">
                                                              <a href="#">{{$cart->product->name}}</a>
                                                          </h3><!-- End .product-title -->
                                                      </div><!-- End .product -->
                                                  </td>
                                                  <td class="price-col">{{$cart->product->price}}</td>
                                                  <td class="quantity-col">
                                                      <div class="cart-product-quantity">
                                                          <input type="number" name="order_quantity" value="{{$cart->order_quantity}}" class="form-control" min="1" max="10"
                                                              step="1" data-decimals="0" required>
                                                      </div><!-- End .cart-product-quantity -->
                                                  </td>
                                                  <td class="total-col">{{$cart->order_total}}</td>
                                                  <td><span  class="badge btn-primary fw-bold">{{$cart->cart_status}}</span></td> 
                                                  <td class="text-success"><button class="btn-remove"><i
                                                  class="icon-check text-success"></i></button></td>
                                              </tr>
                                          @else
                                                <p> </p>
                                          @endif
                                      @endforeach
                                    </tbody>
                                </table><!-- End .table table-wishlist -->
                            </div><!-- End .col-lg-9 -->
                           
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                @if($hasItemsInCart)
                                                    <td>{{ number_format($myCartTotal, 2, '.', ',') }}</td>
                                                @else
                                                    <td>0</td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                    @if($hasItemsInCart)
                                        <a href="{{ route('customer.checkOut', ['id' => optional($myCart->first())->id]) }}"
                                          class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                    @else
                                        <a disabled href=""
                                          class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                    @endif
                                </div><!-- End .summary -->

                                <a href="{{route('view.orders')}}"
                                    class="btn btn-outline-dark-2 btn-block mb-3"><span>VIEW ORDERS
                                    </span><i class="icon-list-alt"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main>
    <!-- End .main -->
    @include('includes.footer')

    </div><!-- End .page-wrapper -->
    @include('includes.mobile-nav')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Main JS File -->
    <script src="{{ asset('customer/js/main.js') }}"></script>
    <script src="{{ asset('customer/js/demos/demo-2.js') }}"></script>
  </div>
  <!-- End .page-wrapper -->
</body>

</html>