<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#06141B">
    <title>Gestor ADSO | Control académico</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="landing-page">
    <header class="landing-nav">
        <a class="brand" href="{{ url('/') }}"><span class="brand-mark">A</span> Gestor ADSO</a>
        <nav aria-label="Acceso">
            @auth
                <a class="button button-ghost" href="{{ route('dashboard') }}">Ir al panel</a>
            @else
                <a class="landing-login" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="button" href="{{ route('register') }}">Crear cuenta <span aria-hidden="true">→</span></a>
            @endauth
        </nav>
    </header>

    <main class="landing-main">
        <section class="landing-copy">
            <p class="eyebrow"><span class="status-dot"></span> Plataforma de gestión académica</p>
            <h1>El progreso de cada aprendiz,<br><span>en un solo lugar.</span></h1>
            <p class="landing-description">Organiza aprendices y fichas con una vista clara de la información que tu equipo necesita cada día.</p>
            <div class="landing-actions">
                @guest
                    <a class="button" href="{{ route('register') }}">Empezar ahora <span aria-hidden="true">→</span></a>
                    <a class="button button-ghost" href="{{ route('login') }}">Ya tengo una cuenta</a>
                @else
                    <a class="button" href="{{ route('dashboard') }}">Abrir mi panel <span aria-hidden="true">→</span></a>
                @endguest
            </div>
            <p class="landing-note">Información organizada. Seguimiento más sencillo.</p>
        </section>

        <section class="workspace-preview" aria-label="Vista previa del panel de aprendices">
            <div class="preview-topbar">
                <div class="preview-brand"><span class="preview-mark">A</span><span>ADSO <small>/ PANEL</small></span></div>
                <span class="preview-live"><i></i> ACTIVO</span>
            </div>
            <div class="preview-content">
                <div class="preview-heading"><div><p class="eyebrow">RESUMEN</p><h2>Aprendices</h2></div><span class="preview-period">GESTIÓN</span></div>
                <div class="preview-metrics">
                    <div><span>REGISTROS</span><strong>Aprendices</strong><small>Consulta y actualiza perfiles</small></div>
                    <div><span>ORGANIZACIÓN</span><strong>Fichas</strong><small>Información a mano</small></div>
                </div>
                <div class="preview-list-head"><span>ACTIVIDAD RECIENTE</span><span>ESTADO</span></div>
                <div class="preview-row"><span class="preview-avatar">AP</span><span class="preview-person"><strong>Perfil de aprendiz</strong><small>Datos personales y de contacto</small></span><span class="preview-tag">LISTO</span></div>
                <div class="preview-row"><span class="preview-avatar avatar-alt">FI</span><span class="preview-person"><strong>Ficha de formación</strong><small>Consulta de asignación</small></span><span class="preview-tag">ACTIVO</span></div>
            </div>
            <div class="preview-footer"><span>GESTOR ADSO</span><span>CONTROL ACADÉMICO</span></div>
        </section>
    </main>

    <footer class="landing-footer"><span>Gestor ADSO</span><span>Una gestión más clara para tu formación.</span></footer>
</body>
</html>
