<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationCity;
use App\Models\Service;
use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 1
        ]);

        $role = Role::create(['name' => 'Admin']);

        $searchTerm='admin';
        $permissions = Permission::where('name', 'LIKE', "%{$searchTerm}%")->pluck('id', 'id')->all();


        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'Smps',
            'email' => 'smps@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 2
        ]);

        $role = Role::create(['name' => 'Workshop']);
        $searchTerm='workshop';
        $permissions = Permission::where('name', 'LIKE', "%{$searchTerm}%")->pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $workshop = new Workshop();
        $workshop->name = 'SMPS';
        $workshop->logo = 'logo.png';
        $workshop->address = "lhr";
        $workshop->contact_person = '234';
        $workshop->phone_no = '1234';
        $workshop->save();
        $user->workshops()->attach($workshop);
        $location = Location::create(['name' => 'East']);
        LocationCity::create(['location_id' => $location->id, 'name' => 'lahore']);
        $workshop->locations()->attach($location);
        $service=Service::create(['name'=>'Air Con']);
        $workshop->services()->attach($service);

    }
}
