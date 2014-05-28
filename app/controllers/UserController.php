<?php

class UserController extends BaseController {

	/**
	 * login page
	 * @return void
	 */
	public function login()
	{
		return View::make('users.login')
						->with('title', 'Log in');
	}

	/**
	 * process to login a user
	 * @return void
	 */
	public function doLogin()
	{
		$rules = array
		(
	    	'email' 	=> 'required|email',
	    	'password' 	=> 'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::route('login')
								->withInput()
								->withErrors($validation);
		else
		{
			$credentials = array
			(
				'email'		=>	Input::get('email'),
				'password'	=>	Input::get('password')
			);

			if(Auth::attempt($credentials))
			{
				Session::put('role', Auth::user()->role_id);
			    return Redirect::route('home');
			}
			else
				return Redirect::route('login')
									->withInput()
									->with('error', 'Error in Email Address or Password.');
		}
	}

	/**
	 * logout a user
	 * @return void
	 */
	function logout()
	{
		Auth::logout();
		Session::forget('role');

		return Redirect::route('login')
						->with('success', 'You have been logged out.');
	}

	public function register()
	{
		return View::make('users.register')
						->with('title', 'Register');
	}



	public function doRegister()
	{
		//return Input::all();


	
		$rules = array
		(
	    	'username'	=>	'required|min:3|max:15',
	    	'email' 	=> 'required|email|unique:users',
	    	'password' =>'Required|Confirmed',
			'password_confirmation' =>'Required',
			'age'	=>	'Required',
			'phone'	=>	'Required',
			'agree'	=>	'Required'

		);
		$validation = Validator::make(Input::all(), $rules);
		
		if($validation->fails())
			return Redirect::route('register')
								->withInput()
								->withErrors($validation);
		else
		{
			
				$user = new User;
				$user->user_name      = Input::get('username');
				$user->email      = Input::get('email');
				$user->password      = Hash::make(Input::get('password'));
				$user->age        = Input::get('age');
				$user->phone_number 	=	Input::get('phone');
				$user->role_id 	=	2;


				if($user->save())
			    	return Redirect::route('login')
			    					->with('success', "Account Created successfully.");
				else
					return Redirect::back()->withInput()->withErrors($validation)->with('error', 'Some error occured. Try again.');
		}
			

									
		
	}


	function home(){
		return View::make('users.home')
						->with('title', 'Home');
	}

	function guest(){
		return View::make('users.public')
						->with('title', 'Home');
	}
}