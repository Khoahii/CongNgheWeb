<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodControler;

//-trang chu
Route::get('/', [FoodControler::class, 'getAllFood']);

//-hien thi trang tao mon an
Route::get('/food/create', [FoodControler::class, 'foodCreate'])->name("foodCreate");

//-xu ly hanh dong tao mon an
Route::post('/food/create', [FoodControler::class, 'foodCreatePost'])->name("foodCreatePost");

//-xu ly hanh dong xoa mon an
Route::delete('/food/delete/{id}', [FoodControler::class, 'foodDelete'])->name("foodDelete");

//- hien thi trang edit
Route::get('/food/edit/{id}', [FoodControler::class, 'foodEdit'])->name("foodEdit");

//-edit route Post
Route::post('/food/edit', [FoodControler::class, 'foodEditPost'])->name("foodEditPost");



