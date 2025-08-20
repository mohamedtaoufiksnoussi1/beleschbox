<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Exception;

class Login extends Component
{
    public $username;
    public $password;

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, [
            'username' => 'required | min:5',
            'password' => 'required'
        ]);
    }

    public function render()
    {
        $data['title'] = env('APP_NAME') . " | Login";
        return view('livewire.admin.login', $data);
    }

    public function submit()
    {
        try {
            $credentials = ['email' => $this->username, 'password' => $this->password];
            if (Auth::attempt($credentials)) {
                session()->flash('success', 'You have successfully logged in');
                return redirect('admin/dashboard');
            }
            session()->flash('message', 'You have entered invalid credentials');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }


}
