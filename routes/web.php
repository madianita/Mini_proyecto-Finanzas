<?php

use App\Models\Egreso;
use App\Models\Ingreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\CategoriaController;
use App\Livewire\Admin\Egresos\EgresosComponent;
use App\Http\Controllers\ReporteEgresoController;
use App\Http\Controllers\ReporteIngresoController;
use App\Livewire\Admin\Ingresos\IngresosComponent;
use App\Livewire\Admin\Categorias\CategoriasComponent;

Route::get('/', function () {
    return redirect('/admin/home');
});

Route::group(['prefix' => 'admin'], function () {

    Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home');

    // Route::get('/ingresos', IngresosComponent::class)->name('ingresos');
    // Route::get('/egresos', EgresosComponent::class)->name('egresos');


    Route::get('/categorias/crear', [CategoriaController::class, 'create'])->name('categorias.categorias');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');

    Route::get('/categorias/{id}/editar', [CategoriaController::class, 'create'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    Route::get('/ingresos/crear', [IngresoController::class, 'create'])->name('ingresos.ingresos');
    Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');
    Route::get('/ingresos', [IngresoController::class, 'index'])->name('ingresos.index');

    Route::get('/ingresos/{id}/editar', [IngresoController::class, 'create'])->name('ingresos.edit');
    Route::put('/ingresos/{id}', [IngresoController::class, 'update'])->name('ingresos.update');
    Route::delete('/ingresos/{id}', [IngresoController::class, 'destroy'])->name('ingresos.destroy');

    Route::get('/egresos/crear', [EgresoController::class, 'create'])->name('egresos.egresos');
    Route::post('/egresos', [EgresoController::class, 'store'])->name('egresos.store');
    Route::get('/egresos', [EgresoController::class, 'index'])->name('egresos.index');

    Route::get('/egresos/{id}/editar', [EgresoController::class, 'create'])->name('egresos.edit');
    Route::put('/egresos/{id}', [EgresoController::class, 'update'])->name('egresos.update');
    Route::delete('/egresos/{id}', [EgresoController::class, 'destroy'])->name('egresos.destroy');

    Route::get('/reportes/egresos', [ReporteEgresoController::class, 'index'])->name('reportes.egresos');
    Route::get('/egresos/pdf', [ReporteEgresoController::class, 'exportarPDF'])->name('egresos.pdf');
    Route::get('/reportes/ingresos', [ReporteIngresoController::class, 'index'])->name('reportes.ingresos');
    Route::get('/ingresos/pdf', [ReporteIngresoController::class, 'exportarPDF'])->name('ingresos.pdf');
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
