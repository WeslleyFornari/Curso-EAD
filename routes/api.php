<?php

use App\Http\Controllers\Api\ApiController;
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

// Rotas sem autenticação
Route::post('/login', [ApiController::class, 'login']);

// Rotas que requerem autenticação
Route::middleware('auth:api')->group(function () {
    Route::get('/planos', [ApiController::class, 'getPlans']);
    Route::post('/start-api', [ApiController::class, 'startApi']);
});
