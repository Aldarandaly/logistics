<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            z-index: 999;
            transition: transform 0.3s ease-in-out;
        }

        .content {
            margin-left: 250px;
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .content {
                margin-left: 0;
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }

        #sidebarToggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: #555555;
            border: none
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar"
                class="col-auto col-md-4 col-lg-3 d-md-block bg-body-tertiary sidebar min-vh-100 d-flex flex-column justify-content-between">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li>
                            <a class="logo nav-link text-center text-dark mb-5 fw-bold fs-5"
                                href="{{ route('dashboard') }}">
                                <span class="d-none d-sm-inline">Logistic</span> Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('orders.index') }}">
                                <i class="bi bi-bag-plus mx-2"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('shipments.index') }}">
                                <i class="bi bi-box-seam mx-2"></i>
                                <span>Shipments</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('users.index') }}">
                                <i class="bi bi-person-vcard mx-2"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('customers.index') }}">
                                <i class="bi bi-people mx-2"></i>
                                <span>Customers</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('payments.index') }}">
                                <i class="bi bi-credit-card mx-2"></i>
                                <span>Payments</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('reports.index') }}">
                                <i class="bi bi-flag mx-2"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('ShowContactUs.index') }}">
                                <i class="bi bi-person-rolodex mx-2"></i>
                                <span>Contact Message</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark fw-bold" href="{{ route('activities.index') }}">
                                <i class="bi bi-bell mx-2"></i>
                                <span>User Activity</span>
                            </a>
                        </li>
                        <li class=" mb-2">
                            <div class="userInfo d-flex justify-content-around align-item-center "
                                style="margin-top: 200px">
                                <i class="bi bi-person-circle ml-2">
                                    {{ Auth::user()->name }}
                                </i>
                                <a href="{{ route('logout') }}" class="text-danger">LogOut</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <button class="btn btn-primary d-md-none" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>
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
    </script>
</body>
