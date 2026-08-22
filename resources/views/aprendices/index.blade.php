@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
<h1>Aprendices</h1>
<p><a href="{{ route('aprendices.create') }}">+ Nuevo aprendiz</a></p>

<form action="{{ route('aprendices.index') }}" method="GET">
    <label for="q">Buscar:</label>
    <input type="search" id="q" name="q" value="{{ $q ?? '' }}" placeholder="Nombre o documento">
    <button type="submit">Buscar</button>
    @if(filled($q ?? null))
        <a href="{{ route('aprendices.index') }}">Limpiar</a>
    @endif
</form>

@forelse ($aprendices as $aprendiz)
<div>
    <strong>{{ $aprendiz->nombre }}</strong>
    <span> - Documento: {{ $aprendiz->documento }}</span>
    <br>
    <small>Correo: {{ $aprendiz->correo }}</small>
    <br>
    <small>Ficha: {{ $aprendiz->ficha_id ?? 'Sin ficha' }}</small>
    <br>
    <a href="{{ route('aprendices.edit', $aprendiz) }}">Editar</a>
    <form action="{{ route('aprendices.destroy', $aprendiz) }}"
        method="POST"
        onsubmit="return confirm('¿Eliminar este aprendiz?')">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
@empty
<p>No hay aprendices registrados.</p>
@endforelse

<div class="pagination">
    {{ $aprendices->links() }}
</div>
@endsection
