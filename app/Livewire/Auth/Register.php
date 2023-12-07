<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public array $form = [];

    public function register()
    {
        // Validate with Helper rules
        $this->validate(vRules(Register::class));

        // Encrypt Password, create User and assign Role
        $this->form['password'] = Hash::make($this->form['password']);
        $user = User::create($this->form);
        if ($this->form['role'] === 'admin') {
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
}
