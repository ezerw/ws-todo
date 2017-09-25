<?php

// Index
Route::get('/', function () {
    return view('index');
});

/**
 * Auth Routes
 */
Route::namespace('Auth')->group(function(){
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');

    // Register
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register');

    // Logout
    Route::post('logout', 'LoginController@logout')->name('logout');
});

/**
 * Todos Routes
 */
Route::middleware('auth')->group( function () {

    Route::get('todos', function () {
        return view('todos');
    });

    Route::prefix('api')->group(function () {

        Route::get('chart-data', 'ChartController@index');

        Route::resource('todos', 'TodosController', ['except' => [
            'create', 'show', 'edit'
        ]]);
    });
});


