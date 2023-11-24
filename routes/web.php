<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManzanaController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', ManzanaController::class .'@index')->name('manzanas.index');
Route::post('/manzanas', ManzanaController::class .'@store')->name('manzanas.store');
Route::put('/manzanas/{id}', ManzanaController::class .'@update')->name('manzanas.update');
Route::delete('/manzanas/{id}', ManzanaController::class .'@destroy')->name('manzanas.destroy');
Route::get('/manzanas/create', ManzanaController::class .'@create')->name('manzanas.create');
Route::get('/manzanas/edit', ManzanaController::class .'@edit')->name('manzanas.edit');


require __DIR__.'/auth.php';
