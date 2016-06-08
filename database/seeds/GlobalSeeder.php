<?php

class GlobalSeeder
{
    public function run()
    {
        /*
         * USERS CREATION
         */
        $admin = User::create([
            'nickname' => 'admin',
            'birthyear' => 1999,
            'password' => bcrypt('admin'),
        ]);
        $expert = User::create([
            'name' => 'mod',
            'email' => 'mod@example.com',
            'password' => bcrypt('mod'),
        ]);
        $guest = User::create([
            'name' => 'guest',
            'email' => 'guest@example.com',
            'password' => bcrypt('guest'),
        ]);
    }
}