<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('credit', \App\Http\Controllers\CreditController::class);
Route::apiResource('wizardprocess', \App\Http\Controllers\WizardprocessController::class);
Route::apiResource('as_contract_wizardprocess', \App\Http\Controllers\AsContractWizardprocessController::class);
Route::apiResource('institution', \App\Http\Controllers\InstitutionController::class);
