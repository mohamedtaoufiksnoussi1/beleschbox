<?php

namespace App\Http\Livewire\Frontend\Includes;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $data['title'] = 'Belesch-box';
        return view('livewire.frontend.includes.header', $data);
    }
}

