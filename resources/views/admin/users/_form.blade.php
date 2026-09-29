<div class="glass-panel">
<label for="name">Nombre</label><input id="name" name="name" value="{{ old('name',$user->name) }}" required>@error('name')<p>{{ $message }}</p>@enderror
<label for="email">Correo</label><input id="email" type="email" name="email" value="{{ old('email',$user->email) }}" required>@error('email')<p>{{ $message }}</p>@enderror
<label for="role">Rol</label><select id="role" name="role" required>@foreach(['admin'=>'Administrador','instructor'=>'Instructor','aprendiz'=>'Aprendiz'] as $value=>$label)<option value="{{ $value }}" @selected(old('role',$user->role)===$value)>{{ $label }}</option>@endforeach</select>@error('role')<p>{{ $message }}</p>@enderror
<label for="password">Contraseña {{ $user->exists ? '(dejar vacía para conservarla)' : '' }}</label><input id="password" type="password" name="password" {{ $user->exists ? '' : 'required' }} autocomplete="new-password">@error('password')<p>{{ $message }}</p>@enderror
<label for="password_confirmation">Confirmar contraseña</label><input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password">
<button class="button" type="submit">Guardar usuario</button> <a href="{{ route('admin.users.index') }}">Cancelar</a>
</div>
