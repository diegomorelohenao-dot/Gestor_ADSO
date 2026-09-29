<?php

namespace App\Policies;

use App\Models\Aprendiz;
use App\Models\User;

class AprendizPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'instructor', 'aprendiz'], true);
    }

    public function view(User $user, Aprendiz $aprendiz): bool
    {
        return $this->viewAny($user);
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'instructor'], true);
    }

    public function update(User $user, Aprendiz $aprendiz): bool
    {
        return in_array($user->role, ['admin', 'instructor'], true);
    }

    public function delete(User $user, Aprendiz $aprendiz): bool
    {
        return in_array($user->role, ['admin', 'instructor'], true);
    }
}
