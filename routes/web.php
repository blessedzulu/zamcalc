<?php

use App\Actions\Auth\Logout;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');

/** AUTH ROUTES */
Route::livewire('/register', 'auth::register')->name('register');

Route::livewire('/login', 'auth::login')->name('login');

Route::livewire('/forgot-password', 'auth::forgot-password')->name('forgot-password');

Route::livewire('reset-password/{token}', 'auth::reset-password')->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::livewire('/dashboard', 'pages::dashboard')->name('dashboard');
    Route::livewire('/settings/account', 'pages::settings.account')->name('settings.account');
    Route::livewire('/posts/create', 'pages::posts.create')->name('posts.create');
});

Route::middleware(['auth'])->group(function () {
    Route::livewire('/auth/verify-email', 'auth::verify-email')
        ->name('verification.notice');
    Route::post('/logout', Logout::class)
        ->name('auth.logout');
    Route::livewire('confirm-password', 'auth::confirm-password')
        ->name('password.confirm');
});

Route::middleware(['auth', 'signed'])->group(function () {
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect(route('home'));
    })->name('verification.verify');
});
