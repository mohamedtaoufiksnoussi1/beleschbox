<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sliders;
use App\Models\Setting;
use App\Models\About;

class Home extends Component
{
    public function render()
    {
        $data = [
            'products' => Product::where('status', '1')->orderBy('rank', 'ASC')->limit(6)->get(),
            'sliders' => Sliders::where('status', '1')->orderBy('id', 'ASC')->get(),
            'settings' => Setting::first(),
            'about' => About::first(),
        ];
        
        return view('livewire.frontend.home', $data);
    }
}
