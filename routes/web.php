<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('casos.getBrand/{id}', 'CasoController@getBrand');
Route::get('users.getDocumentType/{id}', 'UserController@getDocumentType');
Route::get('downloadBrief/{edition}/{brand}', 'CasoController@downloadBrief')->name('downloadBrief');
Route::get('downloadAudio/{edition}/{brand}', 'CasoController@downloadAudio')->name('downloadAudio');
Route::get('downloadVisual/{edition}/{brand}', 'CasoController@downloadVisual')->name('downloadVisual');
Route::get('downloadWhole/{edition}/{brand}', 'CasoController@downloadWhole')->name('downloadWhole');
Route::get('downloadForm/{edition}', 'CasoController@downloadForm')->name('downloadForm');
Route::post('students.store', 'StudentController@store');
Route::post('students.update/{id}', 'StudentController@update');
Route::get('students.destroy/{id}', 'StudentController@destroy');
Route::get('students.edit/{id}', 'StudentController@edit');

Route::group([
    'middleware' => 'guest',
], function () {
    Route::get('/', function () { return view('auth.login'); });
    Route::get('confirm', function () { return view('confirm'); }); 
    Route::get('verify', function () { return view('auth.verify'); });  
    Route::get('inscripciones', 'UserController@create');
    Route::get('activate/{code}', 'UserController@activate');
    Route::post('complete/{id}', 'UserController@complete');
});

Route::group([
    'middleware' => 'isnt_admin',
], function () {
    Route::post('files.store', 'FileController@store')->name('files.store');
    Route::get('files.destroy/{id}', 'FileController@destroy')->name('files.destroy');
    Route::post('answers.store', 'AnswerController@store')->name('answers.store');
    Route::patch('answers.update/{id}', 'AnswerController@update')->name('answers.update');
    Route::get('answers.history/{id}', 'AnswerController@history')->name('answers.history');
    Route::patch('updateTitle/{id}', 'AnswerController@updateTitle')->name('updateTitle');
    Route::post('storeTitle', 'AnswerController@storeTitle')->name('storeTitle');
    Route::post('sendProposal', 'UserController@sendProposal')->name('sendProposal');
    Route::get('propuesta', 'UserController@proposal')->name('proposal');
    Route::get('myAdvance', 'UserController@myAdvance')->name('myAdvance');
    Route::get('home', 'HomeController@home')->name('home');
});

Route::group([
    'middleware' => 'is_admin',
    'prefix' => 'admin'
], function () {
    Route::resource('users', 'UserController', ['only' => ['show', 'edit', 'update']]);
    Route::get('users.download', 'UserController@download')->name('users.download');
    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');
    Route::get('users.getByEdition/{id}', 'UserController@getByEdition');
    Route::get('casos.getByEdition/{id}', 'CasoController@getByEdition');
    Route::get('answers.history/{id}', 'AnswerController@history');
    Route::get('avance/{id}', 'UserController@advance')->name('advance');
    Route::get('reviews/{id}', 'UserController@reviews')->name('reviews');
    Route::get('viewScore/{user_id}/{jury_id}', 'UserController@viewScoreAdmin')->name('viewScore');
    Route::get('home', 'HomeController@adminHome')->name('home');
});

Route::group([
    'middleware' => 'is_tutor',
    'prefix' => 'tutor'
], function () {
    Route::get('profile', function () { return view('auth.profile'); })->name('profile');
    Route::post('updateAccount', 'UserController@updateAccount')->name('updateAccount');
    Route::post('changePassword', 'Auth\ChangePasswordController@store')->name('changePassword');
    Route::resource('users', 'UserController', ['only' => ['show'/*, 'edit', 'update'*/]]);
    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');
    Route::get('avance/{id}', 'UserController@advance')->name('advance');
    Route::get('home', 'HomeController@tutorHome')->name('home');
});

Route::group([
    'middleware' => 'is_jury',
    'prefix' => 'jurado'
], function () {
    Route::get('password', function () { return view('auth.passwords.update'); })->name('password');
    Route::post('updatePassword', 'Auth\ChangePasswordController@store')->name('updatePassword');
    Route::get('evaluation/{id}', 'UserController@evaluation')->name('evaluation');
    Route::post('sendScore/{id}', 'UserController@sendScore')->name('sendScore');
    Route::post('sendFeedback/{id}', 'UserController@sendFeedback')->name('sendFeedback');
    Route::post('blockScore', 'UserController@blockScore')->name('blockScore');
    Route::get('viewScore/{id}', 'UserController@viewScore')->name('viewScore');
    Route::get('home', 'HomeController@juryHome')->name('home');
});
/*
use App\Mail\TestEmail;

Route::get('/testmail', function () {
Mail::to('rbejar@preciso.pe')->send(new TestEmail(['team' => 'E2021001']));
})->name('testmail');
*/