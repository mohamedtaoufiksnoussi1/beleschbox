<?php

namespace App\Http\Livewire\Admin\Includes;

use Livewire\Component;

class Header extends Component
{
    public $message;

    function mount(){
        $this->message = "hello mount data";
    }

    public function render()
    {
        return view('livewire.admin.includes.header');
    }
}
