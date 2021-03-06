<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoryController;



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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function (){
	// Log out
	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
	// Users
	Route::group(['prefix'=>'user'], function(){
		Route::get('/list-users', [UsersController::class, 'index'])->name('list.users');
		Route::get('/add-user', [UsersController::class, 'create'])->name('add.user');
		Route::post('/add-user', [UsersController::class, 'store'])->name('add.user.post');
		Route::get('/edit-user/{id}', [UsersController::class, 'edit'])->name('edit.user');
		Route::post('/edit-user/{id}', [UsersController::class, 'update'])->name('update.user.post');
		Route::get('/delete-user/{id}', [UsersController::class, 'destroy'])->name('delete.user');
	});
	// Role
	Route::group(['prefix'=>'role'], function(){
		Route::get('/list-roles', [RoleController::class, 'index'])->name('list.roles');
		Route::get('/add-role', [RoleController::class, 'create'])->name('add.role');
		Route::post('/add-role', [RoleController::class, 'store'])->name('add.role.post');
		Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit.role');
		Route::post('/edit-role/{id}', [RoleController::class, 'update'])->name('update.role.post');
		Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete.role');
	});

	// Permission
	Route::group(['prefix'=>'permission'], function(){
		Route::get('/list-permissions', [PermissionController::class, 'index'])->name('list.permissions');
		Route::get('/add-permission', [PermissionController::class, 'create'])->name('add.permission');
		Route::post('/add-permission', [PermissionController::class, 'store'])->name('add.permission.post');
		Route::get('/edit-permission/{id}', [PermissionController::class, 'edit'])->name('edit.permission');
		Route::post('/edit-permission/{id}', [PermissionController::class, 'update'])->name('update.permission.post');
		Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('delete.permission');
	});

	// Category
	Route::group(['prefix'=>'category'], function(){
		Route::get('/list-categories', [CategoryController::class, 'index'])->name('list.categories');
		Route::get('/add-category', [CategoryController::class, 'create'])->name('add.category');
		Route::post('/add-category', [CategoryController::class, 'store'])->name('add.category.post');
		Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
		Route::post('/edit-category/{id}', [CategoryController::class, 'update'])->name('update.category.post');
		Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
	});

	// Product
	Route::group(['prefix'=>'product'], function(){
		Route::get('/list-products', [ProductController::class, 'index'])->name('list.products');
		Route::get('/add-product', [ProductController::class, 'create'])->name('add.product');
		Route::post('/add-product', [ProductController::class, 'store'])->name('add.product.post');
		Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
		Route::post('/edit-product/{id}', [ProductController::class, 'update'])->name('update.product.post');
		Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete.product');
		Route::get('/show-product/{id}', [ProductController::class, 'show'])->name('show.product');
		Route::get('/list-imports', [ProductController::class, 'listImports'])->name('list.imports');
		Route::get('/add-imports', [ProductController::class, 'createImports'])->name('add.import');
		Route::post('/add-imports', [ProductController::class, 'storeImports'])->name('add.import.post');
		Route::get('/show-import-detail/{id}', [ProductController::class, 'showImportDetail'])->name('show.import.detail');
	});

	// Customer
	Route::group(['prefix'=>'customer'], function(){
		Route::get('/list-customers', [CustomerController::class, 'index'])->name('list.customers');
		Route::get('/add-customer', [CustomerController::class, 'create'])->name('add.customer');
		Route::post('/add-customer', [CustomerController::class, 'store'])->name('add.customer.post');
		Route::get('/edit-customer/{id}', [CustomerController::class, 'edit'])->name('edit.customer');
		Route::post('/edit-customer/{id}', [CustomerController::class, 'update'])->name('update.customer.post');
		Route::get('/delete-customer/{id}', [CustomerController::class, 'destroy'])->name('delete.customer');
		Route::get('/show-customer/{id}', [CustomerController::class, 'show'])->name('show.customer');

		
	});

	// Orders
	Route::group(['prefix'=>'order'], function(){
		Route::get('/list-orders', [OrdersController::class, 'index'])->name('list.orders');
		Route::get('/add-order', [OrdersController::class, 'create'])->name('add.order');
		Route::post('/add-order', [OrdersController::class, 'store'])->name('add.order.post');
		Route::get('/edit-order/{id}', [OrdersController::class, 'edit'])->name('edit.order');
		Route::post('/edit-order/{id}', [OrdersController::class, 'update'])->name('update.order.post');
		Route::get('/delete-order/{id}', [OrdersController::class, 'destroy'])->name('delete.order');
		Route::get('/show-order/{id}', [OrdersController::class, 'show'])->name('show.order');
	});

});

Route::get('/admin/config/province',[ConfigController::class,'province']);
Route::get('/admin/config/district/{id}',[ConfigController::class,'district']);
Route::get('/admin/config/ward/{id}',[ConfigController::class,'ward']);
Route::get('/admin/config/province/{id}',[ConfigController::class,'detailProvince']);

// //Employee
// Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
// Route::get('/add-employee', [EmployeesController::class, 'create'])->name('add.employee');
// Route::post('/add-employee', [EmployeesController::class, 'store'])->name('add.employee.post');
// Route::get('/edit-employee/{id}', [EmployeesController::class, 'edit'])->name('edit.employee');
// Route::post('/edit-employee/{id}', [EmployeesController::class, 'update'])->name('update.employee.post');
// Route::get('/delete-employee/{id}', [EmployeesController::class, 'destroy'])->name('delete.employee');

