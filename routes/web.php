<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/show');
});
Route::get('/add-student', [StudentController::class, 'add'])->name('student.add');
Route::POST('/add-student-submit', [StudentController::class, 'storedata'])->name('student.storedata');
Route::get('/show', [StudentController::class, 'show'])->name('student.show');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::POST('/edit-submit', [StudentController::class, 'edit_submit'])->name('student.edit.submit');
Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
