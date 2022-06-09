<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/p', function () {       
//     return view('problem');
// });


Route::get('/s', function () {
    return view('submission');
});

Route::get('/addProblem',[App\Http\Controllers\problemController::class,'addProblem']);


Route::get('/createContest',[App\Http\Controllers\contestController::class,'createContest']);

Route::get('/pdf', function () {
    return view('c');
});

// Route::get('/dashboard', function () {
//     return view('lite.default.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/{contestt}', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/lc/scoreboard/{contestt}', [App\Http\Controllers\liveContestController::class, 'scoreboard']);
Route::get('/lc/clarification/{contest}', [App\Http\Controllers\livecontestController::class, 'clarification']);
Route::get('/lc/contestant/{c_id}', [App\Http\Controllers\contestantController::class, 'list']);
Route::get('/lc/add/contestant/{contest}', [App\Http\Controllers\contestantController::class, 'add']);

Route::get('/c/{contestt}',[App\Http\Controllers\contestController::class,'list']);
Route::get('/c/Detail/{contestt}',[App\Http\Controllers\contestController::class,'detail']);
Route::get('/createContest',[App\Http\Controllers\contestController::class,'createContest']);
Route::get('/c/contestDetail/{contestt}',[App\Http\Controllers\contestController::class,'contestDetail']);
Route::get('/c/contestSchedule/{contestt}',[App\Http\Controllers\contestController::class,'contestSchedule']);
Route::get('/c/contestProblemNo/{contestt}',[App\Http\Controllers\contestController::class,'contestProblemNo']);
Route::get('/c/contestProblems/{contestt}',[App\Http\Controllers\contestController::class,'contestProblems']);
Route::get('/c/savecontestProblems/{contestt}',[App\Http\Controllers\contestController::class,'saveContestProblems']);
Route::get('/c/addTestcases/{contestt}/{p_in_s}',[App\Http\Controllers\contestController::class,'addTestcases']);


Route::get('/c/finishReg/{problems}/{contestt}',[App\Http\Controllers\contestController::class,'finishContestReg']);

Route::get('/c/toDetail/{contestt}',[App\Http\Controllers\contestController::class,'toDetail']);
Route::get('/c/toSchedule/{contestt}',[App\Http\Controllers\contestController::class,'toSchedule']);
Route::get('/c/toProblemNo/{contestt}',[App\Http\Controllers\contestController::class,'toNoOfProblems']);
Route::get('/c/toProblems/{contestt}',[App\Http\Controllers\contestController::class,'toProblems']);

Route::get('/contestant/accept/{id}',[App\Http\Controllers\contestantController::class,'accept']);
Route::get('/contestant/reject/{id}',[App\Http\Controllers\contestantController::class,'reject']);

Route::get('/u/{contest}',[App\Http\Controllers\userController::class,'list']);
// Route::get('/user',[App\Http\Controllers\userController::class,'choose']);
Route::get('/u/{name}',[App\Http\Controllers\userController::class,'show']);
Route::get('/u/delete/{id}',[App\Http\Controllers\userController::class,'delete']);

Route::get('/p/{contestt}',[App\Http\Controllers\problemController::class,'list']);
Route::get('/p/add',[App\Http\Controllers\problemController::class,'add']);
Route::get('/p/{id}/{contest?}',[App\Http\Controllers\problemController::class,'show']);
Route::get('/p/edit/{id}',[App\Http\Controllers\problemController::class,'update']);
Route::get('/p/delete/{id}',[App\Http\Controllers\problemController::class,'delete']);

Route::get('/s/{contest}',[App\Http\Controllers\submissionController::class,'list']);
Route::get('/s/{contestt}/{problem}',[App\Http\Controllers\submissionController::class,'listDetail']);
Route::get('/excecute/{contest}', [App\Http\Controllers\submissionController::class, 'execute']);
Route::get('/s/editor{id}/{contest?}',[App\Http\Controllers\submissionController::class,'editor']);

Route::get('/sfilter/{contestt}/{v}',[App\Http\Controllers\submissionController::class,'listAccepted']);
