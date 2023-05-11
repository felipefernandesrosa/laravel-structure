<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    Route::get('healthcheck', '\App\Core\Http\Controllers\HealthController@check');

    Route::group(['prefix' => 'companies'], function(){
        Route::get('/', 'CompanyController@listCompanies');
    });
});
