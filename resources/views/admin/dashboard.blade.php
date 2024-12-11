<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #f5f5f5;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .spinner {
            border: 5px solid green;
            border-top: 5px solid #f5f5f5;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <!-- Loader -->
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <!-- Dashboard Content -->
        <div class="container mt-5">
            <div class="row g-4" data-aos="zoom-in-up" data-aos-delay="1200">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $orders }}</span>
                                <h5 class="card-title">Orders</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-cart fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $shipments }}</span>
                                <h5 class="card-title">Shipments</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-box-seam fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $users }}</span>
                                <h5 class="card-title">Users</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-person fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $customers }}</span>
                                <h5 class="card-title">Customers</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-people fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $payments }}</span>
                                <h5 class="card-title">Payments</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-wallet fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $reports }}</span>
                                <h5 class="card-title">Reports</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-flag fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $totalCost }}</span>
                                <h5 class="card-title">Total Profit</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-cash-coin fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card bg-body-tertiary border-0 shadow-sm">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="info">
                                <span class="fs-4 text-success">{{ $unpaidCost }}</span>
                                <h5 class="card-title">Total Loss</h5>
                            </div>
                            <div class="icon">
                                <i class="bi bi-arrow-down-right-square fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
            }, 1000);
        });
    </script>
</body>

</html>
