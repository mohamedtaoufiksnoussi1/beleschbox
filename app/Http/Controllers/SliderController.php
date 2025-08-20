<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SliderController extends Controller
{
    public function index(Request $request){
        return view('admin.slider');
    }

    public function add(Request $request)
    {

    }
}
