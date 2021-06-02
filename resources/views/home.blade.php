<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Login Sytem</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        div,
        p,
        footer {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body class="antialiased">
    <div class="nav">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
    </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <h1>Welcome to User Authentication System</h1>
        <h3>By Sumant Kumar</h3>
    </div>
    <div class="d-flex justify-content-between" style="font-size: large;">
        <div>
            <a href="register">← Go to Register</a>
        </div>
        <div>
            <a href="login">Go to Login →</a>
        </div>
    </div>
    <div class="below">
        <p>This user authentication system is created manually. The registration system uses EORM to store data and Login system uses inbuilt Auth system of Laravel for authentication</p>
        <footer>&copy; Copyrights Sumant Kumar-2021| All Rights Reserved</footer>
    </div>
    <style>
        div.below {
            position: absolute;
            bottom: 5px;
        }
    </style>

</body>

</html>