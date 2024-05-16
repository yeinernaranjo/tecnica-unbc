<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Register extends Component
{
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $password;
    public $confirmPassword;

    public function register()
{
    $validatedData = $this->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
        'confirmPassword' => 'required|string|same:password',
    ], [
        'email.unique' => 'El correo electrónico ya está en uso.',
        'confirmPassword.same' => 'Las contraseñas no coinciden.',
    ]);

    User::create([
        'name' => $validatedData['name'],
        'lastname' => $validatedData['lastname'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'status' => 1,
    ]);

    return redirect()->to('/login');
}


    public function render()
    {
        return view('livewire.register')->layout('layouts.app');
    }
}
