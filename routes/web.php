<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('project')->name('project')->group(function(){
    Route::post('create', [ProjectController::class, 'create'])->name('.create');
});

Route::prefix('task')->name('task')->group(function(){
    Route::post('create', [TaskController::class, 'create'])->name('.create');
    Route::post('update', [TaskController::class, 'update'])->name('.update');
    Route::post('delete', [TaskController::class, 'delete'])->name('.delete');
    Route::post('reorder', [TaskController::class, 'reorder'])->name('.reorder');
});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
