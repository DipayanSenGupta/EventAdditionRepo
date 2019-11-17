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


Route::resource('menus', 'MenuController');
Route::resource('items', 'ItemController');
Route::resource('event-menus', 'EventMenuController');
Route::resource('types', 'TypeController');
Route::post('/types/action','TypeController@action')->name('types.action');


Route::post('/menus/menu-change-action', 'MenuController@action')->name('menus.action');
Route::post('/event_menus/menu-change-action', 'EventMenuController@action')->name('eventMenus.action');


