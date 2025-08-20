<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UsefulLinksModel extends Model
{
    public $name, $url, $status, $social_id;
    use HasFactory;
    protected $table ="useful_links";
    protected $guarded = [];
}
