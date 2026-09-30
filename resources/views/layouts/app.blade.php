<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>@yield('title', 'Gestor ADSO') | Gestor ADSO</title>
 @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
 <nav class="site-nav">
 <a class="brand" href="{{ url('/') }}"><span class="brand-mark">A</span> Gestor ADSO</a>
 <div class="nav-links">
 @auth
 <a href="{{ route('dashboard') }}" @class(['nav-current' => request()->routeIs('dashboard')])>Panel</a>
 @can('viewAny', App\Models\Aprendiz::class)<a href="{{ route('aprendices.index') }}" @class(['nav-current' => request()->routeIs('aprendices.*')])>Aprendices</a>@endcan
 @can('manage-users')<a href="{{ route('admin.users.index') }}">Usuarios</a>@endcan
 <span class="nav-user">Hola, {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})</span>
 <form method="POST" action="{{ route('logout') }}">
 @csrf
 <button class="nav-action" type="submit">Salir</button>
 </form>
 @endauth

 @guest
 <a href="{{ route('login') }}">Iniciar sesión</a>
 <a href="{{ route('register') }}">Registrarse</a>
 @endguest
 </div>
 </nav>

 <script>window.flashMessages = @json(['success' => session('ok') ?? session('status'), 'error' => session('error'), 'errors' => $errors->all()]);</script>

 <main class="page-shell">
 @hasSection('content')
	 @yield('content')
 @else
	 {{ $slot ?? '' }}
 @endif
 </main>
</body>
</html>
