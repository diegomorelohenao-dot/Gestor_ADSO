@extends('layouts.app')

@section('title', 'Editar Aprendiz')

@section('content')
<h1>Editar Aprendiz</h1>

@if ($errors->any())
    <div class="danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('aprendices.update', $aprendiz) }}" method="POST">
    @csrf
    @method('PUT')
    @include('aprendices._form')
</form>

<p><a href="{{ route('aprendices.index') }}">Volver al listado</a></p>
@endsection
