<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class Login extends Component
{
    public $email;
    public $password;

    public function attemptLogin() {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $user = User::where('email', $this->email)->first();

        if ($user && $user->status == 0) {
            session()->flash('error', 'Tu usuario está inactivo');
        }
        else if ($user && $user-> status == 1 && Auth::attempt($credentials)) {
            return redirect()->to('/users');
        } else {
            session()->flash('error', 'Correo electrónico o contraseña incorrectos.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
