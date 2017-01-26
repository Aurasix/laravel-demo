<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #Creating admin user
        User::create([
            'username' => 'admin',
            'firstName' => 'Admin',
            'lastName' => 'Manager',
            'email' => 'admin@impulse.com',
            'activated' => true,
            'activationCode' => bcrypt(str_random(10)),
            'password' => 'password',
            'role' => User::ROLE_ADMIN
        ]);
    }
}
