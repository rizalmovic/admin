<?php


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web','auth','admin'], 'namespace' => 'Rizalmovic\Admin\Http\Controllers'], function(){
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});