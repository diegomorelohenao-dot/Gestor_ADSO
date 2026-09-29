<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        // La contraseña se define en el .env local y nunca se publica en Git.
        $password = env('GESTOR_DEMO_PASSWORD');
        if (app()->environment('production') || blank($password)) {
            return;
        }

        foreach ([
            ['Administrador de prueba', 'admin@gestor-adso.test', 'admin'],
            ['Instructor de prueba', 'instructor@gestor-adso.test', 'instructor'],
            ['Aprendiz de prueba', 'aprendiz@gestor-adso.test', 'aprendiz'],
        ] as [$name, $email, $role]) {
            User::updateOrCreate(['email' => $email], [
                'name' => $name,
                'role' => $role,
                'password' => $password,
            ]);
        }
    }
}
