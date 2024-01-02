<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserhomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome.home');
});

Route::get('/register', [RegistrationController::class, 'create'])->name('register.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login.create');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::get('/userHome', [UserhomeController::class, 'index'])->name('userHome');

Route::get('/todolists', [TodoListController::class, 'index'])->name('todolists.index');

Route::get('/todolists/create', [TodoListController::class, 'create'])->name('todolists.create');
Route::post('/todolists', [TodoListController::class, 'store'])->name('todolists.store');

Route::get('/todolists/edit', [TodoListController::class, 'edit'])->name('todolists.edit');
Route::put('/todolists', [TodoListController::class, 'update'])->name('todolists.update');

Route::delete('/todolists', [TodoListController::class, 'destroy'])->name('todolists.destroy');

Route::get('/priority', [PriorityController::class, 'index'])->name('priority.index');

Route::get('/priority/{id}', [PriorityController::class, 'getPriority'])->name('priority.getPriority');

Route::delete('/priority/{id}', [PriorityController::class, 'destroy'])->name('priority.destroy');

Route::post('/priority', [PriorityController::class, 'store'])->name('priority.store');

