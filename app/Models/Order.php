<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\PackageDetails;
use App\Traits\HasSignature;

class Order extends Model
{
    use HasFactory, HasSignature;
    public function getProduct(){
        return $this->hasOne(\App\Models\Product::class, 'id','productId');
    }
    public function getPerPageDetails(){
        return $this->hasMany(\App\Models\PackageDetails::class, 'packageId','packageId');
    }

    public function getCustomer(){
        return $this->belongsTo(\App\Models\Customer::class, 'customerId', 'id');
    }

}

