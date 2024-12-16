<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

//- trang chu
Route::get('/issue', [IssueController::class, 'index']);

//- /issue/create (get)
Route::get('/issue/create', [IssueController::class, 'createIssue'])->name('createIssue');

//- /issue/create (post)
Route::post('/issue/create', [IssueController::class, 'createIssuePost'])->name('createIssuePost');

//-/issue/delete/{id}
Route::delete('/issue/delete/{id}', [IssueController::class, 'deleteIssue'])->name('deleteIssue');

