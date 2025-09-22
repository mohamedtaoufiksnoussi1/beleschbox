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
            \Log::info('=== TENTATIVE DE CONNEXION ADMIN ===');
            \Log::info('Email: ' . $this->username);
            \Log::info('Password: ' . $this->password);
            
            $credentials = ['email' => $this->username, 'password' => $this->password];
            
            // Vérifier si l'utilisateur existe
            $user = User::where('email', $this->username)->first();
            if ($user) {
                \Log::info('Utilisateur trouvé: ' . $user->name);
                \Log::info('Rôle: ' . $user->role);
            } else {
                \Log::info('❌ Utilisateur non trouvé');
            }
            
            if (Auth::attempt($credentials)) {
                \Log::info('✅ Connexion réussie');
                session()->flash('success', 'You have successfully logged in');
                return redirect('admin/dashboard');
            }
            
            \Log::info('❌ Échec de la connexion');
            session()->flash('message', 'You have entered invalid credentials');
            return redirect()->back();
        } catch (\Exception $e) {
            \Log::error('Erreur de connexion: ' . $e->getMessage());
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }


}
