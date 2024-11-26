<!DOCTYPE html>
<html lang="en">
<!-- Done -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .partners-carousel img {
            width: 100px;
            height: auto;
            margin: 0 10px;
        }

        /* Set custom dimensions for the carousel images */
        .carousel-img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* Space between the images */
            overflow: hidden;
            /* Prevents images from overflowing */
        }

        .carousel-img-container img {
            max-width: 150px;
            /* Adjust to your preferred size */
            height: auto;
            /* Maintain aspect ratio */
            object-fit: contain;
            /* Ensures images are not distorted */
        }

        .partners-carousel-container {
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .partners-carousel {
            display: flex;
            animation: scroll 20s linear infinite;
            max-width: 90%;
            margin: 0 auto;
        }

        /* Partners logo images styling */
        .partner-logo {
            margin: 0 15px;
            /* Add some spacing between the images */
            height: 60px;
            /* Adjust size */
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.7); z-index: 10; position: relative;">
        <div class="container">
            <i class='fas fa-warehouse' style='font-size:48px;color:white'></i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Conditional Links -->
                    @if(!Auth::check()) <!-- For Laravel -->
                    <li class="nav-item"><a class="nav-link" href="/login" style="color: white;">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register" style="color: white;">Register</a></li>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-600 small" style="color: white;">
                                    Welcome, {{ auth()->user()->name }}
                                </span>
                                <i class="fas fa-user-circle fa-2x text-gray-600"></i>
                            </a>
                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <header
        class="bg-primary text-white text-center py-5 position-relative"
        style="
        background-image: url('{{ asset('img/assets/homepage.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: -70px;
        padding-bottom: 150px; 
        height: 450px; 
        overflow: hidden; 
        z-index: 5; 
    ">
        <div class="container text-center" style="margin-top: 100px; position: relative; z-index: 2;">
            <!-- Add subtle shadow for a modern look -->
            <h1 class="display-4 fw-bold" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                Welcome to Our System
            </h1>
            <p class="lead mb-4" style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                Fast, Reliable, and Efficient
            </p>
            <div class="d-flex justify-content-center gap-4">
                <!-- Add icons using Font Awesome or any icon library -->
                <a href="/track" class="btn btn-light btn-lg d-flex align-items-center gap-2 shadow">
                    <i class="fas fa-map-marker-alt"></i> Track
                </a>
                <a href="/dashboard" class="btn btn-light btn-lg d-flex align-items-center gap-2 shadow">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
            </div>
        </div>

        <div style="
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        background: linear-gradient(to top, rgba(0, 0, 255, 0.7), rgba(0, 0, 255, 0) 100%);
        z-index: 1;
        pointer-events: none; /* Prevent this layer from blocking interactions */
    "></div>
    </header>

    <section class="text-center py-5 bg-light">
        <div class="container">
            <h2 style="margin-bottom: 20px;">ADVANTAGES</h2>
        </div>
        <div style="background: linear-gradient(to bottom, rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.5));" class="w-100 py-4">
            <div class="container text-white">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <i class="bi bi-airplane fs-1"></i>
                        <p>Fast Shipping</p>
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-geo-alt fs-1"></i>
                        <p>Real-Time Tracking</p>
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-calendar-check fs-1"></i>
                        <p>365 Operational Days</p>
                    </div>
                    <div class="col-md-3">
                        <i class="bi bi-truck fs-1"></i>
                        <p>Premium Service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-5">
        <div class="container">
            <h2 style="margin-bottom: 20px;">Partners</h2>
        </div>
        <div class="partners-carousel-container">
            <div class="partners-carousel">
                <img src="img/assets/shell.png" alt="Partner 1" class="partner-logo">
                <img src="img/assets/bmw.png" alt="Partner 2" class="partner-logo">
                <img src="img/assets/carrefour.png" alt="Partner 3" class="partner-logo">
                <img src="img/assets/fanta.png" alt="Partner 4" class="partner-logo">
                <img src="img/assets/huawei.png" alt="Partner 5" class="partner-logo">
                <img src="img/assets/hyundai.png" alt="Partner 6" class="partner-logo">
                <img src="img/assets/jordan.png" alt="Partner 7" class="partner-logo">
                <img src="img/assets/lg.png" alt="Partner 8" class="partner-logo">
                <img src="img/assets/mitsubishi.png" alt="Partner 9" class="partner-logo">
                <img src="img/assets/nike.png" alt="Partner 10" class="partner-logo">
                <img src="img/assets/playstation.png" alt="Partner 11" class="partner-logo">
                <img src="img/assets/puma.png" alt="Partner 12" class="partner-logo">
                <img src="img/assets/samsung.png" alt="Partner 13" class="partner-logo">
                <img src="img/assets/toblerone.png" alt="Partner 14" class="partner-logo">
                <img src="img/assets/ubgroup.png" alt="Partner 15" class="partner-logo">

                <!-- Dua kali biar nampak infinite -->
                <img src="img/assets/shell.png" alt="Partner 1" class="partner-logo">
                <img src="img/assets/bmw.png" alt="Partner 2" class="partner-logo">
                <img src="img/assets/carrefour.png" alt="Partner 3" class="partner-logo">
                <img src="img/assets/fanta.png" alt="Partner 4" class="partner-logo">
                <img src="img/assets/huawei.png" alt="Partner 5" class="partner-logo">
                <img src="img/assets/hyundai.png" alt="Partner 6" class="partner-logo">
                <img src="img/assets/jordan.png" alt="Partner 7" class="partner-logo">
                <img src="img/assets/lg.png" alt="Partner 8" class="partner-logo">
                <img src="img/assets/mitsubishi.png" alt="Partner 9" class="partner-logo">
                <img src="img/assets/nike.png" alt="Partner 10" class="partner-logo">
                <img src="img/assets/playstation.png" alt="Partner 11" class="partner-logo">
                <img src="img/assets/puma.png" alt="Partner 12" class="partner-logo">
                <img src="img/assets/samsung.png" alt="Partner 13" class="partner-logo">
                <img src="img/assets/toblerone.png" alt="Partner 14" class="partner-logo">
                <img src="img/assets/ubgroup.png" alt="Partner 15" class="partner-logo">
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Your Company</p>
    </footer>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>