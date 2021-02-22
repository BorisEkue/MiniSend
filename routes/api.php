<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MailController;

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


Route::post('v1/customers/login', [CustomerController::class, 'login']);
Route::get('v1/customers/{idCustomer}', [CustomerController::class, 'findCustomerById']);


Route::post('v1/emails/', [MailController::class, 'sendMail']);
Route::get('v1/emails/{idMail}', [MailController::class, 'findMailById']);
Route::get('v1/emails/by/customer', [MailController::class, 'findMailByCustomer']);
Route::get('v1/emails/search', [MailController::class, 'search']);
