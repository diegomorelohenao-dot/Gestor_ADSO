@extends('layouts.app')
@section('title', 'Aprendices')
@section('content')
<div class="page-heading">
    <div><p class="eyebrow">Gestión académica</p><h1>Aprendices</h1></div>
    @can('create', App\Models\Aprendiz::class)<a class="button" href="{{ route('aprendices.create') }}">+ Nuevo aprendiz</a>@endcan
</div>
<form class="glass-panel" action="{{ route('aprendices.index') }}" method="GET">
    <label for="q">Buscar:</label>
    <input type="search" id="q" name="q" value="{{ $q ?? '' }}" placeholder="Nombre o documento">
    <button type="submit">Buscar</button>
    @if(filled($q ?? null))<a href="{{ route('aprendices.index') }}">Limpiar</a>@endif
</form>
@forelse ($aprendices as $aprendiz)
<div class="glass-card" style="margin-top: 1rem;">
    <strong>{{ $aprendiz->nombre }}</strong> <span>— Documento: {{ $aprendiz->documento }}</span><br>
    <small>Correo: {{ $aprendiz->correo }}</small><br>
    <small>Ficha: {{ $aprendiz->ficha_id ?? 'Sin ficha' }}</small><br>
    @can('update', $aprendiz)<a class="button button-ghost" href="{{ route('aprendices.edit', $aprendiz) }}">Editar</a>@endcan
    @can('delete', $aprendiz)
    <form action="{{ route('aprendices.destroy', $aprendiz) }}" method="POST" data-confirm>
        @csrf @method('DELETE')
        <button class="button-danger" type="submit">Eliminar</button>
    </form>
    @endcan
</div>
@empty
<div class="glass-panel"><p>No hay aprendices registrados.</p></div>
@endforelse
<div class="pagination">{{ $aprendices->links() }}</div>
@endsection
