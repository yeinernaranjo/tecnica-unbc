<?php

use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\UsersManagement;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::middleware('auth')->get('/users', UsersManagement::class);
Route::get('/logout', 'App\Livewire\Login@logout')->name('logout');
Route::get('/register', Register::class)->name('register');
