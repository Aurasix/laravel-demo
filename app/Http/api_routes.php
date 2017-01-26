<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/

Route::resource('users', 'UserAPIController');

Route::resource('password-resets', 'PasswordResetAPIController');

Route::resource('sessions', 'SessionAPIController');

Route::resource('settings', 'SettingAPIController');

Route::resource('contact-messages', 'ContactMessageAPIController');

Route::resource('articles', 'ArticleAPIController');

Route::resource('categories', 'CategoryAPIController');

Route::resource('tags', 'TagAPIController');

Route::resource('comments', 'CommentAPIController');

Route::resource('pages', 'PageAPIController');

Route::resource('sections', 'SectionAPIController');

Route::resource('menus', 'MenuAPIController');
