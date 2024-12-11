<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .nav-link:hover {
            color: blue;
        }
    </style>
</head>

<body>
    <nav class="navbar mb-5 navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ route('home.index') }}">Logistic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('track.index') }}">Track Shipment</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('shipmentDetails.index') }}">Shipments Details</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('contactUs.index') }}">Contact Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-danger" href="{{ route('logout') }}">LogOut</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- col-md-9 ms-sm-auto col-lg-10 px-md-4 --}}
    <main class="content ">
        @yield('content')
    </main>
    {{-- @extends('layouts.footer') --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{--
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "2000",
            "positionClass": "toast-bottom-right"
        };
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'Success!');
        @endif
        @if (Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script> --}}
</body>
