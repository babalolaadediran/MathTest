<?php

 use App\Http\Controllers\TestsController;
 use Illuminate\Support\Facades\Routes;

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
    return view('index');
})->name('main');

Route::get('/test',[TestsController::class, "getTestQuestions"])->name('getTestQuestions');

Route::post('/submitExam',[TestsController::class, "submitExam"])->name('submitExam');
