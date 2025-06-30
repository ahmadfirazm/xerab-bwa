<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage about',
            'manage appointments',
            'manage hero section',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                [
                    'name' => $permission
                ]
            );
        }

        $designManagerRole = Role::firstOrCreate(
            [
                'name' => 'design_manager'
                
            ]
        );

        $designManagerPermissions = [
            
            'manage products',
            'manage principles',
            'manage testimonials'
            
        ];

        $designManagerRole->syncPermissions($designManagerPermissions);

        $superAdminRole = Role::firstOrCreate(
            [
                'name' => 'super_admin',
                
            ]
        );

        $user = User::create([
            'name' => 'xerab',
            'email' => 'supeer@admin.com',
            'password' => bcrypt('123123'),
            
        ]);

        $user->assignRole($superAdminRole);


    }
}
