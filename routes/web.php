<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanteController;
use App\Http\Controllers\AgriculteurController;

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

Route::resource('agriculteurs', AgriculteurController::class);
Route::resource('plantes', PlanteController::class);