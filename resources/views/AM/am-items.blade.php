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

    <link rel="stylesheet" href="{{ asset('manager/css/style.css') }}">
</head>

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
                            <a class="dropdown-item logout pb-0" href="signin.html"><img
                                    src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
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
                    <a class="dropdown-item" href="signin.html">Logout</a>
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
                                    Items</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-items-category')}}" class="active">Items List</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/quotation1.svg') }}" alt="img"><span>
                                    Inventory</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-inventory')}}">Inventory list</a></li>
                                <li><a href="{{route('am-restock')}}">Restocking History</a></li>
                                
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
                                <li><a href="{{route('am-artist')}}" >Artist List </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="{{ asset('manager/img/icons/purchase1.svg') }}" alt="img"><span>
                                    Announcements</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{route('am-announcement')}}" >Announcement List</a></li>
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
                        <h4>Items List</h4>
                        <h6>Manage your items</h6>
                    </div>
                    <div class="page-btn">
                                <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#productadd">
                                    <img src="{{ asset('manager/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Item</a>

                    </div>
                </div>

                <div class="modal fade" id="productadd" tabindex="-1" aria-labelledby="productadd" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Item</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="select">
                                                <option>Choose Category</option>
                                                <option> Furniture</option>
                                                <option> Accessories</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Minimum Quantity</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="select">
                                                <option>Select size</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                                <option>Large</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> Item Image</label>
                                            <div class="image-upload">
                                                <input type="file">
                                                <div class="image-uploads">
                                                    <img src="{{ asset('manager/img/icons/upload.svg') }}" alt="img">
                                                    <h4>Drag and drop a file to upload</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <a class="btn btn-submit me-2">Submit</a>
                                    <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                                </div>
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
                                        <th>Items Name</th> 
                                        <th>Category </th>                                       
                                        <th>Price</th>                                       
                                        <th>Quantity</th>
                                        <th>Size</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('manager/img/product/product1.jpg') }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Macbook pro</a>
                                        </td>
                                        <td>Computers</td>
                                        <td>1500.00</td>                                      
                                        <td>2</td>
                                        <td>Small</td>
                                        <td>asddtbttwtwet;wejgw97yhg</td>
                                        <td>
                                            <a class="me-3" href="{{ route('am-items-details')}}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" data-bs-toggle="modal" data-bs-target="#productedit">
                                                <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('manager/img/product/product2.jpg') }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Orange</a>
                                        </td>
                                        <td>Fruits</td>                                       
                                        <td>10.00</td>                                       
                                        <td>3</td>
                                        <td>Medium</td>
                                        <td>asfasehtgiyweyfsdjnfiya</td>
                                        <td>
                                            <a class="me-3" href="{{ route('am-items-details')}}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" href="editproduct.html">
                                                <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="{{ asset('manager/img/product/product7.jpg') }}" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Apple Earpods</a>
                                        </td>
                                        <td>Shoes</td>  
                                        <td>10.00</td>
                                        <td>4</td>
                                        <td>Large</td>
                                        <td>fgfygawy8fgqbfvkaehf98q</td>
                                        <td>
                                            <a class="me-3" href="{{ route('am-items-details')}}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" data-bs-toggle="modal" data-bs-target="#productedit">
                                                <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                            </a>
                                            <a class="confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="productedit" tabindex="-1" aria-labelledby="productedit" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Item</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="select">
                                    <option>Choose Category</option>
                                    <option> Furniture</option>
                                    <option> Accessories</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Minimum Quantity</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select">
                                    <option>Choose Status</option>
                                    <option> Furniture</option>
                                    <option> Accessories</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <input type="file">
                                    <div class="image-uploads">
                                        <img src="{{ asset('manager/img/icons/upload.svg') }}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2">Submit</a>
                        <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
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

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>