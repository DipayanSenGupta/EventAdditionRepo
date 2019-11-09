<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::resource('events', 'EventController');
Route::resource('menus', 'MenuController');
Route::resource('items', 'ItemController');
Route::post('/menus/menu-change-action', 'MenuController@action')->name('menus.action');;
Route::post('/events/menu-change-action', 'EventController@action')->name('events.action');
Route::delete('/events/demoItemDelete/{id}', 'EventController@itemDel')->name('events.itemDel');



