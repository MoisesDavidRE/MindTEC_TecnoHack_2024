<?php

use Illuminate\Support\Facades\Route;

// página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// página login
Route::get('/login', function () {
    return view('login');
});

// Ruta principal
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Ruta genérica para servir secciones
Route::get('/section/{name}', function ($name) {
    // ruta de vista a partir del nombre proporcionado
    $viewPath = "sections.{$name}";

    if (view()->exists($viewPath)) {
        return view($viewPath);
    }

    return response('Sección no encontrada', 404);
});
