<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('sortable-list/', \App\Livewire\SortableList::class)
    ->middleware(['auth'])
    ->name('sortable-list');

require __DIR__.'/auth.php';
