<?php

Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});

Route::get('calculator/add/{a}/{b}', \Devdojo\Calculator\Controllers\CalculatorController::class.'@add');
Route::get('calculator/subtract/{a}/{b}', \Devdojo\Calculator\Controllers\CalculatorController::class.'@subtract');
Route::get('calculator/image', \Devdojo\Calculator\Controllers\CalculatorController::class.'@image');