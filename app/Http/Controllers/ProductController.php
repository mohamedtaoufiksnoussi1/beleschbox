<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products');
    }

    public function productSequence(Request $request){
        $team = explode(',',$request->position);
        $i=1;
        foreach ($team as $k=>$v){
            Product::where('id',$v)->update(['rank'=>$i]);
            $i++;
        }
    }
}
