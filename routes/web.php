<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
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
 * DEPARTMENT
 * Routing deparment untuk CRUD
 */
Route::middleware('auth')->group(function () {
    Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('/department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');

    /**
     * Profile controller
     */
    Route::get('/profile/setting', [ProfileController::class, 'setting'])->name('profile.setting');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

/**
 * CONTACT
 * Rounting contact CRUD
 * 
 * auth middleware protection dibuat dkt dalam __construct()
 */
Route::resource('/contact', ContactController::class);

/**
 * Dimasukkan oleh auth scaffold
 */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{locale}', function($locale){    
    session()->put('locale', $locale);        
    return redirect('/contact');
});
