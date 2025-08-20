<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\PackageDetails;

class Order extends Model
{
    use HasFactory;
    public function getProduct(){
        return $this->hasOne(\App\Models\Product::class, 'id','productId');
    }
    public function getPerPageDetails(){
        return $this->hasMany(\App\Models\PackageDetails::class, 'packageId','packageId');
    }

}

