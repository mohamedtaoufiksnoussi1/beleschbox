<?php

namespace App\Http\Livewire\Frontend;


use Livewire\Component;
use Session;
use Hash;
use Exception;
use App\Models\Customer;

class LoginComponent extends Component
{
    public $email;
    public $password;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.login-component');
    }

    public function submit()
    {
        try {
           $customer = Customer::where('email',$this->email)->where('view_password',$this->password);
           if ($customer->get()->count()==1){
               \Session::put('Customer', $customer->first());
               //return redirect('customer/profile');
               return redirect('/');
           }
            session()->flash('message', 'You have entered invalid Email or Password');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }
}
