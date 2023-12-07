<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public array $form = [];
    public string $title = 'Ingreso';
    public string $btnTitle = 'Ingresar';

    public function execute()
    {
        // Validate with Helper rules
        $this->validate(vRules(Login::class));

        // Search for User and validate
        if (Auth::attempt($this->form)) {
            return redirect(route('home'));
        }

        // Set login error
        session()->flash('message', 'Bad Credentials');
    }

    // Helper Validator messages in spanish
    public function messages() : array
    {
        return vMessages(Login::class);
    }

    public function render() : View
    {
        return view('livewire/auth/form');
    }
}
