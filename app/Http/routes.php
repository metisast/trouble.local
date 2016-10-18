<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event', function () {
    event(
        new \App\Events\TestEvent()
    );
});

Route::get('/home', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

Route::post('/home', [
    'uses' => 'HomeController@store',
    'as' => 'home.store'
]);

Route::get('/success', [
    'uses' => 'HomeController@success',
    'as' => 'home.success'
]);

Route::auth();

Route::group(['middleware' => 'auth'], function(){


});


Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin', [
        'uses' => 'AdminController@index',
        'as' => 'admin.index'
    ]);

    Route::get('/admin/success', [
        'uses' => 'AdminController@indexSuccess',
        'as' => 'admin.index.success'
    ]);

    Route::get('/admin/trash', [
        'uses' => 'AdminController@indexTrash',
        'as' => 'admin.index.trash'
    ]);

    Route::get('/admin/{id}/show', [
        'uses' => 'AdminController@show',
        'as' => 'admin.show'
    ]);

    Route::get('/admin/{id}/success', [
        'uses' => 'AdminController@success',
        'as' => 'admin.success'
    ]);

    Route::get('/admin/{id}/soft-delete', [
        'uses' => 'AdminController@softDelete',
        'as' => 'admin.softDelete'
    ]);

    Route::get('/admin/{id}/delete', [
        'uses' => 'AdminController@delete',
        'as' => 'admin.delete'
    ]);

});
