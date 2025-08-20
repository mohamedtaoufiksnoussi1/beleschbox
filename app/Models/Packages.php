<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackageDetails;

class Packages extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function get_packageDetails(){
        return $this->hasMany(PackageDetails::class,'packageId');
    }

    public function getProductDetails()
    {
        return $this->hasOne(\App\Models\Product::class, 'id');
    }
}
