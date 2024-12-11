<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <!-- Shipment Card -->
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <!-- Header -->
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Payments</h2>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('payments.create') }}" class="btn btn-dark fs-6 rounded-pill px-3 py-2">
                            <i class="bi bi-plus mx-1"></i>Add Payment
                        </a>
                    @endif
                </div>

                <!-- Shipment Table -->
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Shipment Id</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-secondary">{{ $payment->shipment_id }}</td>
                                    <td class="text-secondary">{{ $payment->amount }}</td>
                                    <td class="text-secondary">{{ $payment->status }}</td>

                                    <td class="d-flex justify-content-evenly align-items-center">
                                        @if (Auth::user()->role == 'editor')
                                            <div class="edit">
                                                <!-- Edit Button -->
                                                <a href="{{ route('payments.edit', $payment->id) }}"
                                                    class="btn btn-warning me-2">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            </div>

                                            <div class="delete">
                                                <!-- Delete Button -->
                                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
