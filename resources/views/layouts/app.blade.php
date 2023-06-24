<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Add any additional CSS or JavaScript files you need -->
</head>
<body>
    <div id="app">
        <nav>
            <!-- Your navigation code here -->
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <!-- Your footer code here -->
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Add any additional JavaScript files or scripts you need -->
</body>
</html>