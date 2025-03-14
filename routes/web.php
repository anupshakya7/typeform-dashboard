<?php

use App\Http\Controllers\Typeform\AnswerController;
use App\Http\Controllers\Typeform\BranchController;
use App\Http\Controllers\Typeform\FormController;
use App\Http\Controllers\Typeform\IndexController;
use App\Http\Controllers\Typeform\OrganizationController;
use App\Http\Controllers\Typeform\UserController;
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

Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware('check_auth')->group(function(){
    Route::get('/',[IndexController::class,'index'])->name('home.index');

    Route::prefix('typeform')->group(function(){
        //User
        Route::resource('user',UserController::class);
        
        //Reset Password
        Route::get('change-password',[UserController::class,'changePassword'])->name('user.password-change');
        Route::post('change-password',[UserController::class,'changePasswordSubmit'])->name('user.password-change.submit');

        //Organization
        Route::resource('organization',OrganizationController::class);
        Route::get('organization/generate/csv',[OrganizationController::class,'generateCSV'])->name('organization.csv');

        //Branch
        Route::resource('branch',BranchController::class);
        Route::get('branch/generate/csv',[BranchController::class,'generateCSV'])->name('branch.csv');
        
        //Form
        Route::resource('form',FormController::class);
        Route::get('form/question/{form}',[FormController::class,'formQuestion'])->name('form.question');
        Route::get('form/generate/csv',[FormController::class,'generateCSV'])->name('form.csv');

        //Survey
        Route::resource('survey',AnswerController::class);
        Route::get('/survey/QA/{answer}',[AnswerController::class,'QA'])->name('survey.qa');
        Route::get('/survey/generate/csv',[AnswerController::class,'generateCSV'])->name('survey.csv');

        //Get Answer WebHook
        Route::post('/answer',[AnswerController::class,'getAnswer'])->name('answer.store');
    });
});
