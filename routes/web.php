<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ReportController::class, 'report']);
Route::get('/report', [ReportController::class, 'report'])->name('report');
Route::post('search', [ReportController::class, 'search'])->name('search');
Route::get('/project', [EntryController::class, 'project'])->name('project');
Route::get('/task', [EntryController::class, 'Task'])->name('task');
Route::get('/entry', [EntryController::class, 'Entry'])->name('entry');
Route::get('/add-entry', [EntryController::class, 'Create'])->name('add-entry');
Route::get('/get-tasks/{projectId}', [EntryController::class, 'getTasks']);
Route::get('/get-projects/{taskId}', [EntryController::class, 'getProjects']);
Route::post('store', [EntryController::class, 'store'])->name('store');

