<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background-color: #000000;
            padding-top: 20px;
        }
        .sidebar h2 {
            color: white;
            text-align: center;
        }
        .sidebar ul.nav {
            padding-left: 0;
        }
        .sidebar ul.nav li.nav-item a {
            color: white;
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .sidebar ul.nav li.nav-item a:hover {
            background-color: #495057;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar o menú lateral -->
    <nav class="sidebar">
        <h2>@yield('panel_title', 'Admin Panel')</h2> <!-- Título dinámico del panel -->
        <ul class="nav flex-column">
            @yield('sidebar') <!-- Aquí se inyectarán los elementos del menú -->
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="content">
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
    <p>Admin Panel © 2024 - Todos los derechos reservados</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
