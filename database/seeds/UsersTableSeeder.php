<?php

use CodeShopping\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 1)
            ->create([
                'email'=> 'admin@user.com'
            ])->each(function ($user){
                $user->profile->phone_number = '+16505551234';
                $user->profile->save();
            });

        factory(User::class, 1)
            ->create([
                'email'=> 'customer@user.com',
                'role' => User::ROLE_CUSTOMER
            ]);

        factory(User::class, 50)
            ->create([
                'role' => User::ROLE_CUSTOMER
            ]);
    }
}
