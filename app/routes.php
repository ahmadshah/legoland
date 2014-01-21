<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    Auth::loginUsingId(2);
    return Auth::roles();
});

Route::get('/administrator', function()
{
    Auth::loginUsingId(1);
    return Auth::roles();
});

Route::get('foobar', ['before' => "acl:view", function()
{
    echo 'View Foobar';
}]);

Route::get('foobar/manage', ['before' => "acl:manage", function()
{
    echo Str::title('manage') . ' Foobar';
}]);

