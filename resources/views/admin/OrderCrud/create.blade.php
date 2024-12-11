<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('orders.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Orders List</p>
                    <h4 class="m-0 fw-bold">Add New Order</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('orders.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="order_number" class="form-label text-secondary fw-bold">Order Number</label>
                        <input type="number" class="form-control bg-body-secondary border-0" id="order_number"
                            name="order_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_name" class="form-label text-secondary fw-bold">Customer Name</label>
                        <input type="text" class="form-control bg-body-secondary border-0" id="customer_name"
                            name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label text-secondary fw-bold">Status</label>
                        <select class="form-control bg-body-secondary border-0" name="status" id="status" required>
                            <option value="">Select Status</option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                            <option value="canceled">canceled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="total_amount" class="form-label text-secondary fw-bold">Total Amount</label>
                        <input type="number" class="form-control bg-body-secondary border-0" id="total_amount"
                            name="total_amount" required>
                    </div>
                    <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2 mx-1"><i
                            class="bi bi-plus"></i>Create</button>
                </form>
            </div>
        </div>
    @endsection
</body>

</html>
