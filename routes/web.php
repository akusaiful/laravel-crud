<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
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
    return view('welcome');
});

// hello
Route::get('/hello', function () {
    return view('hello');
});

// Department query record by ID
// Route::get('/department/{id}', function($id){
//     return Department::find($id);
// });

// Department search record by phone number contoh : 012345566
// akan department Department 66
// Route::get('/department/search/{phone}', function($phone){
//     return Department::wherePhone($phone)->get();
// });

/**
 * DEPARMENT
 * Routing deparment untuk CRUD
 */
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');
