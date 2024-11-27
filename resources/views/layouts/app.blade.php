<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JNP Analytics</title>
    <link rel="icon" href="img\logoJNP.png" type="image/x-icon">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        /* Make the wrapper take full viewport height */
        #wrapper {
            height: 100vh;
            overflow: hidden;
        }

        /* Fix sidebar position and height */
        .navbar-nav.sidebar {
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            width: inherit;
            z-index: 1;
        }

        /* Adjust content wrapper to take remaining space */
        #content-wrapper {
            height: 100vh;
            margin-left: 14rem;
            /* Adjust based on your sidebar width */
            display: flex;
            flex-direction: column;
        }

        /* Fix topbar position */
        .topbar {
            position: sticky;
            top: 0;
            z-index: 2;
            background-color: #fff;
        }

        /* Make main content scrollable */
        #content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            /* Important for Firefox */
        }

        /* Create scrollable container for main content */
        .content-scroll {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem;
        }

        /* Fix footer at bottom */
        footer {
            position: sticky;
            bottom: 0;
            z-index: 2;
            background-color: #fff;
        }

        /* Ensure modals appear above everything */
        .modal {
            z-index: 1050;
        }

        /* Banner Section */
        .profile-banner {
            background-color: white;
            /* Fallback color */
            /* Adjust transparency for blending */
            height: auto;
            padding-bottom: 10px;
            /* Additional space for name alignment */
        }

        /* Adjust Modal Body */
        .modal-body {
            border-radius: 0.5rem !important;
            padding-top: 60px;
            /* Account for overlapping profile picture */
        }

        /* Profile Picture Adjustments */
        .modal-body img {
            margin-top: -70px;
            /* Overlaps with the banner */
        }

        /* Constrain SVG size globally */
        .icon {
            width: 20px;
            /* Set desired width */
            height: 20px;
            /* Set desired height */
            max-width: 100%;
            /* Ensures responsiveness */
            max-height: 100%;
            /* Ensures responsiveness */
        }

        /* Optionally, add spacing adjustments for inline SVGs */
        .icon+span,
        .icon+p {
            margin-left: 0.5rem;
            /* Space between the SVG and text */
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        @include('components.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                @include('components.topbar')

                <!-- Scrollable Content Container -->
                <div class="content-scroll">
                    @yield('content')
                </div>

                @stack('scripts')
            </div>

            <!-- Footerzz -->
            @include('components.footer')
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
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

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>