<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Assemble extends Component
{
    public $productId;
    public $customer_sess;
	public $steps;
    public function render()
    {
        $data['customer_sess']  = Session::get('Customer');
        //dd($data['customer_sess']);
        return view('livewire.frontend.assemble')->with($data);
    }

    public function getProduct($productId)
    {

    }
}
