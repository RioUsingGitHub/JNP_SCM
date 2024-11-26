<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SCM') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Login Page Styles */
        .login-layout {
            background-color: #3572ef;
            position: relative;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-layout::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('img/assets/vehicle.png') }}");
            background-repeat: repeat;
            background-position: center;
            background-size: auto;
            opacity: 0.3;
            z-index: -1;
            mix-blend-mode: multiply;
        }

        .login-background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background-image: url("{{ asset('img/assets/package.png') }}");
            background-size: cover;
            background-position: center;
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            z-index: 1;
        }

        .login-gradient-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 255, 0.3), rgba(0, 0, 255, 0) 80%);
            z-index: 1;
            pointer-events: none;
        }

        .login-form-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        /* Register Page Styles */
        .register-container {
            display: flex;
            height: 100vh;
        }

        .background-image {
            flex: 1;
            background-image: url("{{ asset('img/assets/warehouse.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.8;
            position: relative;
        }

        .register-form {
            flex: 1;
            background: linear-gradient(180deg, #1230ad, #3572ef);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .form-box {
            background-color: #fff;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        @media (max-width: 860px) {
            .register-container {
                flex-direction: column;
            }

            .background-image {
                width: 100%;
                height: 100vh;
                position: absolute;
                top: 0;
                left: 0;
            }

            .register-form {
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 255, 0.2);
                justify-content: center;
                align-items: center;
                position: relative;
            }

            .form-box {
                width: 90%;
                max-width: 400px;
                margin: 20px auto;
            }
        }
    </style>
</head>

<body>
    @if (request()->routeIs('register'))
    <!-- Registration Page Layout -->
    <div class="register-container">
        <!-- Background Image -->
        <div class="background-image"></div>
        <div style="position: absolute; bottom: 0; left: 0; right: 0; top: 0; 
                        background: linear-gradient(to top, rgba(0, 0, 255, 0.4), rgba(0, 0, 255, 0.2) 100%);
                        z-index: 1; pointer-events: none;"></div>

        <!-- Register Form -->
        <div class="register-form" style="z-index: 2">
            {{ $slot }}
        </div>
    </div>
    @else
    <!-- Login Page Layout -->
    <div class="login-layout">
        <div class="login-background-overlay"></div>
        <div class="login-gradient-overlay"></div>
        {{ $slot }}
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>