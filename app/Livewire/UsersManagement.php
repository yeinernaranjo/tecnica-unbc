<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UsersManagement extends Component
{
    public $users;
    public $name;
    public $lastname;
    public $phone;
    public $email;
    public $password;
    public $status;
    public $user_id;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users-management')->layout("layouts.app");
    }

    public function createUser()
    {
        User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => $this->password,
            'status' => 1
        ]);

        session()->flash('success', 'Usuario creado correctamente.');

        $this->resetFields();
        $this->mount();
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->user_id = $user->id;
    }

    public function statusChange($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'status' => $user->status ? 0 : 1
        ]);
        $this->mount();
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->user_id);

        $data = [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            // Actualizar la contraseña solo si se envió
            $data['password'] = bcrypt($this->password);
        }

        $user->update($data);

        session()->flash('success', 'Usuario actualizado correctamente.');

        $this->resetFields();
        $this->mount();
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', 'Usuario eliminado correctamente.');
        $this->mount();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
        $this->password = '';
        $this->user_id = null;
    }
}
