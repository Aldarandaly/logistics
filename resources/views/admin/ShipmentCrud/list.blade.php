<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shipment</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <!-- Shipment Card -->
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <!-- Header -->
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Shipments</h2>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('shipments.create') }}" class="btn btn-dark fs-6 rounded-pill px-3 py-2">
                            <i class="bi bi-plus mx-1"></i>Add Shipment
                        </a>
                    @endif
                </div>

                <!-- Shipment Table -->
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Shipment Number</th>
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Shipment Date</th>
                                <th scope="col">Delivery Date</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td class="text-secondary">{{ $shipment->shipment_number }}</td>
                                    <td class="text-secondary">{{ $shipment->tracking_number }}</td>
                                    <td class="text-secondary">{{ $shipment->status }}</td>
                                    <td class="text-secondary">{{ $shipment->shipment_date }}</td>
                                    <td class="text-secondary">{{ $shipment->delivery_date }}</td>
                                    <td class="text-secondary">{{ $shipment->cost }}</td>
                                    <td class="text-secondary">{{ $shipment->payment_status }}</td>

                                    <td class="d-flex justify-content-evenly align-items-center">
                                        @if (Auth::user()->role == 'editor')
                                            <div class="edit">
                                                <!-- Edit Button -->
                                                <a href="{{ route('shipments.edit', $shipment->id) }}"
                                                    class="btn btn-warning me-2">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <!-- Delete Button -->
                                                <form action="{{ route('shipments.destroy', $shipment->id) }}"
                                                    method="POST" style="display:inline;">
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
