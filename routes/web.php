<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verificacion', function () {//cambie la V mayuscula por que es mala practica utiizar mayusculas en rutas.
    return 'Gestor ADSO - entorno configurado correctamente';
});

