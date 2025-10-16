<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urbanwood Furnitures</title>
    <!-- Vite Directive to load our CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    <!-- Navigation will go here -->
    <!-- @include('layouts.navigation') -->

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Future Footer will go here -->
</body>
</html>