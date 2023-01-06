<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\Text\TextController;

route::get('/files',[FileController::class,'index'])->name('file.index');

route::post('files/create',[FileController::class,'create'])->name('file.create');



route::get('/texts',[TextController::class,'index'])->name('Text.index');

Route::get('texts/create',[TextController::class,'create'])->name('Text.create');

Route::post('texts/store',[TextController::class,'store'])->name('Text.store');

Route::get('texts/{text}',[TextController::class,'show'])->name('Text.show');

Route::get('texts/{texts}/edit',[TextController::class,'edit'])->name('Text.edit');

Route::put('texts/{texts}',[TextController::class,'update'])->name('Text.update');

Route::delete('texts/{text}',[TextController::class,'delete'])->name('Text.delete');
