@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
<div class="page-heading"><div><p class="eyebrow">Administración</p><h1>Usuarios</h1></div><a class="button" href="{{ route('admin.users.create') }}">+ Nuevo usuario</a></div>
<form class="glass-panel" method="GET" action="{{ route('admin.users.index') }}">
<label for="q">Buscar</label><input id="q" name="q" value="{{ $search }}" placeholder="Nombre o correo">
<label for="role">Rol</label><select id="role" name="role"><option value="">Todos</option>@foreach(['admin'=>'Administrador','instructor'=>'Instructor','aprendiz'=>'Aprendiz'] as $value=>$label)<option value="{{ $value }}" @selected($role===$value)>{{ $label }}</option>@endforeach</select>
<button type="submit">Filtrar</button><a href="{{ route('admin.users.index') }}">Limpiar</a></form>
@forelse($users as $user)<div class="glass-card" style="margin-top:1rem"><strong>{{ $user->name }}</strong> — {{ $user->email }} <span>{{ ucfirst($user->role) }}</span>
<a class="button button-ghost" href="{{ route('admin.users.edit',$user) }}">Editar</a>
@if(!auth()->user()->is($user))<form method="POST" action="{{ route('admin.users.destroy',$user) }}" data-confirm>@csrf @method('DELETE')<button class="button-danger" type="submit">Eliminar</button></form>@else<small>Tu cuenta no se puede eliminar desde esta pantalla.</small>@endif</div>
@empty<div class="glass-panel">No hay usuarios que coincidan con el filtro.</div>@endforelse
<div class="pagination">{{ $users->links() }}</div>
@endsection
