<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitizensController;
use App\Http\Controllers\TasksController;
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

Route::get('/', function () {
    return view('welcome');
});




Route::post('registerCitizens', 'CitizensController@registerCitizens')->name('registerCitizens');
Route::post('deleteCitizen', 'CitizensController@deleteCitizen')->name('deleteCitizen');


//tasks
Route::post('registerTask', 'TasksController@register')->name('registerTask');
Route::post('search', 'TasksController@searchTask')->name('search');
Route::post('deleteTask', 'TasksController@deleteTask')->name('deleteTask');

//routes get
Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('/dashboard', 'AuthController@panelGestions')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
