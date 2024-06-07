<?php

use App\Http\Controllers\StudentController;
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

//Route::get('/students/all', function(){
 //   return view('students.index');
//});

////Route::group(['prefix' => 'student'], function(){

//})

Route :: get('/students/all', [StudentController ::class, 'index'])->name('Student.index');
Route :: get('/students/create', [StudentController ::class, 'create'])->name('Student.create');
Route :: post('/students/store', [StudentController ::class, 'store'])->name('Student.store');
Route :: get('/students/{student_id}', [StudentController ::class, 'edit'])->name('Student.edit');
Route ::put('/students/{student_id}',[StudentController ::class, 'update'])->name('Student.update');
Route :: get('/students/delete/{student_id}', [StudentController ::class, 'delete'])->name('Student.delete');
