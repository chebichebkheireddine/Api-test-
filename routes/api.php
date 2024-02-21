<?php

use App\Http\Controllers\listeController;
use App\Http\Controllers\phoneController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// This Route for call api to use it 
Route::get("List/{id?}",[phoneController::class,"listPhone"]);
Route::post("Post",[listeController::class,"listTest"]);
// Put to update the data in db
Route::put("update",[listeController::class,"update"]);