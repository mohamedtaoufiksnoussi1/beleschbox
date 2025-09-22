<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class TestCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'firstName' => 'Test',
            'lastName' => 'User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'street' => 'Test Street',
            'houseNo' => '123',
            'zipcode' => '12345',
            'city' => 'Test City',
            'dob' => '1990-01-01',
            'telephone' => '123456789',
            'insuranceNumber' => '1234567890',
            'insuranceName' => 'Test Insurance',
            'healthInsuranceNo' => '0987654321',
            'status' => '1'
        ]);
    }
}
