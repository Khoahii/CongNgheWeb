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

//- /issue/edit/{id} (get)
Route::get('/issue/edit/{id}', [IssueController::class, 'editIssue'])->name('editIssue');

//- /issue/edit/{id} (patch)
Route::patch('/issue/edit/{id}', [IssueController::class, 'editIssuePatch'])->name('editIssuePatch');
