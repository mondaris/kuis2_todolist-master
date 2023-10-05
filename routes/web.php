<?php

use App\Http\Controllers\taskController;
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

Route::get('/task/belumselesai', [taskController::class, 'indexBelumSelesai']);
Route::get('/task/selesai', [taskController::class, 'indexSelesai']);
Route::put('/task/{id}/status', [taskController::class, 'updateTaskStatus']);
Route::resource('task', taskController::class);
//Route::get('/task/{id}', [taskController::class, 'detail']);


