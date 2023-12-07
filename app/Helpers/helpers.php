<?php

/**
 * Create rules for Validator
 * 
 * @param  string $class
 * @return array
 */
function vRules(string $class) : array
{
    return match($class) {
        'App\Livewire\Auth\Login' => [
            'form.email' => 'required|string|email|max:255',
            'form.password' => 'required|string|min:8'
        ],
        'App\Livewire\Auth\Register' => [
            'form.name' => 'required|string|max:255',
            'form.email' => 'required|string|email|max:255',
            'form.password' => 'required|string|min:8'
        ]
    };
}

/**
 * Create custom error messages for Validator
 * 
 * @param  string $class
 * @return array
 */
function vMessages(string $class) : array
{
    return match($class) {
        'App\Livewire\Auth\Login' => [
            'form.email.required' => __('El email es obligatorio.'),
            'form.email.email' => __('El email no es correcto.'),
            'form.password.required' => __('La contraseña es obligatoria.'),
            'form.password.min' => __('Na contraseña no debe tener menos de 8 caracteres.')
        ],
        'App\Livewire\Auth\Register' => [
            'form.name.required' => __('El nombre es obligatorio.'),
            'form.name.max' => __('El nombre no debe ser de mas de 255 caracteres.'),
            'form.email.required' => __('El email es obligatorio.'),
            'form.email.email' => __('El email no es correcto.'),
            'form.password.required' => __('La contraseña es obligatoria.'),
            'form.password.min' => __('Na contraseña no debe tener menos de 8 caracteres.')
        ]
    };
}