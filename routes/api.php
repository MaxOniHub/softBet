<?php

Route::group(['middleware' => ['api'],'prefix' => 'v1', 'namespace' => '\BaseApi'], function() {

    Route::post('customers', 'CustomersController@store');
    Route::get('customers/{id}', 'CustomersController@show');

    Route::post('transactions', 'TransactionsController@store');
    Route::get('transactions/{id}', 'TransactionsController@show');

});




