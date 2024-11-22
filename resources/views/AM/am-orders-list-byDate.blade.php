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
                        <h4>Order List</h4>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-input">
                                    <a class="btn btn-searchset"><img src="{{ asset('manager/img/icons/search-white.svg')}}"
                                            alt="img"></a>
                                </div>
                            </div>
                            <div class="wordset">
                                <ul>
                                    <!-- Status Legend with Icons -->
                                    
                                    <li>
                                        <i class="ion-record" style="color: #F4D06F;" data-bs-toggle="tooltip" data-bs-placement="top" title="Pending"></i> Pending
                                    </li>
                                    <li>
                                        <i class="ion-record" style="color: #82A6FF;" data-bs-toggle="tooltip" data-bs-placement="top" title="Confirmed/Processing"></i> Confirmed/Processing
                                    </li>
                                    <li>
                                        <i class="ion-record" style="color: #556B2F;" data-bs-toggle="tooltip" data-bs-placement="top" title="Out for Delivery"></i> Out for Delivery
                                    </li>
                                    <li>
                                        <i class="ion-record" style="color: #B3E283;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delivered"></i> Delivered
                                    </li>
                                </ul>
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Customer Name</th>
                                        <th>Total Amount</th>
                                        <th>Product Name</th>
                                        <th>Status</th>
                                        <th>Estimated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->last_name }}, {{ $order->user->first_name }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->products}}</td>
                                <td>
                                @php
                                    $statusClasses = [
                                        'Pending' => 'bg-warning',
                                        'Processing' => 'bg-primary',
                                        'Out for Delivery' => 'bg-secondary',
                                        'Delivered' => 'bg-success',
                                        'Cancelled' => 'text-white bg-danger',
                                    ];
                                    $statusClass = $statusClasses[$order->status] ?? 'bg-danger';
                                @endphp

                                <span class="{{ $statusClass }} badges">{{ $order->status }}</span>
                                </td>
                                <td>
                                {{ $order->estimated_date ? \Carbon\Carbon::parse($order->estimated_date)->format('F j, Y') : '' }}
                                </td>
                                <td>
                                    <a class="me-3" data-bs-toggle="modal" data-bs-target="#order-details{{$order->id}}">
                                        <img src="{{ asset('manager/img/icons/eye.svg') }}" alt="img">
                                    </a>

                                    <!-- order details modal -->
                                    <div class="modal fade" id="order-details{{$order->id}}" tabindex="-1" aria-labelledby="artist" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Order Details</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="row" style="line-height: 0.5">
                                                            <p><span class="fw-bold">Order Id:</span> <span>{{$order->id}} </span></p>
                                                            <p><span class="fw-bold">Order Name:</span> <span>{{ $order->user->last_name }}, {{ $order->user->first_name }}</span></p>
                                                            <p><span class="fw-bold">Location:</span> <span>{{ $order->user->street_address }} {{ $order->user->barangay }}, {{$order->user->town_city}}</span></p>
                                                            <p><span class="fw-bold">Contact:</span> <span>{{$order->user->phone_number}} </span></p>
                                                            <p><span class="fw-bold">Amount:</span> <span>{{$order->total_price}} </span></p>
                                                            <p><span class="fw-bold">Product Name:</span> <span>{{$order->products}} </span></p>
                                                            <p><span class="fw-bold">Status:</span><span> {{$order->status}}</span></p>
                                                            <p><span class="fw-bold">Estimated Date to Deliver:</span> <span>{{ $order->estimated_date ? \Carbon\Carbon::parse($order->estimated_date)->format('F j, Y') : '' }}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submit" class="btn btn-submit">Update</button>
                                                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    <a class="me-3" data-bs-toggle="modal" data-bs-target="#order-edit{{$order->id}}">
                                        <img src="{{ asset('manager/img/icons/edit.svg') }}" alt="img">
                                    </a>
                                    <!-- order edit modal -->
                                    <div class="modal fade" id="order-edit{{$order->id}}" tabindex="-1" aria-labelledby="artist" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Order</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form method="POST" action="{{route('update.orderStatus', ['id' => $order->id]) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                            <div class="row">
                                                                <div class="col-6 col-sm-6 col-12">
                                                                    <div class="form-group">
                                                                        <label>Update Status</label>
                                                                        <select class="form-control" name="update_status">
                                                                        <option selected disabled>{{$order->status}}</option>
                                                                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                                        <option value="Out for Delivery" {{ $order->status == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                                                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-sm-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Estimated date</label>
                                                                    <input type="date" class="form-control" value="{{$order->estimated_date}}" name="estimated_date">
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="submit" class="btn btn-submit">Update</button>
                                                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>