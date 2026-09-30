<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $this->authorize('viewAny', Aprendiz::class);
        $user = $request->user();
        $roleLabels = [
            'admin' => 'Administración',
            'instructor' => 'Instructor',
            'aprendiz' => 'Aprendiz',
        ];

        return view('dashboard', [
            'roleLabel' => $roleLabels[$user->role] ?? 'Aprendiz',
            'aprendicesCount' => Aprendiz::count(),
            'fichasCount' => Aprendiz::query()->whereNotNull('ficha_id')->distinct()->count('ficha_id'),
            'aprendices' => Aprendiz::query()->latest('id')->limit(6)->get(),
            'userCounts' => $user->isAdmin()
                ? User::query()->selectRaw('role, COUNT(*) as total')->groupBy('role')->pluck('total', 'role')
                : collect(),
        ]);
    }
}
