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
            <h1 class="my-5 text-primary">Your Shipments</h1>
            @if ($shipments && count($shipments) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Shipment Number</th>
                            <th>Tracking Number</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipments as $shipment)
                            <tr>
                                <td>{{ $shipment->shipment_number }}</td>
                                <td>{{ $shipment->tracking_number }}</td>
                                <td>{{ $shipment->delivery_date }}</td>
                                <td>{{ $shipment->status }}</td>
                                <td>{{ $shipment->cost }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-circle me-2" aria-hidden="true"></i>
                    <span>No shipments available at this time.</span>
                </div>
            @endif
        </div>
    @endsection

</body>

</html>
