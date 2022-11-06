<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin-dashboard',
            'admin-users-read',
            'admin-users-write',
            'admin-users-create',
            'admin-roles-read',
            'admin-roles-write',
            'admin-roles-create',
            'admin-services-read',
            'admin-services-write',
            'admin-services-create',
            'admin-workshops-read',
            'admin-workshops-write',
            'admin-workshops-create',
            'admin-locations-read',
            'admin-locations-write',
            'admin-locations-create',
            'admin-products-read',
            'admin-products-write',
            'admin-products-create',
            'admin-stocks-read',
            'admin-stocks-write',
            'admin-stocks-create',
            'admin-permissions',


            'workshop-dashboard',
            'workshop-users-read',
            'workshop-users-write',
            'workshop-users-create',
            'workshop-roles-read',
            'workshop-roles-write',
            'workshop-roles-create',
            'workshop-services-read',
            'workshop-services-write',
            'workshop-services-create',
            'workshop-products-read',
            'workshop-products-write',
            'workshop-products-create',

            'workshop-permissions',
        ];
        Permission::truncate();
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
