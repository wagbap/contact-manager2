<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginRegisterController;


    Route::get('/', function () {
        return view('welcome');
    });

 
    // Rotas para registro e login
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
    });
    
    // Rota para dashboard acessível apenas para usuários autenticados
    Route::middleware('auth')->get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
    


   // Rota para permisão acessível apenas para usuários autenticados
    Route::middleware('auth')->group(function () {
        Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
        Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
        Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
        Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    });
    
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    
    
    // Rota para dashboard acessível apenas para usuários autenticados
    Route::middleware('auth')->get('/dashboard', function () {
        return redirect()->route('contacts.index');
    })->name('dashboard');
