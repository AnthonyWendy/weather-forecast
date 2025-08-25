<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Projeto Laravel')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F3E8FF;
            color: #212121;
        }

        .btn-gradient {
            background: linear-gradient(45deg, #953BEE, #C179FF);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            filter: brightness(1.1);
            transform: scale(1.05);
        }

        .weather-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.5);
            display: block;
        }

        .card-weather {
            background: linear-gradient(135deg, #953BEE, #C179FF);
            color: #FFFFFF;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .form-control-custom {
            border: 1px solid #C179FF;
            border-radius: 50px;
            background: #FFFFFF;
            color: #212121;
            max-width: 220px;
        }

        .alert-custom {
            border-color: #E53935;
            background-color: #FFEAEA;
            color: #E53935;
            border-radius: 0.5rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.1);
        }

        @media (max-width: 767px) {
            .d-flex.flex-md-row {
                flex-direction: column !important;
            }
        }

        /* Navbar styles */
        .navbar-nav .nav-link {
            color: #212121;
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            background-color: #C179FF;
            color: #FFFFFF;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-toggler:hover {
            color: #7B2FF7;
        }
        .navbar-brand:hover {
            color: #7B2FF7;
        }
        .nav-link {
            border-radius: 8px;
            padding: 0.5rem 1rem;
        }
    </style>
    @stack('head')
</head>
<body>
    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Conteúdo principal --}}
    <div class="max-w-7xl mx-auto p-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
