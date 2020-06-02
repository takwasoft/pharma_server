<?php

use Illuminate\Support\Facades\App;
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
Route::get('/locale/{locale}', function ($locale) {
    session(['my_locale' => $locale]);
    return redirect()->back();
});

// Auth::routes();\

Route::get('/home', 'HomeController@index')->name('home');


// Route::resource('posts', 'PostsController');
// Route::resource('group-names', 'GroupNamesController');
// Route::resource('manufacturers', 'ManufacturersController');
// Route::resource('medicine-types', 'MedicineTypesController');
// Route::resource('unit-types', 'UnitTypesController');
// Route::resource('shelves', 'ShelvesController');
// Route::resource('medicines', 'MedicinesController');
// Route::resource('medicine-unit-types', 'MedicineUnitTypesController');
// Route::resource('suppliers', 'SuppliersController');
// Route::resource('supplier-orders', 'SupplierOrdersController');
// Route::resource('supplier-order-line', 'SupplierOrderLineController');
// Route::resource('supplier-order-returns', 'SupplierOrderReturnsController');
// Route::resource('supplier-order-return-lines', 'SupplierOrderReturnLinesController');
// Route::resource('customers', 'CustomersController');
// Route::resource('customer-orders', 'CustomerOrdersController');
// Route::resource('customer-order-lines', 'CustomerOrderLinesController');
// Route::resource('customer-order-returns', 'CustomerOrderReturnsController');
// Route::resource('customer-order-return-lines', 'CustomerOrderReturnLinesController');
// Route::resource('wastages', 'WastagesController');
// Route::resource('wastage-lines', 'WastageLinesController');
// Route::resource('expense-types', 'ExpenseTypesController');
// Route::resource('expenses', 'ExpensesController');
// Route::resource('staffs', 'StaffsController');
// Route::resource('staff-duties', 'StaffDutiesController');
// Route::resource('staff-payments', 'StaffPaymentsController');
// Route::resource('abilities', 'AbilitiesController');
// Route::resource('roles', 'RolesController');
// Route::resource('ability-roles', 'AbilityRolesController');
// Route::resource('role-users', 'RoleUsersController');