<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Festival;
use App\Models\User;

class StartSeeder extends Seeder
{
    use HasRoles;
    private function userSeeder($name, $email, $password)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $user->assignRole('User');
    }

    private function adminSeeder($name, $email, $password)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $user->assignRole('Admin');
    }

    private function festivalSeeder($name)
    {
        Festival::create([
            'name' => $name,
         ]);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        $this->festivalSeeder('Start Festival');
        $this->adminSeeder('admin','ceelenders@hotmail.com','Wachtwoord123!');
        $this->userSeeder('user','user@hotmail.com','Wachtwoord123!');
    }
}
