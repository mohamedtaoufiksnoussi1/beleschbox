<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsefulLinksController extends Controller
{
   public function index(){
       return view('admin.usefulLink');
   }
}
