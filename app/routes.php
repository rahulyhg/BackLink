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
*
/*
Route::get('/', function()
{
	return View::make('hello');
});//Route::any('/check', array('as' => 'panel', 'uses' => 'HomeController@getIndex'));
*/
Route::controller('/login', 'LoginController');
Route::group(array('before' => 'doLogin'), function()
{
Route::any('/', array('as' => 'check', 'uses' => 'HomeController@getIndex'));
Route::controller('/check', 'HomeController');
});



Route::filter('doLogin', function () {
    

		if (!Sentry::check())
		{
    	Session::flash('message','Giriş Yapmalısın');
    	return Redirect::to('/login');
		}

});