<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Packages;
use App\Models\Customer;
Use App\Models\Order;

class Dashboard extends Component
{
    public $countAllProduct, $countAllPackages, $countAllUsers, $countAllOrders;

    public function render()
    {
        $data['title'] = 'Admin Dashboard';
        return view('livewire.admin.dashboard', $data);
    }

    public function mount()
    {
        $this->countAllProduct = Product::where('status','1')->get();
        $this->countAllPackages = Packages::where('status','1')->get();
        $this->countAllUsers = Customer::where('status','1')->get();
        $this->countAllOrders = Order::all()->groupBy('orderId','ASC')->toBase();
    }

}
