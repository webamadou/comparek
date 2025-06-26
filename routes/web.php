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
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/accueil', [HomeController::class, 'index'])->name('accueil');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/telecom/fournisseurs', [HomeController::class, 'operators'])->name('list_operators');


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->prefix('dashboard')
    ->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('telecom_operator', TelecomOperatorController::class);
    Route::resource('telecom_service_type', TelecomServiceTypeController::class);
    Route::resource('telecom_offer', TelecomOfferController::class);
    Route::resource('telecom_offer_feature', TelecomOfferFeatureController::class);
    Route::resource('score_criteria', ScoreCriteriaController::class);
    Route::resource('score_value', ScoreValueController::class);
    Route::get('offer_scores/{offer}', [OfferScoresController::class, 'edit'])->name('offer_scores.edit');
    Route::put('offer_scores/{offer}', [OfferScoresController::class, 'update'])->name('offer_scores.update');
});

require __DIR__.'/auth.php';
