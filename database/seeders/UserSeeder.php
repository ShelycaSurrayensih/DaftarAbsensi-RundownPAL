<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('asdw1234'),

            ],
        ];
        User::insert($users);
    }
}
