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
        $validatedData = $this->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Por favor, introduce una dirección de correo electrónico válida.',
            'password.required' => 'El campo de contraseña es obligatorio.',
        ]);

        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

        $user = User::where('email', $this->email)->first();

        if ($user && $user->status == 0) {
            $this->addError('error', 'Tu usuario está inactivo');
        }
        else if ($user && $user->status == 1 && Auth::attempt($credentials)) {
            return redirect()->to('/users');
        } else {
            $this->addError('email', 'Correo electrónico o contraseña incorrectos.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
