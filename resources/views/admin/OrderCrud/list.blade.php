<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <!-- Orders Card -->
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <!-- Header -->
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Orders</h2>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('orders.create') }}" class="btn btn-dark fs-6 rounded-pill px-3 py-2">
                            <i class="bi bi-plus mx-1"></i>Add Order
                        </a>
                    @endif
                </div>

                <!-- Orders Table -->
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Order Number</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Amount</th>
                                @if (Auth::user()->role == 'editor')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th class="text-secondary">{{ $order->order_number }}</th>
                                    <td class="text-secondary">{{ $order->customer_name }}</td>
                                    <td class="text-secondary">{{ $order->status }}</td>
                                    <td class="text-secondary">{{ $order->total_amount }}</td>
                                    @if (Auth::user()->role == 'editor')
                                        <td class="d-flex justify-content-evenly align-items-center">
                                            <div class="edit">
                                                <!-- Edit Button -->
                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                    class="btn btn-warning me-2">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            </div>

                                            <div class="delete">
                                                <!-- Delete Button -->
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
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
