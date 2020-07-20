<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name' => 'Wyatt Johnson',
            'avatar' => 'users/July2020/Myuser.jpg',
            'email' => 'test@test.com',
            'password' => '$2y$10$CL4Vdn.Ex/X7xDDzOpDaEOeSIpBAkIyiVbE4W37NYXNEvArFWC2US' //123456
        ]);
        $user->save();
    }
}
