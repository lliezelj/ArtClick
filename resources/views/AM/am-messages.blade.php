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

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/select2/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <link rel="stylesheet" href="{{ asset('manager/css/style.css') }}">
</head>
<style>
    .gradient-highlight {
    background: linear-gradient(
        to right,
        rgba(0, 128, 0, 0.3), /* Light green with low opacity */
        rgba(0, 255, 0, 0.3)  /* Bright green with low opacity */
    );
    color: black; /* White text */
    padding: 8px; /* Optional: Add some padding for better appearance */
    text-align: left; /* Optional: Align text */
    border: 1px solid #ddd; /* Optional: Add a border */
}

</style>
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
                        <h4>Messages List</h4>
                    </div>
                </div>


                <div class="modal fade" id="users-add" tabindex="-1" aria-labelledby="users-add" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New User</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('add.admin')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input  type="text" name="last_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control "type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="cpassword">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Street Address</label>
                                            <input type="text" name="street_address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Barangay</label>
                                            <input type="text" name="barangay">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Town City</label>
                                            <input type="text" name="town_city">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> Profile Picture</label>
                                            <div class="image-upload" name="profile_image">
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
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                    <tr class="{{ $message->status === 'unview' ?  'gradient-highlight' : ' '}}">
                                    <td class="text-dark">{{$message->fullname}}</td>
                                    <td class="text-dark">{{$message->email}}</td>
                                    <td class="text-dark">{{$message->phone}}</td>
                                    <td class="text-dark">{{$message->subject}}</td>
                                    <td class="text-dark">{{ \Illuminate\Support\Str::limit($message->message, 15, '...') }}</td>
                                    <td class="text-dark">{{$message->reply}}</td>
                                    <td class="text-dark">
                                        <a class="me-3" data-bs-toggle="modal" data-bs-target="#message-view{{$message->id}}">
                                            <img src="{{ asset('manager/img/icons/eye.svg')}}" alt="img">
                                        </a>
                                        <div class="modal fade" id="message-view{{$message->id}}" tabindex="-1" aria-labelledby="user-edit" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Message: <span>{{$message->subject}}</span></h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('replied.message',['id' => $message->id])}}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <p>Message From: 
                                                                        <span>{{$message->fullname}}, 
                                                                            <a href="mailto:{{$message->email}}">{{$message->email}}</a>
                                                                        </span>
                                                                    </p>
                                                                    <textarea disabled name="message" id="" rows="2" cols="30" style="height: 50px; width: 100%;">{{$message->message}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 col-12">
                                                                <div class="form-group">
                                                                    <label>Reply</label>
                                                                    <textarea name="reply" cols="30" rows="4" type="text"></textarea>
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
                                        <a class="" data-bs-toggle="modal" data-bs-target="#messagedelete{{$message->id}}">
                                                <img src="{{ asset('manager/img/icons/delete.svg') }}" alt="img">
                                            </a>
                                             <!-- Product Delete -->
                                            <form method="POST" action="{{ route('delete.message',['id' => $message->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="messagedelete{{$message->id}}" tabindex="-1" aria-labelledby="artist" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h6 class="modal-title w-100">Delete message from <span class="text-danger">{{$message->fullname}}</span>?</h6>
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

    <script src="{{ asset('manager/js/moment.min.js') }}"></script>
    <script src="{{ asset('manager/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('manager/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>