<?php


Route::group(['middleware' => ['api'], 'namespace' => '\BaseApi'], function () {

    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/logout', 'AuthController@logout');
    Route::get('auth/user', 'AuthController@user');

    Route::group(['middleware' => 'jwt-auth', 'prefix' => 'v1'], function () {

        Route::post('customers', 'CustomersController@store');
        Route::get('customers/{id}', 'CustomersController@show');
        Route::get('customers/{id}/transactions', 'CustomersController@transactions');
        Route::get('customers/{id}/transactions/{transaction_id}', 'CustomersController@transaction');

        Route::post('transactions', 'TransactionsController@store');
        Route::get('transactions/{id}', 'TransactionsController@show');
        Route::get('transactions/{id}/user', 'TransactionsController@showUser');
        Route::put('transactions/{id}', 'TransactionsController@update');
        Route::delete('transactions/{delete}', 'TransactionsController@delete');
        Route::get('transactions', 'TransactionsController@index');
    });
});




