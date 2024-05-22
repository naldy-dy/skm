<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkmController;

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


	Route::controller(SkmController::class)->group(function () {
		Route::get('/', 'index');
		Route::get('/{config:opd_id}', 'skm');
		Route::post('/save/{config:opd_id}', 'save');

	});
