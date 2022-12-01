<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
          'name' => 'yusuf',
          'email' => 'yosef.abo121@gmail.com',
          'password' => bcrypt('yy12345yy')
      ]);
      $user->attachRole('super_admin');
        $hospital = User::create([
            'name' => 'hospital',
            'email' => 'hospital@gmail.com',
            'password' => bcrypt('yy12345yy')
        ]);
        $hospital->attachRole('hospital');

        $doctor = User::create([
            'name' => 'hospital',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('yy12345yy')
        ]);
        $doctor->attachRole('doctor');

        $client = User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('yy12345yy')
        ]);
        $client->attachRole('client');
    }




}
