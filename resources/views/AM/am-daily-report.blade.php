<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Report</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center; /* Center text and inline elements */
        }
        img {
            max-width: 300px; /* Ensure the image fits within the page */
            height: auto;     /* Maintain aspect ratio */
            display: block;    /* Make the image a block element */
            margin: 0 auto;   /* Centering */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Space between image and table */
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #acd8a7;
        }
        h2 {
            text-align: center;
            margin-top: 10px; /* Space between header and image */
        }
    </style>
</head>
<body>
    <img src="{{ public_path('manager/img/logo.png') }}" alt="Logo">
    <h2>Daily Sales</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Orders</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($dailySales as $sales)
        <tr>
            <td style="font-family: DejaVu Sans; sans-serif">{{\Carbon\Carbon::parse($sales->date)->format('F j, Y')}}</td>
            <td style="font-family: DejaVu Sans; sans-serif">{{$sales->total_orders}}</td>
            <td style="font-family: DejaVu Sans; sans-serif">₱{{$sales->total_sales}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
