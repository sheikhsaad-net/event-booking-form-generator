<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ url('/assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])

   <!-- Styles -->
   @livewireStyles
</head>


    <body>
       <!-- Header Section -->
        <div class="text-center my-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logos/logo.png') }}" 
                    alt="Fondazione Il Carro Logo" 
                    class="img-fluid mx-auto d-block" 
                    style="max-height:90px;">
            </a>
            <div class="brand-subtitle mt-2">
                ARTE, FEDE, STORIA, TRADIZIONE
            </div>
        </div>


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-top border-bottom mt-3">
            <div class="container justify-content-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/fondazione/">LA FONDAZIONE</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://www.fondazioneilcarrodimirabella.it/carro/" role="button" data-bs-toggle="dropdown">
                                IL CARRO
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://www.fondazioneilcarrodimirabella.it/gallery/">Gallery</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/museo/">MUSEO</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/diventa-socio/">DIVENTA SOCIO</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://www.fondazioneilcarrodimirabella.it/donazioni/" role="button" data-bs-toggle="dropdown">
                                DONAZIONI
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="https://www.fondazioneilcarrodimirabella.it/progetti/">Progetti</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/newseventi1/">NEWS/EVENTI</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/amm-trasparente/">TRASPARENZA</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://www.fondazioneilcarrodimirabella.it/contatti/">CONTATTI</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="font-sans text-gray-900 antialiased" style="background:#fdf6ea;">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer style="text-align:center; padding:30px 20px; font-family:Arial, sans-serif; color:#000;">
            
            <div class="text-center my-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logos/logo.png') }}" 
                        alt="Fondazione Il Carro Logo" 
                        class="img-fluid mx-auto d-block" 
                        style="max-height:100px;">
                </a>
                <div class="brand-subtitle mt-2">
                    ARTE, FEDE, STORIA, TRADIZIONE
                </div>
            </div>

            <!-- Navigation -->
            <nav style="margin-bottom:20px; font-size:16px;">
    <a href="https://www.fondazioneilcarrodimirabella.it/fondazione/" style="margin:0 10px; color:#000; text-decoration:none;">
        La Fondazione
    </a>

    <div style="display:inline-block; position:relative; margin:0 10px;">
        <a href="https://www.fondazioneilcarrodimirabella.it/carro/" style="color:#000; text-decoration:none;">
            Il Carro
        </a>
        <ul style="list-style:none; padding:5px 10px; margin:0; position:absolute; left:0; top:100%; background:#fff; display:none; border:1px solid #ddd;">
            <li><a href="https://www.fondazioneilcarrodimirabella.it/gallery/" style="color:#000; text-decoration:none;">Gallery</a></li>
        </ul>
    </div>

    <a href="https://www.fondazioneilcarrodimirabella.it/museo/" style="margin:0 10px; color:#000; text-decoration:none;">
        Museo
    </a>

    <a href="https://www.fondazioneilcarrodimirabella.it/diventa-socio/" style="margin:0 10px; color:#000; text-decoration:none;">
        Diventa Socio
    </a>

    <div style="display:inline-block; position:relative; margin:0 10px;">
        <a href="https://www.fondazioneilcarrodimirabella.it/donazioni/" style="color:#000; text-decoration:none;">
            Donazioni 
        </a>
        <ul style="list-style:none; padding:5px 10px; margin:0; position:absolute; left:0; top:100%; background:#fff; display:none; border:1px solid #ddd;">
            <li><a href="https://www.fondazioneilcarrodimirabella.it/progetti/" style="color:#000; text-decoration:none;">Progetti</a></li>
        </ul>
    </div>

    <a href="https://www.fondazioneilcarrodimirabella.it/newseventi1/" style="margin:0 10px; color:#000; text-decoration:none;">
        News/Eventi
    </a>

    <a href="https://www.fondazioneilcarrodimirabella.it/amm-trasparente/" style="margin:0 10px; color:#000; text-decoration:none;">
        Trasparenza
    </a>

    <a href="https://www.fondazioneilcarrodimirabella.it/contatti/" style="margin:0 10px; color:#000; text-decoration:none;">
        Contatti
    </a>
</nav>

            <!-- Legal Info -->
            <div style="font-size:14px; margin-bottom:15px;">
                Sede legale: Via Municipio snc, 83036 Mirabella Eclano (Av) · 
                Codice fiscale: 90029240646 · 
                Repertorio RUNTS: 142395
            </div>

            <!-- Contacts -->
            <div style="font-size:15px;">
                <a href="mailto:info@fondazioneilcarrodimirabella.it" style="color:#000; text-decoration:underline;">
                    info@fondazioneilcarrodimirabella.it
                </a> | 
                <a href="mailto:fondazioneilcarrodimirabella@pec.it" style="color:#000; text-decoration:underline;">
                    fondazioneilcarrodimirabella@pec.it
                </a>
            </div>

        </footer>

        @livewireScripts
    <!--   Core JS Files   -->
    <script src="{{ url('/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
 
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('/assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
    </body>
</html>
