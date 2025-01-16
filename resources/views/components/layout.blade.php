<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: linear-gradient(rgba(29, 78, 216, 0.5), rgba(29, 78, 216, 0.5)), url('{{ asset('img/tirta_bg.jpeg') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    {{-- Konten Halaman --}}
    <div class="w-full max-w-md mx-auto">
        @yield('content')
    </div>
</body>

</html>
