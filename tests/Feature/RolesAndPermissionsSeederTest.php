<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RolesAndPermissionsSeederTest extends TestCase
{
    use RefreshDatabase; // Ensures that the database is reset after each test

    /** @test */
    public function it_creates_permissions()
    {
        // Run the seeder
        Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        // Check if all permissions are created
        $permissions = [
            'view pages',
            'manage services',
            'manage criterias',
            'manage news',
            'contact support',
            'comment posts',
            'manage users',
            'manage roles',
            'manage permissions',
        ];

        foreach ($permissions as $permission) {
            $this->assertDatabaseHas('permissions', ['name' => $permission]);
        }
    }

    /** @test */
    public function it_creates_roles()
    {
        // Run the seeder
        Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        // Check if all roles are created
        $roles = ['super admin', 'admin', 'editor', 'news editor', 'visitor'];

        foreach ($roles as $role) {
            $this->assertDatabaseHas('roles', ['name' => $role]);
        }
    }

    /** @test */
    public function super_admin_has_all_permissions()
    {
        // Run the seeder
        Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        // Get the Super Admin role
        $superAdminRole = Role::findByName('super admin');

        // Assert that the Super Admin role has all the permissions
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $this->assertTrue($superAdminRole->hasPermissionTo($permission));
        }
    }

    /** @test */
    public function admin_does_not_have_manage_users_roles_permissions_permissions()
    {
        // Run the seeder
        Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        // Get the Admin role
        $adminRole = Role::findByName('admin');

        // Permissions that should NOT be assigned to the admin
        $excludedPermissions = [
            'manage users',
            'manage roles',
            'manage permissions',
        ];

        foreach ($excludedPermissions as $permission) {
            $this->assertFalse($adminRole->hasPermissionTo($permission));
        }

        // Check if Admin role has other permissions
        $includedPermissions = [
            'view pages',
            'manage services',
            'manage criterias',
            'manage news',
            'contact support',
            'comment posts',
        ];

        foreach ($includedPermissions as $permission) {
            $this->assertTrue($adminRole->hasPermissionTo($permission));
        }
    }

    /** @test */
    public function super_admin_user_is_created_and_assigned_role()
    {
        // Run the seeder
        Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder']);

        // Check if the super admin user exists
        $user = User::where('email', 'superadmin@comparek.sn')->first();

        $this->assertNotNull($user);
        $this->assertTrue($user->hasRole('super admin'));
    }
}
