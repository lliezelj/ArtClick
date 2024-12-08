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

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css') }}">

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
                        <h4>Announcement List</h4>
                    </div>
                    <div class="page-btn">
                        <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#announcement-add">
                            <img src="{{ asset('manager/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Announcement</a>
                    </div>
                </div>


                
                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    <a class="btn btn-filter">
                                        <img src="{{ asset('manager/img/icons/filter.svg') }}" alt="img">
                                    </a>
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('manager/img/icons/search-white.svg') }}"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>



                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($announcements as $announce)
                                    <tr>
                                        <td>
                                            <a class="product-img">
                                                <img src="{{$announce->picture ? asset('storage/announcementPictures/' .$announce->picture) : asset('icon/null-image.png') }}" alt="product">
                                            </a>
                                        </td>
                                        <td>{{$announce->title}}</td>
                                        <td>{{  \Carbon\Carbon::parse($announce->start)->format('F j, Y')}}</td>
                                        <td>{{  \Carbon\Carbon::parse($announce->end)->format('F j, Y')}}</td>
                                        <td>{{ Str::limit($announce->description, 20, '...') }}</td>
                                        <td>
                                            <a class="me-3" href="{{route('view.announcement', ['id' => $announce->id])}}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                            </a>
                                            <a class="me-3" data-bs-toggle="modal" data-bs-target="#announcement-edit{{$announce->id}}">
                                                <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                            </a>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="announcement-edit{{$announce->id}}" tabindex="-1" aria-labelledby="announcement-edit" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Announcement</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{route('edit.announcement', ['id' => $announce->id]) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-lg-3 col-sm-6 col-12">
                                                                    <div class="form-group">
                                                                        <label>From</label>
                                                                        <div class="input-groupicon">
                                                                            <input class="form-control" value="{{ \Carbon\Carbon::parse($announce->start)->format('Y-m-d') }}" type="date" placeholder="Choose Date" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-sm-6 col-12">
                                                                    <div class="form-group">
                                                                        <label>To</label>
                                                                        <div class="input-groupicon">
                                                                        <input class="form-control" value="{{ \Carbon\Carbon::parse($announce->end)->format('Y-m-d') }}" type="date" placeholder="Choose Date">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" name="title" value="{{$announce->title}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea name="description" class="form-control">{{$announce->description}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-12 col-12">
                                                                    <div class="form-group">
                                                                        <label>
                                                                            Image</label>
                                                                        <div class="image-upload">
                                                                            <input type="file" value="{{$announce->picture}}" name="picture">
                                                                            <div class="image-uploads">
                                                                                <img src="{{ asset('manager/img/icons/upload.svg') }}" alt="img">
                                                                                <h4>Drag and drop a file to upload</h4>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <button type="submit" name="submit" class="btn btn-submit me-2">Save</button>
                                                                <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="me-3 confirm-text" href="javascript:void(0);">
                                                <img src="{{ asset('manager/img/icons/delete.svg')}}" alt="img">
                                            </a>
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

    <!-- add modal -->
    <div class="modal fade" id="announcement-add" tabindex="-1" aria-labelledby="announcement-add" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Announcement</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('add.announcement')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>From</label>
                                <div class="input-groupicon">
                                    <input name="start" class="form-control" type="date" placeholder="Choose Date" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>To</label>
                                <div class="input-groupicon">
                                <input name="end" class="form-control" type="date" placeholder="Choose Date">                               
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>
                                    Image</label>
                                <div class="image-upload">
                                    <input type="file" name="picture">
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



    <script src="{{ asset('manager/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('manager/js/feather.min.js') }}"></script>

    <script src="{{ asset('manager/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('manager/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('manager/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('manager/js/moment.min.js') }}"></script>
    <script src="{{ asset('manager/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>