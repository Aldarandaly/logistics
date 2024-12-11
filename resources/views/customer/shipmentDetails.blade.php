</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shipment Details</title>
</head>

<body>
    @extends('layouts.navBar')

    @section('content')
        <div class="container">
            <h1 class="text-center mb-4">Your Shipments</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>123456789</td>
                        <td>2024-12-06</td>
                        <td>In-Transit</td>
                    </tr>
                    <tr>
                        <td>987654321</td>
                        <td>2024-12-01</td>
                        <td>Delivered</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection

</body>

</html>
