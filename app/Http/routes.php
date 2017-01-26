<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'HomeController@home'
]);

Route::group(['middleware' => ['translation']], function()
{
    /*
    |--------------------------------------------------------------------------
    | Auth routes
    |--------------------------------------------------------------------------
    */

    Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    /*
    |--------------------------------------------------------------------------
    | API routes
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
        Route::group(['prefix' => 'v1'], function () {
            require config('infyom.laravel_generator.path.api_routes');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Admin routes
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function()
    {
        Route::get('/', function(){
            return redirect()->route('dashboard');
        });

        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

        Route::group(['prefix' => 'profile'], function()
        {
            Route::get('/', ['as' => 'admin.profile.index', 'uses' => 'HomeController@profile']);
            Route::get('edit', ['as' => 'admin.profile.edit', 'uses' => 'HomeController@editProfile']);
            Route::patch('update', ['as' => 'admin.profile.update', 'uses' => 'HomeController@updateProfile']);
            Route::get('change-password', ['as' => 'admin.profile.changePassword', 'uses' => 'HomeController@changePassword']);
            Route::patch('update-password', ['as' => 'admin.profile.updatePassword', 'uses' => 'HomeController@updatePassword']);
            Route::patch('update-photo', ['as' => 'admin.profile.updatePhoto', 'uses' => 'HomeController@updatePhoto']);
        });

        Route::group(['prefix' => 'settings'], function()
        {
            Route::get('/', ['as' => 'admin.settings.index', 'uses' => 'HomeController@settings']);
            Route::get('edit', ['as' => 'admin.settings.edit', 'uses' => 'HomeController@editSettings']);
            Route::patch('update', ['as' => 'settings.update', 'uses' => 'HomeController@updateSettings']);
        });

        #Translations
        Route::controller('translations', 'TranslationController');

        #Management
        Route::post('users/remove-photo', ['as' => 'admin.users.removePhoto', 'uses' => 'UserController@removePhoto']);
        Route::resource('users', 'UserController');
        Route::resource('password-resets', 'PasswordResetController');
        Route::resource('sessions', 'SessionController');
        Route::resource('contact-messages', 'ContactMessageController');

        #Blog
        Route::resource('articles', 'ArticleController');
        Route::resource('categories', 'CategoryController');

        #CMS
        Route::resource('pages', 'PageController');
        Route::get('pages/{pageId}/sections/show/{id}', ['as' => 'admin.sections.show', 'uses' => 'SectionController@show']);
        Route::get('pages/{pageId}/sections/create', ['as' => 'admin.sections.create', 'uses' => 'SectionController@create']);
        Route::post('pages/sections/store', ['as' => 'admin.sections.store', 'uses' => 'SectionController@store']);
        Route::get('pages/{pageId}/sections/edit/{id}', ['as' => 'admin.sections.edit', 'uses' => 'SectionController@edit']);
        Route::patch('pages/sections/update/{id}', ['as' => 'admin.sections.update', 'uses' => 'SectionController@update']);
        Route::delete('pages/sections/destroy/{id}', ['as' => 'admin.sections.destroy', 'uses' => 'SectionController@destroy']);

        Route::resource('menus', 'MenuController');
        Route::resource('menu-items', 'MenuItemController');
    });
});
