<?php

Route::group(['middleware' => ['api'], 'prefix' => 'v1', 'namespace' => '\BaseApi'], function () {
    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => 'jwt-auth'], function () {

        Route::post('customers', 'CustomersController@store');
        Route::get('customers/{id}', 'CustomersController@show');
        Route::get('customers/{id}/transactions', 'CustomersController@transactions');
        Route::get('customers/{id}/transactions/{transaction_id}', 'CustomersController@transaction');

        Route::post('transactions', 'TransactionsController@store');
        Route::get('transactions/{id}', 'TransactionsController@show');
        Route::get('transactions/{id}/user', 'TransactionsController@showUser');
    });
});




