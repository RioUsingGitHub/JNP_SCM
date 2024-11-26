<!DOCTYPE html>
<html lang="en">
<!-- Done, tested -->

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
            /* Space between the images dikasi gap*/
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

        /* Banner Section */
        .profile-banner {
            background-color: white;
            /* Fallback color */
            mix-blend-mode: multiply;
            /* Adjust transparency for blending */
            height: auto;
            padding-bottom: 10px;
            /* Additional space for name alignment */
        }

        /* Adjust Modal Body */
        .modal-body {
            border-radius: 0.5rem;
            padding-top: 60px;
            /* Account for overlapping profile picture */
        }

        /* Profile Picture Adjustments */
        .modal-body img {
            margin-top: -70px;
            /* Overlaps with the banner */
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
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0.7); z-index: 10; position: relative;">
        <div class="container">
            <i class='fas fa-warehouse' style='font-size:48px;color:white'></i>
            <button class="navbar-toggler text-white border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <style>
                        /* Force visibility on mobile */
                        @media (max-width: 991.98px) {
                            .navbar-collapse {
                                display: none;
                                background-color: rgba(0, 0, 0, 0.9);
                                padding: 1rem;
                                position: absolute;
                                top: 100%;
                                left: 0;
                                right: 0;
                                z-index: 1000;
                            }

                            .navbar-collapse.show {
                                display: block !important;
                            }

                            .navbar-nav {
                                display: flex !important;
                                flex-direction: column;
                                align-items: start;
                                width: 100%;
                            }

                            .nav-item {
                                width: 100%;
                                padding: 0.5rem 1rem;
                            }

                            .nav-link {
                                color: white !important;
                            }

                            .dropdown-menu {
                                background-color: rgba(0, 0, 0, 0.8);
                                border: none;
                                width: 100%;
                            }

                            .dropdown-item {
                                color: white;
                            }

                            .dropdown-item:hover {
                                background-color: rgba(255, 255, 255, 0.1);
                                color: white;
                            }
                        }
                    </style>
                    @if(!Auth::check())
                    <li class="nav-item"><a class="nav-link" href="/login" style="color: white;">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register" style="color: white;">Register</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 text-white">
                                Welcome, {{ auth()->user()->name }}
                            </span>
                            <i class="fas fa-user-circle fa-2x text-white"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                    <i class="fas fa-user fa-sm fa-fw me-2"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2"></i> Settings</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2"></i> Logout
                                </a>
                            </li>
                        </ul>

                    </li>
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

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Banner Section -->
                <div class="profile-banner"
                    style="background: url('img/assets/art.png') center/cover; position: relative; height: 200px;">
                    <!-- Profile Picture -->
                    <div class="position-absolute" style="bottom: 20px; left: 50%; transform: translateX(-50%);">
                        <img src="img/assets/profileowo.png" class="rounded-circle shadow" alt="Profile Picture"
                            style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #fff;">
                    </div>

                </div>

                <!-- Profile Info -->
                <div class="modal-body text-center bg-white rounded-top px-4 py-5 shadow mt-3">
                    <!-- Name -->
                    <h5 class="mb-1">SI OWO</h5>

                    <!-- Role -->
                    <small class="text-muted d-block mb-3">Super Admin</small>

                    <!-- Actions -->
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-primary px-4">Edit</button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary px-4">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            // Handle toggler click
            navbarToggler.addEventListener('click', function() {
                navbarCollapse.classList.toggle('show');
            });

            // Close navbar when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = navbarCollapse.contains(event.target) ||
                    navbarToggler.contains(event.target);

                if (!isClickInside && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });

            // Close navbar when pressing escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>