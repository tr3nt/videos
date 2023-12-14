<?php

use App\Livewire\Home;
use App\Livewire\Watch;
use App\Livewire\Manage;
use App\Livewire\Index;
use App\Livewire\Searches;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;


// Public routes
Route::get('/', Index::class)->name('index');
Route::get('/login', Login::class)->name('login');
Route::get('/registro', Register::class)->name('register');

// Auth routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/inicio', Home::class)->name('home');
    Route::get('/ver/{video}', Watch::class)->name('watch');
});

// Admin routes
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/videos', Manage::class)->name('manage');
    Route::get('/busquedas', Searches::class)->name('searches');
});
