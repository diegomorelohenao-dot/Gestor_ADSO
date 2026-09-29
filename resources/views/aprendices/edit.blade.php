@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
<div class="page-heading"><div><p class="eyebrow">Registro</p><h1>Editar aprendiz</h1></div></div>

@if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="glass-panel" action="{{ route('aprendices.update', $aprendiz) }}" method="POST">
    @csrf
    @method('PUT')
    @include('aprendices._form')
</form>

<p><a href="{{ route('aprendices.index') }}">Volver al listado</a></p>
@endsection
