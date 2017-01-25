<?php


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web','auth','admin'], 'namespace' => 'Rizalmovic\Admin\Http\Controllers'], function(){
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){
        Route::get('/', 'SettingController@getIndex')->name('index');
        Route::post('save', 'SettingController@postSave')->name('save');
    });
});