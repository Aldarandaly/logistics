<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Customer</title>
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
                    <h4 class="m-0 fw-bold">Add New Customer</h4>
                </div>
            </div>
            <div class="card bg-body-tertiary border-0 p-5 mt-3">
                <form action="{{ route('customers.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label text-secondary fw-bold">Name</label>
                        <input type="text" class="form-control bg-body-secondary border-0" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-secondary fw-bold">Email</label>
                        <input type="email" class="form-control bg-body-secondary border-0" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text-secondary fw-bold">Phone</label>
                        <input type="number" class="form-control bg-body-secondary border-0" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label text-secondary fw-bold">Address</label>
                        <input type="text" class="form-control bg-body-secondary border-0" id="address" name="address" required>
                    </div>
                    <button type="submit" class="btn btn-dark fs-6 rounded-pill px-3 py-2"><i class="bi bi-plus"></i>Create
                    </button>
                </form>
            </div>
        </div>
    @endsection

</html>