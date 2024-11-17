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
                        <h4>Expenses</h4>
                    </div>
                    <div class="page-btn">
                        <a class="btn btn-added" data-bs-toggle="modal" data-bs-target="#expenses-add">
                            <img src="{{ asset('manager/img/icons/plus.svg') }}" alt="img" class="me-1">Add New Expense</a>
                    </div>
                </div>

                <div class="modal fade" id="expenses-add" tabindex="-1" aria-labelledby="expenses-add" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add New Expenses</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('add.expense')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label>Date</label>   
                                            <input class="form-control" type="date" name="date" placeholder="Choose Date">
                                        </div>
                                      </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control" type="number" name="amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Expense Name</label>
                                            <input type="text" name="expense_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>
                                                Expense Image</label>
                                            <div class="image-upload">
                                                <input type="file" name="expense_image">
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
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Total Expenses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{$expense->expense_year}}</td>
                                        <td>{{ \Carbon\Carbon::create()->month($expense->expense_month)->format('F') }}</td>
                                        <td>{{$expense->expense_amount}}</td>
                                        <td>
                                        <a class="me-3" href="{{ route('expense.details', ['year' => $expense->expense_year, 'month' => $expense->expense_month]) }}">
                                            <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="View Details">
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