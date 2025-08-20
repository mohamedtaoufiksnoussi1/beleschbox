<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class PackageDetails extends Model
{
    use HasFactory;
    protected $table = "package_details";
    protected $guarded = [];

    public function getProductDetails()
    {
        return $this->hasOne(\App\Models\Product::class, 'id','productId');
    }

    public function getproduct(){
        return $this->hasMany(\App\Models\Product::class, 'productId','id');
    }
}
