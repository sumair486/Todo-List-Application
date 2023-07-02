<?php

use App\Http\Controllers\TodoController;
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
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('Todo.index');
// });
Route::get('/home',[TodoController::class,'index'])->middleware('auth');

Route::post('/home',[TodoController::class,'store'])->name('home');
Route::get('/cancel/{id}',[TodoController::class,'cancel']);
Route::get('/done/{id}',[TodoController::class,'done']);


//export 

Route::get('/export',[TodoController::class,'export'])->name('export');
Route::post('/import',[TodoController::class,'import'])->name('import');




