<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Egresos\EgresosComponent;
use App\Livewire\Admin\Ingresos\IngresosComponent;
use App\Livewire\Admin\Categorias\CategoriasComponent;


Route::get('/', function () {
    return redirect('/admin/home');
});

Route::group(['prefix' => 'admin'], function () {

    Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/categorias', CategoriasComponent::class)->name('categorias');
    Route::get('/ingresos', IngresosComponent::class)->name('ingresos');
    Route::get('/egresos', EgresosComponent::class)->name('egresos');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::post('/register', function (Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $user = App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect()->route('home');
})->name('register');

