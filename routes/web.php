<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::prefix('/student')->controller(StudentController::class)->name('student.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
});

Route::get('/', fn () => redirect(route('student.index')));
