<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    private const ROLES = ['admin', 'instructor', 'aprendiz'];

    public function index(Request $request): View
    {
        $this->authorize('manage-users');
        $search = trim((string) $request->query('q', ''));
        $role = $request->query('role');

        $users = User::query()
            ->when($search !== '', fn ($query) => $query->where(fn ($q) => $q->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")))
            ->when(in_array($role, self::ROLES, true), fn ($query) => $query->where('role', $role))
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'search', 'role'));
    }

    public function create(): View
    {
        $this->authorize('manage-users');

        return view('admin.users.create', ['user' => new User()]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->authorize('manage-users');
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return to_route('admin.users.index')->with('ok', 'Usuario creado correctamente.');
    }

    public function edit(User $user): View
    {
        $this->authorize('manage-users');

        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $this->authorize('manage-users');
        $data = $request->validated();
        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        return to_route('admin.users.index')->with('ok', 'Usuario actualizado correctamente.');
    }

    public function destroy(Request $request, User $user): RedirectResponse
    {
        $this->authorize('manage-users');
        if ($request->user()->is($user)) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta desde la administración.');
        }
        $user->delete();

        return to_route('admin.users.index')->with('ok', 'Usuario eliminado correctamente.');
    }
}
