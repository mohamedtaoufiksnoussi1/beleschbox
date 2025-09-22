<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = [
        'surname',
        'insured_type',
        'firstName', 
        'lastName',
        'email',
        'password',
        'street',
        'houseNo',
        'zipcode',
        'city',
        'dob',
        'telephone',
        'insuranceNumber',
        'insuranceName',
        'healthInsuranceNo',
        'pflegegrad',
        'insurance_type',
        'caregiver_name',
        'caregiver_phone',
        'caregiver_email',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
