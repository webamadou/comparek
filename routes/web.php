<?php

use App\Http\Controllers\Admin\OfferScoresController;
use App\Http\Controllers\Admin\ScoreCriteriaController;
use App\Http\Controllers\Admin\ScoreValueController;
use App\Http\Controllers\Admin\TelecomOfferController;
use App\Http\Controllers\Admin\TelecomOfferFeatureController;
use App\Http\Controllers\Admin\TelecomOperatorController;
use App\Http\Controllers\Admin\TelecomServiceTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolAjaxController;
use App\Http\Controllers\TelecomOperatorController as TelecomOperatorControllerFront;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/accueil', [HomeController::class, 'index'])->name('accueil');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/telecom/fournisseurs', [TelecomOperatorControllerFront::class, 'operators'])->name('list_operators');
Route::get('/telecom/fournisseur/{operator}', [TelecomOperatorControllerFront::class, 'operator'])->name('operator_page');
Route::get('/telecom/comparateur/internet', [TelecomOperatorControllerFront::class, 'telecomsComparison'])->name('telecom_comparison');
Route::get('/telecom/comparateur/pass_mobile', [TelecomOperatorControllerFront::class, 'passComparison'])->name('telecom_pass_comparison');
Route::get('/telecom/comparateur/pass_mobile', [TelecomOperatorControllerFront::class, 'passComparison'])->name('telecom_pass_comparison');
Route::get('/telecom/scores', [TelecomOperatorControllerFront::class, 'scores'])->name('telecom_scores');
Route::get('/ecoles', [\App\Http\Controllers\SchoolsController::class, 'index'])->name('index_schools');
Route::get('/ecole/{school}', [\App\Http\Controllers\SchoolsController::class, 'view'])->name('view_school');
Route::get('/ecoles/accreditees', [\App\Http\Controllers\SchoolsController::class, 'accredited'])->name('accreds_schools');
Route::get('/programme/{program:slug}', [\App\Http\Controllers\ProgramsController::class, 'show'])->name('view_program');
Route::get('schools/comparison', [\App\Http\Controllers\SchoolsController::class, 'comparison'])->name('schools_comparison');
Route::get('/article/{article}', [\App\Http\Controllers\PostController::class, 'view'])->name('view_article');
Route::get('/articles/{category:slug?}', [\App\Http\Controllers\PostController::class, 'index'])->name('articles');

/* === AJAX CALLS === */
Route::get('/ecoles/ajax', [SchoolAjaxController::class, 'index'])->name('ecoles.ajax');
Route::get('/programs-filter/ajax', [SchoolAjaxController::class, 'schoolProgramFilter'])->name('ecoles-filter.ajax');
Route::get('/accredited_ecoles/ajax', [SchoolAjaxController::class, 'accredSchoolProgramFilter']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])
    ->prefix('dashboard')
    ->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('telecom_operator', TelecomOperatorController::class);
    Route::resource('telecom_service_type', TelecomServiceTypeController::class);
    Route::resource('telecom_offer', TelecomOfferController::class);
    Route::resource('telecom_offer_feature', TelecomOfferFeatureController::class);
    Route::resource('schools', \App\Http\Controllers\Admin\SchoolController::class);
    Route::resource('school_programs', \App\Http\Controllers\Admin\SchoolProgramController::class);
    Route::resource('program_features', \App\Http\Controllers\Admin\ProgramFeatureController::class);
    Route::resource('score_criteria', ScoreCriteriaController::class);
    Route::resource('score_value', ScoreValueController::class);
    Route::get('offer_scores/{offer}', [OfferScoresController::class, 'edit'])->name('offer_scores.edit');
    Route::put('offer_scores/{offer}', [OfferScoresController::class, 'update'])->name('offer_scores.update');
    Route::resource('post', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('bank', \App\Http\Controllers\Admin\BankController::class);
    Route::resource('bank_product', \App\Http\Controllers\Admin\BankProductController::class);
    Route::resource('bank_offer', \App\Http\Controllers\Admin\ProductOfferController::class);
});

require __DIR__.'/auth.php';
