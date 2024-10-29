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

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('manager/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/plugins/owlcarousel/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <link rel="stylesheet" href="{{ asset('manager/css/style.css') }}">
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
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" alt="">
                </a>
                <a href="index.html" class="logo-small">
                    <img src="assets/img/logo-small.png" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <ul class="nav user-menu">

                <li class="nav-item">
                    <div class="top-nav-search">
                        <a href="javascript:void(0);" class="responsive-search">
                            <i class="fa fa-search"></i>
                        </a>
                        <form action="#">
                            <div class="searchinputs">
                                <input type="text" placeholder="Search Here ...">
                                <div class="search-addon">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>John Doe</h6>
                                    <h5>Admin</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                            <a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> My
                                Profile</a>
                            <a class="dropdown-item" href="generalsettings.html"><i class="me-2"
                                    data-feather="settings"></i>Settings</a>
                            <hr class="m-0">
                            <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item logout pb-0"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="generalsettings.html">Settings</a>
                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.html"><img src="{{ asset('manager/img/icons/dashboard.svg') }}" alt="img"><span>
                                    Dashboard</span> </a>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/product.svg') }}" alt="img"><span>
                                    Artworks</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.category')}}" class="active">artworks List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/quotation1.svg') }}" alt="img"><span>
                                    Inventory</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.inventory')}}">Inventory list</a></li>
                                <li><a href="{{route('admin.restock')}}">Restocking History</a></li>
                                
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/sales1.svg') }}" alt="img"><span>
                                    Orders</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="productlist-category.html">Orders List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/expense1.svg') }}" alt="img"><span>
                             Expense</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-expenses')}}">Expense List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/time.svg') }}" alt="img"><span>
                                    Sales</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-sales-daily')}}">Daily Sales</a></li>
                                <li><a href="{{route('am-sales-monthly')}}">Monthly Sales </a></li>
                                <li><a href="{{route('am-sales-annually')}}">Annually Sales</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i data-feather="award"></i><span> Artist </span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.artist')}}" >Artist List </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/purchase1.svg') }}" alt="img"><span>
                                    Announcements</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('admin.announcement')}}" >Announcement List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/users1.svg') }}" alt="img"><span>
                                    Users</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-users')}}">Users List</a></li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Artworks List By <span class="text-success"> {{$theArtist->lastname}}, {{$theArtist->firstname}}</span></h4>
                        <h6>Manage your Artworks</h6>
                    </div>
                    <div class="page-btn">
                                <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#productadd">
                                    <img src="{{ asset('manager/img/icons/plus.svg') }}" alt="img" class="me-1">Add New artwork</a>

                    </div>
                </div>

                <div class="modal fade" id="productadd" tabindex="-1" aria-labelledby="productadd" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add artwork</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form class="form-group" method="POST" action="{{route('add.product')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>artwork Name</label>
                                            <input type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="select" name="category_id" required>
                                                <option selected disabled>Choose Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text" name="quantity" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <select class="select" name="size" required>
                                                <option selected disabled>Select size</option>
                                                <option value="small">Small</option>
                                                <option value="medium">Medium</option>
                                                <option value="large">Large</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> Artwork Image</label>
                                            <div class="image-upload">
                                                <input type="file" name="product_image">
                                                <div class="image-uploads">
                                                    <img src="{{ asset('manager/img/icons/upload.svg') }}" alt="img">
                                                    <h4>Drag and drop a file to upload</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                    <button class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
 
                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('manager/img/icons/search-white.svg') }}"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                            
                        <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>artworks Name</th> 
                                        <th>Category </th>                                       
                                        <th>Price</th>                                       
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($artworks as $artwork)
                                    <tr>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{$artwork->product_image ? asset('storage/productPictures/' .$artwork->product_image) : asset('icon/null-image.png') }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">{{$artwork->name}}</a>
                                        </td>
                                        <td>{{$artwork->category->name}}</td>
                                        <td>{{$artwork->price}}</td>                                      
                                        <td>{{$artwork->quantity}}</td>
                                        <td>{{$artwork->size}}</td>
                                        <td>{{$artwork->description}}</td>
                                        <td>
                                            <a class="me-3" href="{{ route('view.product',['id'=> $artwork->id]) }}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" data-bs-toggle="modal" data-bs-target="#productedit{{$artwork->id}}">
                                                <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <!-- Product Edit Modal -->
                                            <div class="modal fade" id="productedit{{$artwork->id}}" tabindex="-1" aria-labelledby="productedit" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Artwork</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">˟</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form class="form-group" method="POST" action="{{route('update.product', ['id' => $artwork->id]) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>artwork Name</label>
                                                                    <input type="text" name="name" value="{{$artwork->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Category</label>
                                                                    <select class="select" name="category_id">
                                                                        <!-- Preselecting the current category -->
                                                                        <option selected disabled>{{$artwork->category->name}}</option>
                                                                        @foreach($categories as $category)
                                                                            <option value="{{ $category->id }}" 
                                                                                {{ $artwork->category_id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Quantity</label>
                                                                    <input type="text" name="quantity" value="{{$artwork->quantity}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="text" name="price" value="{{$artwork->price}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text" name="description" value="{{$artwork->description}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Size</label>
                                                                    <select class="select" name="size">
                                                                        <option selected disabled>{{$artwork->size}}</option>
                                                                        <option value="small" {{ $artwork->size == 'small' ? 'selected' : '' }}>Small</option>
                                                                        <option value="medium" {{ $artwork->size == 'medium' ? 'selected' : '' }}>Medium</option>
                                                                        <option value="large" {{ $artwork->size == 'large' ? 'selected' : '' }}>Large</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-group">
                                                                    <label>Product Image</label>
                                                                    <div class="image-upload">
                                                                        <input type="file" name="product_image" value="product_image">
                                                                        <div class="image-uploads">
                                                                            <img src="{{ asset('manager/img/icons/upload.svg') }}" alt="img">
                                                                            <h4>Drag and drop a file to upload</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                                                            <button class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="" data-bs-toggle="modal" data-bs-target="#productdelete{{$artwork->id}}">
                                                <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                             <!-- Product Delete -->
                                            <form method="POST" action="{{ route('delete.product',['id' => $artwork->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="productdelete{{$artwork->id}}" tabindex="-1" aria-labelledby="artist" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h6 class="modal-title w-100">Delete <span class="text-danger">{{$artwork->name}}</span> artwork?</h6>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3>You won't be able to revert this!</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="submit" name="submit" class="btn btn-danger custom-btn-small">Delete</button>
                                                        <button type="button" class="btn btn-cancel btn-sm" data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('manager/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('manager/js/feather.min.js') }}"></script>

    <script src="{{ asset('manager/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('manager/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('manager/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>