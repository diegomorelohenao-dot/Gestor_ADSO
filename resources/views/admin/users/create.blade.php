@extends('layouts.app')
@section('title', 'Crear usuario')
@section('content')<div class="page-heading"><div><p class="eyebrow">Administración</p><h1>Crear usuario</h1></div></div><form method="POST" action="{{ route('admin.users.store') }}">@csrf @include('admin.users._form')</form>@endsection
