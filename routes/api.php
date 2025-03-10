<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Typeform\FormController;

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

//Get Single Form Data
Route::get('typeform/form/getData',[FormController::class,'getForm'])->name('form.get');

//Get Filter Organizations according to Country
Route::get('typeform/form/getOrganization',[FormController::class,'filterOrganization'])->name('organization.get');

//Get Filter Branches according to Organization
Route::get('typeform/form/getBranch',[FormController::class,'filterBranch'])->name('branch.get');
