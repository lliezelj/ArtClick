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

        @include('includes.header')

        @include('includes.sidebar')

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Category List</h4>
                        <h6>Manage your items category</h6>
                    </div>
                    <div class="page-btn">
                        <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#category-add">
                            <img src="{{ asset('manager/img/icons/plus.svg') }}" alt="img" class="me-1">Add New
                            Category</a>

                    </div>
                </div>

                <div class="modal fade" id="category-add" tabindex="-1" aria-labelledby="artist" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Category</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <form method="POST" action="{{ route('add.category')}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" name="name">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>
                                                    Image</label>
                                                <div class="image-upload">
                                                    <input type="file" name="image">
                                                    <div class="image-uploads">
                                                        <img src="{{ asset('manager/img/icons/upload.svg') }}"
                                                            alt="img">
                                                        <h4>Drag and drop a file to upload</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-submit">Submit</button>
                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img
                                            src="{{ asset('manager/img/icons/search-white.svg') }}" alt="img"></a>
                                </div>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Number of Items</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="productimgname">
                                                <a href="javascript:void(0);" class="product-img">
                                                    <img src="{{ $category->image ? asset('storage/categoryPictures/' . $category->image) : asset('icon/null-image.png') }}"
                                                        alt="product">
                                                </a>
                                                <a href="javascript:void(0);">{{$category->name}}</a>
                                            </td>
                                            <td>{{$category->products_count}}</td>
                                            <td>
                                                <a class="me-3 " href="{{route('get.products', ['id' => $category->id])}}">
                                                    <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                                </a>
                                                <a class="me-3" data-bs-toggle="modal"
                                                    data-bs-target="#category-edit{{$category->id}}">
                                                    <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                                </a>
                                                <!-- Category Edit Modal -->
                                                <div class="modal fade" id="category-edit{{$category->id}}" tabindex="-1"
                                                    aria-labelledby="artist" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Category</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <form method="POST"
                                                                        action="{{ route('update.category', ['id' => $category->id])}}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Category Name</label>
                                                                                <input type="text" name="name"
                                                                                    value="{{$category->name}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>
                                                                                    Image</label>
                                                                                <div class="image-upload">
                                                                                    <input type="file" name="image"
                                                                                        value="{{$category->image}}">
                                                                                    <div class="image-uploads">
                                                                                        <img src="{{ asset('manager/img/icons/upload.svg') }}"
                                                                                            alt="img">
                                                                                        <h4>Drag and drop a file to upload
                                                                                        </h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-submit">Save</button>
                                                                <button type="button" class="btn btn-cancel"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a class="" data-bs-toggle="modal"
                                                    data-bs-target="#category-delete{{$category->id}}">
                                                    <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                                </a>

                                                <!-- Category Delete Modal -->
                                                <form method="POST"
                                                    action="{{ route('delete.category', ['id' => $category->id])}}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal fade" id="category-delete{{$category->id}}"
                                                        tabindex="-1" aria-labelledby="artist" role="dialog"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h6 class="modal-title w-100">Delete <span
                                                                            class="text-danger">{{$category->name}}</span>
                                                                        Category?</h6>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
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
                                                                    <button type="submit" name="submit"
                                                                        class="btn btn-danger custom-btn-small">Delete</button>
                                                                    <button type="button" class="btn btn-cancel btn-sm"
                                                                        data-bs-dismiss="modal">Cancel</button>
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