<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\TaskController@getdata')->name('main');


Route::get('/add', function () {
    return view('addtask', [
        'pagename'=>"Добавить задачу"
    ]);
})->name('add');

Route::post('/task/submit', 'App\Http\Controllers\TaskController@create');

Route::get('/task/update/{id}', 'App\Http\Controllers\TaskController@updateform')->name('update');

Route::get('/task/delete/{id}', 'App\Http\Controllers\TaskController@delete')->name('delete');

Route::post('/task/updatesubmit', 'App\Http\Controllers\TaskController@updatesubmit')->name('updatesubmit');
