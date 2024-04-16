<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Events</title>

    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon/icon.png') }}" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.css') }}" />
    <!-- App Css -->
    @include('layouts.head')


    <style>
        body {
            background-color: #f8f9fa;
            margin: 0; /* Remove default margin */
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%; /* Full width */
        }

        .card {
            max-width: 400px; /* Adjust as needed */
            width: 100%; /* Full width */
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">Login</h2>
                <!-- Login Form -->
                <form action="{{ route('login') }}" method="post">
                    @method('POST') @csrf
                    <!-- Username Input -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="Username" type="text" name="username"
                            value="{{ old('username') }}">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password"
                            name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Import Js Files -->
    @include('layouts.foot')
</body>

</html>
