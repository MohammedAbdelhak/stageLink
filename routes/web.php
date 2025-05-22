<?php

use App\Http\Middleware\ActiveAccount;
use App\Livewire\AccountsPage;
use App\Livewire\Pages\ApplicationsPage;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Pages\InternshipPage;
use App\Livewire\Pages\InternshipsTable;
use App\Livewire\PendingView;
use App\Livewire\Settings\AssignView;
use App\Livewire\Settings\CompanyAssignView;
use App\Livewire\Settings\DepartmentAssignView;
use App\Livewire\Settings\StudentAssignView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::get('/account-assigning')->name('assign-account');
// Route::view('/account-pending' , 'pendingpage')->name('pending-acount');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', ActiveAccount::class])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('settings/assignUni', StudentAssignView::class)->name('settings.assignUni');
    Route::get('settings/assignComp', CompanyAssignView::class)->name('settings.assignComp');
    Route::get('settings/assignDep', DepartmentAssignView::class)->name('settings.assignDep');
  
});

require __DIR__ . '/auth.php';

//student
Route::get('/internships', InternshipsTable::class)->name('internships')->middleware(ActiveAccount::class);
Route::get('/internship/{id}', InternshipPage::class)->name('internship.details')->middleware(ActiveAccount::class);
Route::get('/applications', ApplicationsPage::class)->name('applications')->middleware(ActiveAccount::class);
Route::get('/accounts', AccountsPage::class)->name('accounts')->middleware(ActiveAccount::class);




Route::get('pending', PendingView::class)->name('pending')->middleware('auth');
