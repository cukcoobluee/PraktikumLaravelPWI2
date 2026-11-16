
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>Belajar Laravel 12</title>

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .footer {
            height: 50px;
            width: 100%;
            background-color: aqua;
            text-align: center;
            line-height: 50px;
            margin-top: auto;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Isi Konten --}}
    <main class="container mt-3">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
