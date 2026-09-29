@extends('layouts.app')
@section('title', 'Editar usuario')
@section('content')<div class="page-heading"><div><p class="eyebrow">Administración</p><h1>Editar usuario</h1></div></div><form method="POST" action="{{ route('admin.users.update',$user) }}">@csrf @method('PUT') @include('admin.users._form')</form>@endsection
