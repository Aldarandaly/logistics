<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Track Shipment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .form-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .shipment-details {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .margin {
            margin-top: 6rem;
        }
    </style>
</head>

<body>
    @extends('layouts.navBar')

    @section('content')
        <div class="container margin">
            <div
                class="card border-0 bg-body-tertiary p-5 d-flex flex-lg-row flex-column justify-content-between align-items-center">
                <div class="form-section flex-grow-1 me-lg-4 mb-5 mb-lg-0">
                    <h1 class="my-4 text-primary">
                        <i class="bi bi-truck"></i> Track Your Shipment
                    </h1>
                    <form class="mb-4" method="POST" action="{{ route('shipment.track') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="shipment_number" class="form-label"><i class="bi bi-box"></i> Enter Shipment
                                Number :</label>
                            <input class="form-control" type="text" name="shipment_number" id="shipment_number" required
                                placeholder="e.g., 12345">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Track
                        </button>
                    </form>
                </div>

                <div class="shipment-details flex-grow-1">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                        </div>
                    @endif
                    @if (isset($shipment))
                        <h2 class="text-success">
                            <i class="bi bi-info-circle"></i> Shipment Details:
                        </h2>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Status:</strong> {{ $shipment->status }}
                            </li>
                            <li class="list-group-item">
                                <strong>Tracking Number:</strong> {{ $shipment->tracking_number }}
                            </li>
                            <li class="list-group-item">
                                <strong>Cost:</strong> ${{ $shipment->cost }}
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    @endsection

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
