<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;



// Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('contacts/add', [ContactController::class, 'create']);
Route::post('contacts/add', [ContactController::class, 'store'])->name('contacts.store');
Route::get('contacts/{contact}/edit', [ContactController::class, 'edit']);
Route::post('contacts/update/{contact}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('contacts/delete/{contact}', [ContactController::class, 'delete']);

