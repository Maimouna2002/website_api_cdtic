<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\InternshipController;
use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\DomainController;
use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\TypeOfferController;




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

Route::apiResource('offers', OfferController::class);
Route::apiResource('applications', ApplicationController::class);
Route::apiResource('internships', InternshipController::class);
Route::apiResource('levels', LevelController::class);
Route::apiResource('domains', DomainController::class);
Route::apiResource('typeOffers', TypeOfferController::class);



Route::group([
  'prefix' => 'auth'
], function () {
  Route::post('login', [AuthController::class, 'login']);
  Route::post('register', [AuthController::class, 'register']);

  Route::group([
    'middleware' => 'auth:sanctum'
  ], function () {
    Route::get('logout', [AuthController::class, 'logout']);

          });
});

