<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'menu.access'])->group(function () {
    Route::get('/crops', function () {
     //   return Inertia::render('Crops::Crop');
    });
    // Aquí puedes añadir más rutas web (create, edit) si lo deseas
});