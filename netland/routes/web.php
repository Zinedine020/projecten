<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\PivotController; // Voeg de PivotController toe
use App\Http\Controllers\UserController;
Route::get('/users/create', [UserController::class, 'create']);
Route::get('/users/add', [UserController::class, 'add']);
Route::post('/users/add', [UserController::class, 'store']);


Route::get('/films', [MediaController::class, 'films']);
Route::get('/series', [MediaController::class, 'series']);
Route::get('/acteurs', [ActorController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'show']);
Route::get('/media', [MediaController::class, 'index']);
Route::get('/acteurs/{id}', [ActorController::class, 'media']);

// Voeg de route voor de PivotController toe
Route::get('/pivot', [PivotController::class, 'index']);
