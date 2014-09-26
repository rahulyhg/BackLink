<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /login
	 *
	 * @return Response
	 */
	public function anyIndex()
	{
		return View::make('login');
	}


	public function postCheck()
	{
		

		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, false);
		    return Redirect::to('/admin');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    Session::flash('message','Email Adresi Gerekli');
		    return Redirect::to('/login');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    Session::flash('message','Şifre Gerekli');
		    return Redirect::to('/login');
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    //echo 'Şifre Yanlış';
		    Session::flash('message','Şifre Yanlış');
		    return Redirect::to('/login');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    Session::flash('message','Kullanıcı Bulunamadı');
		    return Redirect::to('/login');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}
	}

	public function anyCreate()
	{
		try
		{
		    // Create the user
		    $user = Sentry::createUser(array(
		        'email'     => 'test@admin.com',
		        'password'  => 'asdasd',
		        'activated' => true,
		    ));

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'Kullanıcı Oluşturuldu Giriş Yapmak İçin Önceki Sayfaya Dönebilirsin.';
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
		    echo 'Group was not found.';
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /login/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function anyDestroy()
	{
		Sentry::logout();
		return Redirect::to('/login');
	}

}