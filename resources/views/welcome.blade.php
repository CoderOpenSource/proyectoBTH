<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Seguimiento y Comportamiento de Estudiantes</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Estilo para asegurar que las imágenes se ajusten */
        .carousel-image {
            height: 100%;
            max-height: 400px; /* Altura máxima que deseas para el carrusel */
            width: 100%;
            object-fit: cover; /* Ajusta la imagen sin deformarla */
        }

        /* Ajuste responsivo para el carrusel */
        #studentCarousel {
            min-height: 300px; /* Altura mínima */
        }
    </style>

</head>
<body class="bg-light text-dark">

<div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">

    <!-- Header con opciones de Registro y Login -->
    <header class="w-100 d-flex justify-content-end py-3">
        <a href="{{ route('login') }}" class="btn btn-primary me-2 bg-dark text-white">Login</a>
    </header>

    <div class="row w-100">
        <div class="text-center py-5">
            <h1 class="display-4 text-primary">Registro de Seguimiento y Comportamiento de Estudiantes</h1>
            <p class="lead">Una plataforma para el registro y seguimiento del comportamiento estudiantil.</p>
        </div>
    </div>

    <!-- Slider (Carousel) -->
    <div class="row w-100 mb-5">
        <div id="studentCarousel" class="carousel slide col-12 col-lg-8 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://res.cloudinary.com/dkpuiyovk/image/upload/v1729184370/pngwing.com_1_uxl2hy.png" class="d-block w-100 carousel-image" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dkpuiyovk/image/upload/v1729183888/juancito_wukrl3.jpg" class="d-block w-100 carousel-image" alt="Slide 1">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#studentCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#studentCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

    </div>

    <div class="row w-100">
        <main class="col-12 col-lg-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="h3">Nuestro Proyecto</h2>
                    <p class="mt-4">Una herramienta esencial para mejorar la disciplina y la comunicación en la comunidad educativa.</p>
                </div>
            </div>
        </main>
    </div>

    <footer class="text-center py-4">
        <small>Registro de Seguimiento y Comportamiento de Estudiantes © 2024 - Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</small>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
