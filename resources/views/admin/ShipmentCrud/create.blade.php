<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Shipment</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('shipments.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Shipment List</p>
                    <h4 class="m-0 fw-bold">Add New Shipment</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('shipments.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <!-- First Column: Customer Id,  Shipment Number, Tracking Number, Status, and Shipment Date -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_id" class="form-label text-secondary fw-bold">Customer Id
                                </label>
                                <select class="form-control bg-body-secondary border-0" name="customer_id" id="customer_id" required>
                                    <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->id }} - {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="shipment_number" class="form-label text-secondary fw-bold">Shipment
                                    Number</label>
                                <input type="number" class="form-control bg-body-secondary border-0" id="shipment_number"
                                    name="shipment_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tracking_number" class="form-label text-secondary fw-bold">Tracking
                                    Number</label>
                                <input type="text" class="form-control bg-body-secondary border-0" id="tracking_number"
                                    name="tracking_number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label text-secondary fw-bold">Status</label>
                                <select class="form-control bg-body-secondary border-0" name="status" id="status" required>
                                    <option value="">Select Status</option>
                                    <option value="new">New</option>
                                    <option value="in_transit">In Transit</option>
                                    <option value="delivered">Delivered</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="shipment_date" class="form-label text-secondary fw-bold">Shipment Date</label>
                                <input type="date" class="form-control bg-body-secondary border-0" id="shipment_date"
                                    name="shipment_date" required>
                            </div>
                        </div>

                        <!-- Second Column: Delivery Date, Cost, Payment Status -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="delivery_date" class="form-label text-secondary fw-bold">Delivery Date</label>
                                <input type="date" class="form-control bg-body-secondary border-0" id="delivery_date"
                                    name="delivery_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cost" class="form-label text-secondary fw-bold">Cost</label>
                                <input type="number" class="form-control bg-body-secondary border-0" id="cost"
                                    name="cost" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="payment_status" class="form-label text-secondary fw-bold">Payment Status</label>
                                <select class="form-control bg-body-secondary border-0" name="payment_status"
                                    id="payment_status" required>
                                    <option value="">Select Status</option>
                                    <option value="paid">Paid</option>
                                    <option value="unpaid">Unpaid</option>
                                    <option value="partial">Partial</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i
                                class="bi bi-plus"></i>Create</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</body>

</html>
