<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin', "state" => 1]);
        $user = Role::create(['name' => 'user', "state" => 1]);

        $permission = Permission::create(['name' => '/users', 'description' => 'Entrar al listado de usuarios'])->assignRole($admin);
        $permission = Permission::create(['name' => '/users/create', 'description' => 'Crear usuarios'])->assignRole($admin);
        $permission = Permission::create(['name' => '/users/edit', 'description' => 'Editar usuarios'])->syncRoles([$admin, $user]);
        $permission = Permission::create(['name' => '/users/updateState', 'description' => 'Actualizar el estado de un usuario'])->assignRole($admin);

        $permission = Permission::create(['name' => '/tableros', 'description' => 'Entrar al listado de tableros'])->assignRole($admin);
        $permission = Permission::create(['name' => '/tableros/create', 'description' => 'Crear tableros'])->assignRole($admin);
        $permission = Permission::create(['name' => '/tableros/edit', 'description' => 'Editar tableros'])->assignRole($admin);
        $permission = Permission::create(['name' => '/tableros/updateState', 'description' => 'Actualizar el estado de un tablero'])->assignRole($admin);

        $permission = Permission::create(['name' => '/roles', 'description' => 'Entrar al listado de roles'])->assignRole($admin);
        $permission = Permission::create(['name' => '/roles/create', 'description' => 'Entrar al formulario de crear rol'])->assignRole($admin);
        $permission = Permission::create(['name' => '/roles/store', 'description' => 'Crear roles'])->assignRole($admin);
        $permission = Permission::create(['name' => '/roles/edit', 'description' => 'Entrar al formulario de editar rol'])->assignRole($admin);
        $permission = Permission::create(['name' => '/roles/update', 'description' => 'Actualizar informacion de un rol'])->assignRole($admin);
        $permission = Permission::create(['name' => '/roles/updateState', 'description' => 'Actualizar el estado de un rol'])->assignRole($admin);

        $permission = Permission::create(['name' => '/dashboard', 'description' => 'Entrar al dashboard'])->syncRoles([$admin, $user]);
    }
}
