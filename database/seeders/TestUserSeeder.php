<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create(
            [
                'name' => 'test user',
                'email' => 'test@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('test1234')
            ]
        );

        return $user;
    }
}
