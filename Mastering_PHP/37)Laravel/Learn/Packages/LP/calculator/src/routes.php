<?php



Route::get('calculator',function(){
    echo "Hello from the calculator packages";
});

Route::get('message','LP\Calculator\CalculatorController@message');
Route::get('sum/{a}/{b}','LP\Calculator\CalculatorController@sum');
Route::get('sub/{a}/{b}','LP\Calculator\CalculatorController@sub');
Route::get('mul/{a}/{b}','LP\Calculator\CalculatorController@mul');
Route::get('div/{a}/{b}','LP\Calculator\CalculatorController@div');




?>