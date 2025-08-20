<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'role' => 'SuperAdmin',
            'password' => Hash::make('Admin')
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'Admin',
            'password' => Hash::make('Admin')
        ]);
    }
}
