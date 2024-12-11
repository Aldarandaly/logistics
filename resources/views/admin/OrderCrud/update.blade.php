<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Order</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('orders.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Orders List</p>
                    <h4 class="m-0 fw-bold">Update Order</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('orders.update', [$orders->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="order_number" class="form-label text-secondary fw-bold">Order Number</label>
                                <input type="number" class="form-control bg-body-secondary border-0" id="order_number"
                                    name="order_number" value="{{ $orders->order_number }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label text-secondary fw-bold">Customer Name</label>
                                <input type="text" class="form-control bg-body-secondary border-0" id="customer_name"
                                    name="customer_name" value="{{ $orders->customer_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label text-secondary fw-bold">Status</label>
                                <select class="form-control bg-body-secondary border-0" name="status" id="status">
                                    <option value="pending" {{ $orders->status == 'pending' ? 'selected' : '' }}>pending
                                    </option>
                                    <option value="completed" {{ $orders->status == 'completed' ? 'selected' : '' }}>
                                        completed
                                    </option>
                                    <option value="canceled" {{ $orders->status == 'canceled' ? 'selected' : '' }}>canceled
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="total_amount" class="form-label text-secondary fw-bold">Total Amount</label>
                                <input type="number" class="form-control bg-body-secondary border-0" id="total_amount"
                                    name="total_amount" value="{{ $orders->total_amount }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i
                            class="bi bi-recycle mx-1"></i>Update Order</button>
                </form>
            </div>
        </div>
    @endsection
</body>

</html>
