<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view pages',
            'manage services',
            'manage criterias',
            'manage news',
            'contact support',
            'comment posts',
            'manage service types', // super admin
            'manage users', // for admin and super admin
            'manage roles', // for super admin
            'manage permissions', // for super admin
        ];// Create Super Admin role

        // Create permissions if they don't already exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create the super admin role
        $superAdmin = Role::firstOrCreate(['name' => 'super admin']);

        // Assign all permissions to super admin
        $superAdmin->syncPermissions(Permission::all());

        // Create Admin role
        $admin = Role::firstOrCreate(['name' => 'admin']);

        // Admin should have nearly the same permissions as Super Admin, but no manage users, roles, or permissions
        $adminPermissions = Permission::whereNotIn('name', [
            'manage users',
            'manage roles',
            'manage permissions'
        ])->get();

        $admin->syncPermissions($adminPermissions);

        // Create Editor role (Can manage services and criterias)
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editorPermissions = Permission::whereIn('name', [
            'manage services',
            'manage criterias'
        ])->get();

        $editor->syncPermissions($editorPermissions);

        // Create News Editor role (Can manage news)
        $newsEditor = Role::firstOrCreate(['name' => 'news editor']);
        $newsEditorPermissions = Permission::whereIn('name', [
            'manage news'
        ])->get();

        $newsEditor->syncPermissions($newsEditorPermissions);

        // Create Visitor role (Can visit pages, contact support, comment posts)
        $visitor = Role::firstOrCreate(['name' => 'visitor']);
        $visitorPermissions = Permission::whereIn('name', [
            'view pages',
            'contact support',
            'comment posts'
        ])->get();

        $visitor->syncPermissions($visitorPermissions);

        // Create a Super Admin User (for testing purposes)
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@comparek.sn',
            'password' => bcrypt('fat4oun3Moub11ne$'), // You can change this
        ]);

        // Assign Super Admin role to the user
        $user->assignRole('super admin');
    }
}
