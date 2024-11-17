<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
  <link rel="shortcut icon" href="{{ asset('customer/images/icons/favicon.png') }}" />
  <title>Announcements - ARTCLICK</title>
  <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
  <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
  <style>
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

    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Announcements</h1>
        </div>
      </div>

      <div class="page-content">
        <div class="container">
          <section class="announcements">
            <div class="announcement-list">
              @foreach($announcements as $announce)
              <div class="announcement new-arrivals" data-toggle="modal" data-target="#announcementModal1{{$announce->id}}">
                <div class="date">{{\Carbon\Carbon::parse($announce->start)->format('F j, Y')}} - {{\Carbon\Carbon::parse($announce->end)->format('F j, Y')}}</div>
                <h3>{{ ($announce->title)}}</h3>
                <p>Click to read more...</p>
              </div>
               <!-- Modals -->
              <div class="modal fade" id="announcementModal1{{$announce->id}}" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="announcementModalLabel1">{{$announce->title}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <img src="{{$announce->picture ? asset('storage/announcementPictures/' .$announce->picture) : asset('icon/null-image.png') }} " alt="New Arrival Image" class="announcement-image">
                      <p>{{$announce->description}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </section>
        </div>
      </div>
    </main>

    @include('includes.footer')

</div><!-- End .page-wrapper -->
@include('includes.mobile-nav')


  <script src="{{ asset('customer/js/jquery.min.js') }}"></script>
  <script src="{{ asset('customer/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('customer/js/main.js') }}"></script>
</body>

</html>