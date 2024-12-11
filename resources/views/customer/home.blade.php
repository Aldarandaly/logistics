<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 6px solid #ddd;
            border-top: 6px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        body {
            background-color: #f8f9fa;
        }

        h1 {
            font-size: 3rem;
            color: #007bff;
        }

        .feature-icon {
            font-size: 3rem;
            color: #007bff;
        }
        .head {
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
</head>

<body>
    @extends('layouts.navBar')

    @section('content')
        <div id="loader">
            <div class="spinner"></div>
        </div>

        <div class="container">
            <div class="head text-center" data-aos="fade-down">
                <h1 class="display-4 fw-bold">Welcome to Logistic</h1>
                <p class="lead mt-3">
                    We provide the best logistics and shipment services globally.
                </p>
            </div>

            <div class="row text-center d-flex justify-content-around align-items-center">
                <div class="col-md-4" data-aos="fade-right">
                    <i class="feature-icon bi bi-truck"></i>
                    <h3 class="mt-3">Fast Delivery</h3>
                    <p>We ensure your packages are delivered on time.</p>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <i class="feature-icon bi bi-shield-lock"></i>
                    <h3 class="mt-3">Secure Shipments</h3>
                    <p>Your items are handled with utmost care.</p>
                </div>
                <div class="col-md-4" data-aos="fade-left">
                    <i class="feature-icon bi bi-globe"></i>
                    <h3 class="mt-3">Global Reach</h3>
                    <p>We operate in over 50 countries worldwide.</p>
                </div>
            </div>
        </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();

            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
            }, 1000);
        });
    </script>
</body>

</html>
