<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Bruno',
            'last_name' => 'Neves dos Santos',
            'email' => 'bruno@brunoweblink.com',
            'phone_number1' => '(96) 99999-9999',
            'city_id' => 1,
            'password' => bcrypt('123456'),
        ]);
    }
}
