<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$1eCwmdXT/2sMkLrx2ZKbje0sW/thMaUxu5ICzfyI3eIBpDqWfZHHu',
            'remember_token' => null,
            'created_at'     => '2019-05-19 02:37:09',
            'updated_at'     => '2019-05-19 02:37:09',
            'deleted_at'     => null,
            'approved'       => 1,
        ]];

        User::insert($users);
    }
}
