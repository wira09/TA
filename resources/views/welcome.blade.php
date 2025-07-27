<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracer Study</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<body>

    <header class="container mb-4">
        <nav class="navbar">
            <div class="container-fluid">
                <img src="{{ asset('images/logo.png') }}" alt="Tracer Study Logo" class="img-fluid text-center" style="max-width: 90px;">
                {{-- <a class="navbar-brand">Tracer Study</a> --}}
                <form class="d-flex" role="search">
                    @if (Route::has('login'))
                        <nav class="d-flex justify-content-end gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline-dark btn-sm">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-sm">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </form>
            </div>
        </nav>

    </header>

    <main class="container text-center mt-3">
        <img src="{{ asset('images/High School-rafiki.png') }}" alt="Tracer Study Logo" class="img-fluid mb-4" style="max-width: 400px;">
        <h1 class="display-5 fw-bold">Selamat Datang di Tracer Study Poltektedc</h1>
        <p class="lead">Platform pelacakan alumni dan perkembangan karier mereka.</p>
        <!-- Tambahkan konten utama di sini -->
    </main>

    {{-- @if (Route::has('login'))
        <footer class="mt-5 d-none d-lg-block">
            <small class="text-muted">© {{ date('Y') }} Tracer Study. All rights reserved.</small>
        </footer>
    @endif --}}

</body>

</html>
