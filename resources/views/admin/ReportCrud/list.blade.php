<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container mt-5">
            <!-- Shipment Card -->
            <div class="card bg-body-tertiary border-0 p-5 shadow-sm" data-aos="zoom-in-up" data-aos-delay="200">
                <!-- Header -->
                <div class="head d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold">Reports</h2>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('reports.create') }}" class="btn btn-dark fs-6 rounded-pill px-3 py-2">
                            <i class="bi bi-plus mx-1"></i>Add Report
                        </a>
                    @endif
                </div>

                <!-- Shipment Table -->
                <div class="table-responsive mt-4">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Report Type</th>
                                <th scope="col">Details</th>
                                @if (Auth::user()->role == 'editor')
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="text-secondary">{{ $report->customer_id }}</td>
                                    <td class="text-secondary">{{ $report->report_type }}</td>
                                    <td class="text-secondary">{{ $report->details }}</td>
                                    @if (Auth::user()->role == 'editor')
                                        <td class="d-flex justify-content-evenly align-items-center">
                                            <div class="edit">
                                                <!-- Edit Button -->
                                                <a href="{{ route('reports.edit', $report->id) }}"
                                                    class="btn btn-warning me-2">
                                                    <i class="bi bi-pen"></i>
                                                </a>
                                            </div>
                                            <div class="delete">
                                                <!-- Delete Button -->
                                                <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
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
