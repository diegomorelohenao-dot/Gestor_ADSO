@extends('layouts.app')
@section('title','Nuevo Aprendiz')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Registro</p><h1>Nuevo aprendiz</h1></div></div>
<form class="glass-panel" action="{{ route('aprendices.store') }}" method="POST">
 @csrf
 <div class="form-grid">
  <label>Nombre <input name="nombre" required></label>
  <label>Documento <input name="documento" required></label>
  <label>Correo <input type="email" name="correo" required></label>
  </div>
 <div class="form-actions"><button>Guardar</button><a class="button button-ghost" href="{{ route('aprendices.index') }}">Cancelar</a></div>
</form>
@endsection
