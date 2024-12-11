<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('customers.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Customer List</p>
                    <h4 class="m-0 fw-bold">Info Customer</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <h5 class="fw-bold mb-3">Customer Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Name :</strong> {{ $customer->name }}</li>
                            <li><strong>Email :</strong> {{ $customer->email }}</li>
                            <li><strong>Phone :</strong> {{ $customer->phone }}</li>
                            <li><strong>Address :</strong> {{ $customer->address }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">Shipment Information</h5>
                        @if ($shipment)
                            <ul class="list-unstyled">
                                <li><strong>Shipment Number :</strong> {{ $shipment->shipment_number }}</li>
                                <li><strong>Tracking Number :</strong> {{ $shipment->tracking_number }}</li>
                                <li><strong>Status :</strong> {{ $shipment->status }}</li>
                                <li><strong>Shipment Date :</strong> {{ $shipment->shipment_date }}</li>
                                <li><strong>Delivery Date :</strong> {{ $shipment->delivery_date }}</li>
                                <li><strong>Cost :</strong> {{ $shipment->cost }}</li>
                            </ul>
                        @else
                            <p class="text-muted">No shipment information available for this customer.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
