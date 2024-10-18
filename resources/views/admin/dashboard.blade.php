@extends('layouts.app')

@section('title', 'Dashboard')
@section('panel_title', 'Panel de Administración')

@section('sidebar')
    <li class="nav-item">
        <a href="/dashboard" class="nav-link">Dashboard</a>
    </li>
    @if(session('rol') === 'administrador')
        <li class="nav-item">
            <a href="/profesores" class="nav-link">Gestionar Profesores</a>
        </li>
    @endif
    @if(session('rol') === 'administrador' || session('rol') === 'profesor')
        <li class="nav-item">
            <a href="/cursos" class="nav-link">Gestionar Cursos</a>
        </li>
    @endif
    <li class="nav-item">
        <a href="/actas" class="nav-link">Gestionar Actas</a>
    </li>

    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>
    </li>
@endsection

@section('content')
    <div class="container text-center mt-4">
        <!-- Mensaje personalizado basado en el rol del usuario -->
        @if(session('rol') === 'administrador')
            <h1>Bienvenido Administrador {{ session('nombre') }}</h1>
        @elseif(session('rol') === 'profesor')
            <h1>Bienvenido Profesor {{ session('nombre') }}</h1>
        @elseif(session('rol') === 'padre')
            <h1>Bienvenido Padre de Familia {{ session('nombre') }}</h1>
        @else
            <h1>Bienvenido</h1>
        @endif

        <!-- Imagen desde una URL externa -->
        <div class="mt-5">
            <img src="https://res.cloudinary.com/dkpuiyovk/image/upload/v1729183888/juancito_wukrl3.jpg" alt="Logo" class="img-fluid" style="max-width: 500px;">
        </div>

    </div>
@endsection
