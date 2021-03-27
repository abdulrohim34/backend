<?php
$dir ="App\Http\Controllers";
Route::get('member',$dir.'\Doorprizes@get_member');
Route::get('winner',$dir.'\Doorprizes@get_winner');
Route::post('register',$dir.'\Doorprizes@register');
Route::post('create-winner',$dir.'\Doorprizes@create_winner');
