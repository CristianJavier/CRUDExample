<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudExampleController;

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

/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('{any}',function(){
    return view('app');
})->where('any','.*');

/*Route::resource('crud', CrudExampleController::class);
Auth::routes();

Route::get('/home', [CrudExampleController::class, 'index'])->name('home');

/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

/*Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [CrudExampleController::class, 'index'])->name('home');
});*/
