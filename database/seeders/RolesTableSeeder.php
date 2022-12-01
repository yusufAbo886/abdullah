<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create([
            'name' => 'super_admin',
            'display_name' => 'super admin',
            'description' => 'responsibel for all users'
        ]);
        $hospital = Role::create([
            'name' => 'hospital',
            'display_name' => 'hospital',
            'description' => 'can add hospital post'
        ]);
        $doctor = Role::create([
            'name' => 'doctor',
            'display_name' => 'doctor',
            'description' => ' can add doctor post'
        ]);
        $client = Role::create([
            'name' => 'client',
            'display_name' => 'client',
            'description' => 'he can like posts and condact with doctor or hospital'
        ]);
    }
}
