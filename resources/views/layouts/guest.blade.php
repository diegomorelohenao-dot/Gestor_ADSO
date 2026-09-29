<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Gestor ADSO') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="auth-shell">
            <div class="auth-card glass-panel">
                <a class="brand auth-brand" href="/"><span class="brand-mark">A</span> Gestor ADSO</a>
                {{ $slot }}
            </div>
        </div>
        <script>window.flashMessages = @json(['success' => session('status'), 'error' => session('error'), 'errors' => $errors->all()]);</script>
    </body>
</html>
