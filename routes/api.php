<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
// use PharIo\Manifest\AuthorCollection;
use App\Http\Controllers\API\AuthorCollection;

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

Route::post('register',[AuthorCollection::class,'register']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('data/add', [DataController::class, 'addstore']);
    Route::get('data', [DataController::class, 'index']);
    Route::get('data/{id}/show', [DataController::class, 'addshow']);
    Route::post('data/{id}/update', [DataController::class, 'dataupdate']);
    // Route::put('data/{id}/update',[DataController::class,'update']);
    Route::delete('data/{id}/delete', [DataController::class, 'delete']);

});
