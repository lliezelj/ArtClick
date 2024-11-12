<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>ArtClick</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('manager/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('manager/css/animate.css') }}">

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
                    <img src="{{ asset('manager/img/logo.png') }}" alt="">
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
                                    <span><img src="{{ asset('manager/img/icons/closes.svg')}}" alt="img"></span>
                                </div>
                            </div>
                            <a class="btn" id="searchdiv"><img src="{{ asset('manager/img/icons/search.svg') }}" alt="img"></a>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="{{ Auth::user()->profile_image ? asset('storage/pictures/' . Auth::user()->profile_image) : asset('storage/pictures/null-profile.png') }}" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="{{asset('manager/img/profiles/avator1.jpg') }}" alt="">
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

        @include('includes.sidebar')
        
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('manager/img/icons/dash1.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="{{ $totalPurchased }}">{{ $totalPurchased }}</span></h5>
                                <h6>Total Purchase Items</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('manager/img/icons/dash2.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="{{$totalNetIncome}}">{{$totalNetIncome}}</span></h5>
                                <h6>Total Net Income</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('manager/img/icons/dash3.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="{{$totalSales}}">{{$totalSales}}</span></h5>
                                <h6>Total Sale Amount</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="{{ asset('manager/img/icons/dash4.svg') }}" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5>₱<span class="counters" data-count="{{$totalExpenses}}">{{$totalExpenses}}</span></h5>
                                <h6>Total Expenses Amount</h6>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <!-- <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Net Income</h5>
                                <div class="graph-sets">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($years as $year)
                            <li><a class="dropdown-item year-option" href="#" data-year="{{ $year }}">{{ $year }}</a></li>
                        @endforeach
                                        <li>
                                            <a href="addproduct.html" class="dropdown-item">Export</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales_charts"></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Net Income per Month </h5>
                            <div class="graph-sets">
                            <div class="form-group">
                                <label for="yearSelect">Select Year</label>
                                <select class="form-control" id="yearSelect">
                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="sales_chart"></div>
                        </div>
                    </div>
                </div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap 5 (for dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Include ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    $(document).ready(function() {
        // Log to check the data from Blade view
        var monthlyData = @json($monthlyData); // Make sure this is passed correctly from your Laravel controller
        console.log(monthlyData); // Check the structure of the data

        // Function to extract net income data for a specific year
        function getDataForYear(year) {
            return monthlyData.filter(function(item) {
                return item.year === year;
            });
        }

        // Function to render the chart with data
        function renderChart(data) {
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var netIncomeData = [];
            
            // Prepare data for the chart (net income for each month)
            months.forEach(function(month, index) {
                var monthData = data.find(function(item) {
                    return item.month === index + 1; // Month starts from 1
                });
                netIncomeData.push(monthData ? monthData.net_income : 0);
            });

            // Check if the chart container exists
            if ($('#sales_chart').length > 0) {
                var columnCtx = document.getElementById("sales_chart");
                var columnConfig = {
                    colors: ['#7638ff'], // Net income color
                    series: [
                        { name: "Net Income", type: "bar", data: netIncomeData }
                    ],
                    chart: {
                        type: 'bar',
                        fontFamily: 'Poppins, sans-serif',
                        height: 350,
                        width: '100%',
                        toolbar: { show: false }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '60%',
                            endingShape: 'rounded'
                        }
                    },
                    dataLabels: { enabled: false },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: months,
                        labels: {
                            rotate: -45 // Rotate labels if necessary
                        }
                    },
                    yaxis: {
                        title: { text: 'Pesos' },
                        labels: {
                            formatter: function(val) {
                                return "₱" + val; // Format the y-axis labels as currency
                            }
                        }
                    },
                    fill: { opacity: 1 },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "₱" + val + "";
                            }
                        }
                    }
                };

                // Try rendering the chart and catch any errors
                try {
                    var columnChart = new ApexCharts(columnCtx, columnConfig);
                    columnChart.render();
                } catch (error) {
                    console.error("Error rendering the chart: ", error);
                }
            } else {
                console.error("Chart container not found");
            }
        }

        // Check if monthlyData is populated correctly
        if (monthlyData && monthlyData.length > 0) {
            // Initially render chart for the first available year
            var initialYear = monthlyData[0].year;
            var initialData = getDataForYear(initialYear);
            renderChart(initialData);

            // Event listener for year selection
            $('.year-option').click(function(e) {
                e.preventDefault();
                var selectedYear = $(this).data('year');
                console.log("Selected Year: ", selectedYear); // Log selected year
                var yearData = getDataForYear(selectedYear);
                $('#sales_chart').html(''); // Clear the existing chart
                renderChart(yearData); // Render new chart for selected year
            });

        } else {
            console.error("No monthly data available");
        }
    });
</script>



                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Top 10 Selling Items</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="productlist.html" class="dropdown-item">Product List</a>
                                        </li>
                                        <li>
                                            <a href="addproduct.html" class="dropdown-item">Export</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Items</th>
                                                <th>Total Sold</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topProducts as $product)
                                            <tr>
                                                <td>{{ $product->productId }}</td>
                                                <td class="productimgname">
                                                    <a href="productlist.html" class="product-img">
                                                        <img src="{{$product->product_image ? asset('storage/productPictures/' .$product->product_image) : asset('icon/null-image.png') }}" alt="product">
                                                    </a>
                                                    <a href="productlist.html">{{ $product->name }}</a>
                                                </td>
                                                <td>{{ $product->total_quantity }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-7 col-sm-12 col-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Sales</h5>
            <div class="graph-sets">
                <div class="dropdown">
                    <select class="form-control" name="year" id="year-select" onchange="updateChart()">
                        @foreach($years as $year)
                            <option class="form-control" value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="sales_charts2"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let chart;

    const theMonthlySales = @json($theMonthlySales); // Pass the data from the controller to the script

    // Function to filter sales data by selected year and update the chart
    function updateChart() {
        const selectedYear = document.getElementById('year-select').value;
        const filteredData = theMonthlySales.filter(sale => sale.year == selectedYear);

        const months = [];
        const sales = [];

        // Prepare data for the chart
        filteredData.forEach(sale => {
            months.push(getMonthName(sale.month)); // Get month name
            sales.push(sale.total_sales);
        });

        // Update chart
        if (chart) {
            chart.destroy(); // Destroy the old chart before creating a new one
        }

        const ctx = document.getElementById('sales_charts2').getContext('2d');

        // Create the gradient for the bars
        const gradient = ctx.createLinearGradient(0, 0, 0, 400); // Create vertical gradient (adjust the end point as needed)
        gradient.addColorStop(0, 'rgba(75, 192, 192, 1)'); // Start color (light teal)
        gradient.addColorStop(1, 'rgba(54, 162, 235, 1)'); // End color (blue)

        chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Sales',
                    data: sales,
                    backgroundColor: gradient, // Apply the gradient color to the bars
                    borderColor: 'rgba(0, 123, 255, 1)', // Border color
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                },
            }
        });
    }

    // Helper function to get month name
    function getMonthName(month) {
        const months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return months[month - 1];
    }

    // Initial chart setup with the first year
    window.onload = function() {
        updateChart();
    };
</script>

                   
                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Order Status Breakdown</h4>
                            <div class="dropdown">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="dropset">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="productlist.html" class="dropdown-item">Orders List</a>
                                    </li>
                                    <li>
                                        <a href="addproduct.html" class="dropdown-item">Export</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="donut-chart" class="chart-set"></div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        // Get the order status counts passed from the controller
                        var orderStatusCounts = @json($orderStatusCounts);

                        // Prepare the series data for the donut chart
                        var seriesData = [
                            orderStatusCounts.Pending,
                            orderStatusCounts.Processing,
                            orderStatusCounts['Out for Delivery'],
                            orderStatusCounts.Delivered,
                            orderStatusCounts.Cancelled
                        ];

                        if ($('#donut-chart').length > 0) {
                            var donutChart = {
                                chart: {
                                    height: 350,
                                    type: 'donut',
                                    toolbar: { show: false },
                                },
                                series: seriesData,
                                labels: ['Pending', 'Processing', 'Out for Delivery', 'Delivered', 'Cancelled'],
                                colors: ['#FFEB3B', '#FF9800', '#2196F3', '#4CAF50', '#F44336'], // Custom colors
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            width: 200
                                        },
                                        legend: {
                                            position: 'bottom'
                                        }
                                    }
                                }]
                            };

                            var chart = new ApexCharts(document.querySelector("#donut-chart"), donutChart);
                            chart.render();
                        }
                    });
                </script>

                </div>
                
                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Low Stock Items</h4>
                        <div class="table-responsive dataview">
                            <table class="table datanew ">
                                <thead>
                                    <tr>
                                        <th>Items ID</th>
                                        <th>Item Name</th>
                                        <th>Category Name</th>
                                        <th>Last Restocked Date</th>
                                        <th>Quantity in Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lowStockItems as $item)
                                    <tr>
                                        <td><a href="javascript:void(0);">{{$item->id}}</a></td>
                                        <td class="productimgname">
                                            <a class="product-img" href="productlist.html">
                                                <img src="{{$item->product_image ? asset('storage/productPictures/' .$item->product_image) : asset('icon/null-image.png')}}" alt="product">
                                            </a>
                                            <a href="productlist.html">{{$item->name}}</a>
                                        </td>
                                        <td>{{$item->categoryName}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->updated_at)->format('F j, Y')}}</td>
                                        <td>{{$item->quantity}}</td>
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

    <script src="{{ asset('manager/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('manager/plugins/apexchart/chart-data.js') }}"></script>

    <script src="{{ asset('manager/js/script.js') }}"></script>
</body>

</html>