<?php

namespace Tests\Feature;

use App\Models\Aprendiz;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RoleDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_each_role_sees_the_dashboard_and_apprentice_data(): void
    {
        Aprendiz::factory()->create([
            'nombre' => 'Aprendiz de prueba',
            'correo' => 'aprendiz@example.com',
            'documento' => '1000000001',
        ]);

        foreach (['admin', 'instructor', 'aprendiz'] as $role) {
            /** @var User $user */
            $user = User::factory()->createOne(['role' => $role]);

            $this->actingAs($user)
                ->get(route('dashboard'))
                ->assertOk()
                ->assertSee('Aprendiz de prueba')
                ->assertSee(route('aprendices.index'));
        }
    }

    public function test_apprentice_can_consult_but_cannot_change_apprentice_records(): void
    {
        /** @var User $user */
        $user = User::factory()->createOne(['role' => 'aprendiz']);
        $aprendiz = Aprendiz::factory()->create();

        $this->actingAs($user)
            ->get(route('aprendices.index'))
            ->assertOk()
            ->assertSee($aprendiz->nombre)
            ->assertDontSee('Nuevo aprendiz');

        $this->get(route('aprendices.create'))->assertForbidden();
        $this->get(route('aprendices.edit', $aprendiz))->assertForbidden();
        $this->put(route('aprendices.update', $aprendiz), [])->assertForbidden();
        $this->delete(route('aprendices.destroy', $aprendiz))->assertForbidden();
    }

    public function test_instructor_can_manage_apprentices_but_not_user_accounts(): void
    {
        /** @var User $instructor */
        $instructor = User::factory()->createOne(['role' => 'instructor']);

        $this->actingAs($instructor)
            ->get(route('aprendices.create'))
            ->assertOk();

        $this->post(route('aprendices.store'), [
            'nombre' => 'Aprendiz instructor',
            'documento' => '2000000001',
            'correo' => 'instructor.aprendiz@example.com',
            'ficha_id' => 123456,
        ])->assertRedirect(route('aprendices.index'));

        $aprendiz = Aprendiz::query()->where('documento', '2000000001')->firstOrFail();
        $this->put(route('aprendices.update', $aprendiz), [
            'nombre' => 'Aprendiz actualizado',
            'documento' => $aprendiz->documento,
            'correo' => $aprendiz->correo,
            'ficha_id' => 123456,
        ])->assertRedirect(route('aprendices.index'));

        $this->delete(route('aprendices.destroy', $aprendiz))
            ->assertRedirect(route('aprendices.index'));
        $this->assertDatabaseMissing('aprendices', ['id' => $aprendiz->id]);

        $this->get(route('admin.users.index'))->assertForbidden();
    }

    public function test_admin_can_manage_users_but_cannot_delete_their_own_account(): void
    {
        /** @var User $admin */
        $admin = User::factory()->createOne(['role' => 'admin']);

        $this->actingAs($admin)->get(route('admin.users.index'))->assertOk();

        $this->from(route('admin.users.index'))
            ->delete(route('admin.users.destroy', $admin))
            ->assertRedirect(route('admin.users.index'))
            ->assertSessionHas('error');

        $this->assertNotNull($admin->fresh());
    }

    public function test_admin_can_filter_users_and_update_their_roles_and_passwords(): void
    {
        /** @var User $admin */
        $admin = User::factory()->createOne(['role' => 'admin']);
        $this->actingAs($admin);

        $this->post(route('admin.users.store'), [
            'name' => 'Cuenta Instructor',
            'email' => 'instructor.gestor@example.com',
            'role' => 'instructor',
            'password' => 'password-123',
            'password_confirmation' => 'password-123',
        ])->assertRedirect(route('admin.users.index'));

        $user = User::query()->where('email', 'instructor.gestor@example.com')->firstOrFail();
        $this->put(route('admin.users.update', $user), [
            'name' => 'Cuenta Aprendiz',
            'email' => $user->email,
            'role' => 'aprendiz',
            'password' => 'password-456',
            'password_confirmation' => 'password-456',
        ])->assertRedirect(route('admin.users.index'));

        $this->get(route('admin.users.index', ['q' => 'Cuenta Aprendiz', 'role' => 'aprendiz']))
            ->assertOk()
            ->assertSee('Cuenta Aprendiz')
            ->assertDontSee('Cuenta Instructor');

        $this->assertSame('aprendiz', $user->refresh()->role);
        $this->assertTrue(Hash::check('password-456', $user->password));
    }
}
