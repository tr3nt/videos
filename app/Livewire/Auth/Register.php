<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;
use Illuminate\Contracts\View\View;

class Register extends Component
{
    public array $form = [];
    public string $role = 'visitor';
    public string $title = 'Registro';
    public string $btnTitle = 'Crear Usuario';

    public function execute()
    {
        // Validate with Helper rules
        $this->validate(vRules(Register::class));

        // Encrypt Password, create User and assign Role
        $this->form['password'] = Hash::make($this->form['password']);
        $user = User::create($this->form);
        if ($this->role === 'admin') {
            $user->assignRole('admin');
        }
        // Send a Flash Message and redirect to Login
        session()->flash('message', 'Usuario creado correctamente');
        return redirect(route('login'));
    }

    // Helper Validator messages in spanish
    public function messages() : array
    {
        return vMessages(Register::class);
    }

    public function render() : View
    {
        return view('livewire/auth/form');
    }
}
