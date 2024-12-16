<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

//- trang index
Route::get('/issue', [IssueController::class, 'index']);
