@extends('layouts.app')
@section('title', 'Panel de ' . $roleLabel)
@section('content')
<div class="page-heading dashboard-heading">
    <div>
        <p class="eyebrow">Gestión académica</p>
        <h1>Panel de {{ $roleLabel }}</h1>
    </div>
</div>

<nav class="dashboard-actions" aria-label="Acciones del panel">
    <a class="button" href="{{ route('aprendices.index') }}">Ver aprendices</a>
    @can('create', App\Models\Aprendiz::class)
        <a class="button button-ghost" href="{{ route('aprendices.create') }}">Nuevo aprendiz</a>
    @endcan
    @can('manage-users')
        <a class="button button-ghost" href="{{ route('admin.users.index') }}">Administrar usuarios</a>
    @endcan
</nav>

<section class="dashboard-metrics" aria-label="Resumen">
    <div class="dashboard-metric">
        <span>APRENDICES REGISTRADOS</span>
        <strong>{{ $aprendicesCount }}</strong>
    </div>
    <div class="dashboard-metric">
        <span>FICHAS ASIGNADAS</span>
        <strong>{{ $fichasCount }}</strong>
    </div>
    @if(auth()->user()->isAdmin())
        <div class="dashboard-metric">
            <span>CUENTAS ADMINISTRADORAS</span>
            <strong>{{ $userCounts->get('admin', 0) }}</strong>
        </div>
        <div class="dashboard-metric">
            <span>CUENTAS DE INSTRUCTOR</span>
            <strong>{{ $userCounts->get('instructor', 0) }}</strong>
        </div>
        <div class="dashboard-metric">
            <span>CUENTAS DE APRENDIZ</span>
            <strong>{{ $userCounts->get('aprendiz', 0) }}</strong>
        </div>
    @endif
</section>

<section class="glass-panel dashboard-records" aria-labelledby="recent-aprendices-heading">
    <div class="dashboard-section-heading">
        <div>
            <p class="eyebrow">Directorio</p>
            <h2 id="recent-aprendices-heading">Aprendices recientes</h2>
        </div>
        <a class="button button-ghost" href="{{ route('aprendices.index') }}">Listado completo</a>
    </div>
    @forelse($aprendices as $aprendiz)
        <article class="dashboard-record">
            <div>
                <strong>{{ $aprendiz->nombre }}</strong>
                <span>{{ $aprendiz->correo }}</span>
            </div>
            <small>Ficha {{ $aprendiz->ficha_id ?? 'Sin asignar' }}</small>
        </article>
    @empty
        <p class="dashboard-empty">Todavía no hay aprendices registrados.</p>
    @endforelse
</section>
@endsection

