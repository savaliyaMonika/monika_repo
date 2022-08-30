<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiJWTAuthController;
use App\Http\Controllers\apiDingoController;
use App\Http\Controllers\Api\V1\MyController;
use App\Http\Controllers\Api\V2\MyController as V2Controller;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Using JWT 
Route::post('register', [ApiJWTAuthController::class, 'register']);
Route::post('login', [ApiJWTAuthController::class, 'login']);

Route::group(['middleware' => 'jwt.verify'], function () {

    Route::post('logout', [ApiJWTAuthController::class, 'logout']);
    Route::get('user', [ApiJWTAuthController::class, 'getUser']);
    Route::get('show/{id}', [ApiJWTAuthController::class, 'show']);
});

// using Dingo 

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {

    $api->get('test', function () {
        return 'It is ok';
    });
    $api->get('userData', [apiDingoController::class, 'index']);
    $api->get('showData/{id}', [apiDingoController::class, 'show']);
    $api->post('authenticate', [apiDingoController::class, 'login']);
});
$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->post('authLogout', [apiDingoController::class, 'logout']);
    $api->get('getUsers', [apiDingoController::class, 'getUsers']);
});
// version control

$api->version('v1', ['middleware' => 'api.auth'], function ($api) { 
    $api->group(['prefix' => 'v1'], function ($api) { 

        $api->get('getUsers', [MyController::class, 'getUsers']);
    });
    $api->group(['prefix' => 'v2'], function ($api) { 
        $api->get('getUsers', [V2Controller::class, 'getUsers']);
    });
});
