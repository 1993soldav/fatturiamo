<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\LoginController;

Route::post('/add-group', [GroupsController::class, 'addGroup']);
Route::post('/add-company', [CompaniesController::class, 'addCompany']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/lettura', [InvoiceController::class, 'readInvoice']);

Route::group(['middleware' => ['auth:api']], function () {
});
