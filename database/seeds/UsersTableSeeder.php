<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'zakaryaaffani35@gmail.com')->first();
        // if(!$user){
        //     User::create([
        //         'name' => 'Zakarya Affani',
        //         'email' => 'zakaryaaffani35@gmail.com',
        //         'role' => 'admin',
        //         'password' => Hash::make('password')
        //     ]);
        // }

        $users = [
            [
                'name' => 'Zakarya Affani',
                'email' => 'zakaryaaffani35@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'writer1',
                'email' => 'writer1@gmail.com',
                'role' => 'writer',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'writer2',
                'email' => 'writer2@gmail.com',
                'role' => 'writer',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Simul Late',
                'email' => 'simul@late.com',
                'role' => 'writer',
                'password' => Hash::make('password')
            ]
        ];

        User::insert($users);
    }
}
