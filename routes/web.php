<?php

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

Route::get('/', 'welcomeController@show');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'logged','middleware' => 'auth'], function () {
    Route::get('/', 'welcomeController@show');

    Route::get('/home', array('uses'=>'listPage_controller@showList','as'=>'showList'));
    Route::post('/home', array('uses'=>'listPage_controller@addList','as'=>'addList'));
    Route::delete('/home/delete/{list_id}', array('uses'=>'listPage_controller@deleteList','as'=>'deleteList'));

    Route::get('/home/list/{list_id}',array('uses'=>'taskPage_controller@showTask', 'as'=>'showTask'));
    Route::post('/home/list/{list_id}',array('uses'=>'taskPage_controller@addTask', 'as'=>'addTask'));
    Route::delete('/home/list/{list_id}/delete/{task_id}',array('uses'=>'taskPage_controller@deleteTask', 'as'=>'deleteTask'));

    Route::get('/logout',function(){
        Auth::logout();
        return redirect('/');
    });

});
 