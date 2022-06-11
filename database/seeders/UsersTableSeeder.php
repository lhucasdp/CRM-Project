<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make('admin'),
                'remember_token'=> Str::random(1),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
