<?php

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
        $user = new \App\User();
        $user->name = "Adriano Vianna";
        $user->email = "bonjou@gmail.com";
        $user->password = bcrypt('123456');
        $user->save();
    }
}
