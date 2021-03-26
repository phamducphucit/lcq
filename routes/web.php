<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Users
Route::get('/list-users', [UsersController::class, 'index'])->name('list.users');
Route::get('/add-user', [UsersController::class, 'create'])->name('add.user');
Route::post('/add-user', [UsersController::class, 'store'])->name('add.user.post');
Route::get('/edit-user/{id}', [UsersController::class, 'edit'])->name('edit.user');
Route::post('/edit-user/{id}', [UsersController::class, 'update'])->name('update.user.post');
Route::get('/delete-user/{id}', [UsersController::class, 'destroy'])->name('delete.user');

// Role
Route::get('/list-roles', [RoleController::class, 'index'])->name('list.roles');
Route::get('/add-role', [RoleController::class, 'create'])->name('add.role');
Route::post('/add-role', [RoleController::class, 'store'])->name('add.role.post');
Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit.role');
Route::post('/edit-role/{id}', [RoleController::class, 'update'])->name('update.role.post');
Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete.role');


// Permission
Route::get('/list-permissions', [PermissionController::class, 'index'])->name('list.permissions');
Route::get('/add-permission', [PermissionController::class, 'create'])->name('add.permission');
Route::post('/add-permission', [PermissionController::class, 'store'])->name('add.permission.post');
Route::get('/edit-permission/{id}', [PermissionController::class, 'edit'])->name('edit.permission');
Route::post('/edit-permission/{id}', [PermissionController::class, 'update'])->name('update.permission.post');
Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');



// //Employee
// Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
// Route::get('/add-employee', [EmployeesController::class, 'create'])->name('add.employee');
// Route::post('/add-employee', [EmployeesController::class, 'store'])->name('add.employee.post');
// Route::get('/edit-employee/{id}', [EmployeesController::class, 'edit'])->name('edit.employee');
// Route::post('/edit-employee/{id}', [EmployeesController::class, 'update'])->name('update.employee.post');
// Route::get('/delete-employee/{id}', [EmployeesController::class, 'destroy'])->name('delete.employee');

