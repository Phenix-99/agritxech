<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\AgriculteurController;
use App\Http\Controllers\ProjetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::resource('projets', ProjetController::class)->middleware('auth');
Route::resource('agriculteurs', AgriculteurController::class)->middleware('auth');
Route::resource('plantes', PlanteController::class)->middleware('auth');

require __DIR__.'/auth.php';
