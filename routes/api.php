<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('posts', 'PostsController');
Route::apiResource('group-names', 'GroupNamesController');
Route::apiResource('manufacturers', 'ManufacturersController');
Route::apiResource('medicine-types', 'MedicineTypesController');
Route::apiResource('unit-types', 'UnitTypesController');
Route::apiResource('shelves', 'ShelvesController');
Route::apiResource('medicines', 'MedicinesController');
Route::apiResource('medicine-unit-types', 'MedicineUnitTypesController');
Route::apiResource('suppliers', 'SuppliersController');
Route::apiResource('supplier-orders', 'SupplierOrdersController');
Route::apiResource('supplier-order-line', 'SupplierOrderLineController');
Route::apiResource('supplier-order-returns', 'SupplierOrderReturnsController');
Route::apiResource('supplier-order-return-lines', 'SupplierOrderReturnLinesController');
Route::apiResource('customers', 'CustomersController');
Route::apiResource('customer-orders', 'CustomerOrdersController');
Route::apiResource('customer-order-lines', 'CustomerOrderLinesController');
Route::apiResource('customer-order-returns', 'CustomerOrderReturnsController');
Route::apiResource('customer-order-return-lines', 'CustomerOrderReturnLinesController');
Route::apiResource('wastages', 'WastagesController');
Route::apiResource('wastage-lines', 'WastageLinesController');
Route::apiResource('expense-types', 'ExpenseTypesController');
Route::apiResource('expenses', 'ExpensesController');
Route::apiResource('staffs', 'StaffsController');
Route::apiResource('staff-duties', 'StaffDutiesController');
Route::apiResource('staff-payments', 'StaffPaymentsController');
Route::apiResource('abilities', 'AbilitiesController');
Route::apiResource('roles', 'RolesController');
Route::apiResource('ability-roles', 'AbilityRolesController');
Route::apiResource('role-users', 'RoleUsersController');
