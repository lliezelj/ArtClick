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

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('manager/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{ asset('manager/css/style.css')}}">
</head>

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
                        <h4>Daily Sales</h4>
                        <h6>List of Daily List</h6>
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
                            <div class="wordset">
                                <ul>
                                    <li>
                                        <a href="{{ route('dailySales.pdf')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                                src="{{ asset('manager/img/icons/pdf.svg') }}" alt="img"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Orders</th>
                                        <th>Total Sales</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dailySales as $sales)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($sales->date)->format('F j, Y')}}</td>
                                        <td>{{$sales->total_orders}}</td>
                                        <td>₱{{$sales->total_sales}}</td>
                                        <td>
                                            <a class="me-3" href="{{route('sales.byDate', ['date' => $sales->date])}}">
                                                <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
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



    <script src="{{ asset ('manager/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset ('manager/js/feather.min.js') }}"></script>

    <script src="{{ asset ('manager/js/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset ('manager/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('manager/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset ('manager/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset ('manager/plugins/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset ('manager/js/moment.min.js') }}"></script>
    <script src="{{ asset ('manager/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset ('manager/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset ('manager/plugins/sweetalert/sweetalerts.min.js') }}"></script>

    <script src="{{ asset ('manager/js/script.js')}}"></script>
</body>

</html>