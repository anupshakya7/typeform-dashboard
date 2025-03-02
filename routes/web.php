<?php

use App\Http\Controllers\Typeform\AnswerController;
use App\Http\Controllers\Typeform\BranchController;
use App\Http\Controllers\Typeform\FormController;
use App\Http\Controllers\Typeform\IndexController;
use App\Http\Controllers\Typeform\OrganizationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('dashboard/{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/',[IndexController::class,'index'])->name('home.index');

Route::prefix('typeform')->group(function(){
    //Organization
    Route::resource('organization',OrganizationController::class);

    //Branch
    Route::resource('branch',BranchController::class);
    
    //Form
    Route::resource('form',FormController::class);

    //Survey
    Route::resource('survey',AnswerController::class);

    //Get Answer WebHook
    Route::post('/answer',[AnswerController::class,'getAnswer'])->name('answer.store');
});