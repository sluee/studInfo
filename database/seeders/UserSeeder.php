<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'name' => 'Bruce Unabia',
                'email'=> 'bruceunabia2000@gmail.com',
                'password'=>'password123',
                'role'=>'admin'
            ],
            [
                'name' => 'Eunizel Gabas',
                'email'=> 'eunizelgabas06@gmail.com',
                'password'=>'password123',
                'role'=>'normal'
            ],
            [
                'name' => 'Eula Gabas',
                'email'=> 'gabaseula@gmail.com',
                'password'=>'password123',
                'role'=>'editor'
            ],

        ];

        foreach($users as $user){
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            $created_user->assignRole($user['role']);

        }
    }
}
