<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Student\InternshipPage;
use App\Livewire\Student\InternshipsTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::get('/account-assigning')->name('assign-account');
// Route::view('/account-pending' , 'pendingpage')->name('pending-acount');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';


Route::get('/internships' , InternshipsTable::class)->name('internships');
Route::get('/internship/{id}' , InternshipPage::class)->name('internship.details');
