<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\livewire\Admin\TalleresAdmin;
use App\Livewire\Admin\UsuariosAdmin;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    Route::get('/mis-talleres', [App\Http\Controllers\MisTalleresController::class, 'index'])->name('mis-talleres');
    Route::delete('/mis-talleres/{taller}', [App\Http\Controllers\MisTalleresController::class, 'eliminar'])->name('mis-talleres.eliminar');
});

Route::middleware(['rol:admin'])->group(function () {
    // Rutas solo para admin
});

Route::middleware(['auth', 'can:admin'])->group(function () {
});

require __DIR__.'/auth.php';
Route::middleware(['auth', 'can:admin,App\\Models\\User'])->group(function () {
Route::get('/admin/talleres', TalleresAdmin::class)->name('admin.talleres');
Route::get('/admin/usuarios', UsuariosAdmin::class)->name('admin.usuarios');
});
Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre.nosotros');