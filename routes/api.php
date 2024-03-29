<?php

use App\Http\Controllers\LabController;
use App\Http\Controllers\LabsController;
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
// this is for post Data into db
Route::post("Post",[listeController::class,"listTest"]);
// Put to update the data in db
Route::put("update",[listeController::class,"update"]);
// Sherch in Api is simple to do it 
Route::get("search/{name}",[listeController::class,"SearchList"]);
// Note in this step you must see the link of api and test it if work or not
// Delete Route to use it 
Route::delete("delete/{id?}",[listeController::class,"delete"]); 
// API validation
Route::post("save",[listeController::class,"saveData"]);

#This  is for Labs Api to test 
Route::get("Labslist",[LabsController::class,"index"]);
// Lbs Resources
Route::apiResource("Labs",LabController::class);
// Change the to put to update
Route::apiResource("Labs/{id?}",LabController::class);

