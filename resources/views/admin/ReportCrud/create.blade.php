<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Report</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container my-5" data-aos="zoom-in-up" data-aos-delay="200">
            <div class="head d-flex align-items-center">
                <div class="back">
                    <a href="{{ route('reports.index') }}" class="text-secondary fw-bold fs-1"><i
                            class="bi bi-arrow-left-short"></i></a>
                </div>
                <div class="info mx-2 d-flex flex-column align-items-start">
                    <p class="m-0 fs-6 text-secondary fw-bold">Back To Report List</p>
                    <h4 class="m-0 fw-bold">Add New Report</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('reports.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="customer_id" class="form-label text-secondary fw-bold">Customer Id</label>
                        <select class="form-control bg-body-secondary border-0" name="customer_id" id="customer_id" required>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->id }} - {{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="report_type" class="form-label text-secondary fw-bold">Report Type</label>
                        <select class="form-control bg-body-secondary border-0" name="report_type" id="report_type" required>
                            <option value="profit">Profit</option>
                            <option value="loss">Loss</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label text-secondary fw-bold">Details</label>
                        <input type="text" class="form-control bg-body-secondary border-0" id="details" name="details" required>
                    </div>
                    <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i class="bi bi-plus"></i>Create
                    </button>
                </form>
            </div>
        </div>
    @endsection

</html>
