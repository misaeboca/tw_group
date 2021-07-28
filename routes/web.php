<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\LogsController;



App::setLocale('es');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {

	//Totail invoce 
	Route::get('invoice/{invoice_id}', [InvoiceController::class, 'totailInvoice'])->name('invoice.totailInvoice');
	//id invoce quanty major 100
	Route::get('invoice', [InvoiceController::class, 'upProduct'])->name('invoice.upProduct');
	//product price major 1000.000
	Route::get('product', [ProductController::class, 'listProduct'])->name('product.listProduct');

	//Tasks create
	Route::get('tasks/create', [TasksController::class, 'create'])->name('tasks.create');
	Route::post('tasks/store', [TasksController::class, 'store'])->name('tasks.store');
	Route::get('tasks/{id}', [TasksController::class, 'show'])->name('tasks.show');

	//Logs create
	Route::get('create/logs/{id}', [LogsController::class, 'create'])->name('logs.create');
	Route::post('logs/store', [LogsController::class, 'store'])->name('logs.store');


	Route::get('logout', [UserController::class, 'logout'])->name('logout');

});