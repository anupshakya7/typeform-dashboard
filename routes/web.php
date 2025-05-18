<?php

use App\Http\Controllers\Typeform\AboutController;
use App\Http\Controllers\Typeform\AnswerController;
use App\Http\Controllers\Typeform\Auth\LoginController;
use App\Http\Controllers\Typeform\BranchController;
use App\Http\Controllers\Typeform\FormController;
use App\Http\Controllers\Typeform\IndexController;
use App\Http\Controllers\Typeform\OrganizationController;
use App\Http\Controllers\Typeform\PermissionController;
use App\Http\Controllers\Typeform\RoleController;
use App\Http\Controllers\Typeform\UserController;
use App\Models\CountryState;
use App\Models\NCountry;
use App\Models\NSubCountry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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


//Custom Auth
Route::post('/loginSubmit',[LoginController::class,'login'])->name('login.submit');

Route::middleware('check_auth','check_route')->group(function(){
    Route::get('/',[IndexController::class,'index'])->name('home.index');
    Route::get('/generate/csv',[IndexController::class,'generateCSV'])->name('home.csv');

    Route::prefix('typeform')->group(function(){
        //User
        Route::resource('user',UserController::class);

        //Assign Role to User
        Route::get('user/{user}/assign-role',[UserController::class,'assignRole'])->name('user.assignRole');
        Route::post('user/{user}/assign-role',[UserController::class,'assignRoleSubmit'])->name('user.assignRole.submit');

        //Roles
        Route::resource('role',RoleController::class);

        //Assign Permission to Role
        Route::get('role/{role}/assign-permission',[RoleController::class,'assignPermission'])->name('role.assignPermission');
        Route::post('role/{role}/assign-permission',[RoleController::class,'assignPermissionSubmit'])->name('role.assignPermission.submit');

        //Permissions
        Route::resource('permission',PermissionController::class);

        //Assign Route to Permission
        Route::get('permission/{permission}/assign-route',[PermissionController::class,'assignRoute'])->name('permission.assignRoute');
        Route::post('permission/{permission}/assign-route',[PermissionController::class,'assignRouteSubmit'])->name('permission.assignRoute.submit');
        
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

        //Adding Country and State Fields Form
        Route::get('form/form-details/{formId}',[FormController::class,'getFormDetails'])->name('form.getForm');
        Route::get('form/insert/new-field',[FormController::class,'insertingNewField'])->name('form.insert.field');
        Route::post('form/insert/new-field',[FormController::class,'insertingNewFieldSubmit'])->name('form.insert.field.submit');

        //Survey
        Route::resource('survey',AnswerController::class);
        Route::get('/survey/QA/{answer}',[AnswerController::class,'QA'])->name('survey.qa');
        Route::get('/survey/generate/csv',[AnswerController::class,'generateCSV'])->name('survey.csv');
        Route::get('/survey/generate/csv/{survey}',[AnswerController::class,'generateIndividualCSV'])->name('survey.single.csv');
        Route::get('/fecthallsurvey', [AnswerController::class, 'fetchAllSurvey'])->name('survey.fecthallsurvey');

        //About Us
        Route::get('about',[AboutController::class,'index'])->name('about.index');
    });
});

//Get Answer WebHook
Route::post('/answer',[AnswerController::class,'getAnswer'])->name('answer.store');

