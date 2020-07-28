<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

foreach(config('cms.locales.codes', []) as $code) {
    Route::prefix($code)
        ->middleware(['locale', 'bindings'])
        ->namespace('\Vegacms\Cms\Http\Controllers')
        ->group(function () {
            Route::middleware('auth:api')->get('/user', function (Request $request) {
                return $request->user();
            });
            Route::get('/admin/index', 'Api\Admin\IndexController@data')->name('api-admin.index')->middleware('admins');
            Route::delete('/admin/destroy', 'Api\Admin\DeleteController@destroy')->name('api-admin.destroy')->middleware('admins');
            Route::get('/menu', 'Api\MenuController@getData')->name('api.menu-data');
            Route::get('/derived-input-data', 'Api\DerivedDataController@getModelsData')->name('api.derived-input-data')->middleware('admins');
            Route::get('/get-active-locales', 'Api\LocalesController@getActiveLocales')->name('api.get-active-locales');
            Route::post('/set-locale', 'Api\LocalesController@setLocale')->name('locales.set-locale');
        });
}

