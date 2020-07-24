<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

	
	protected $redirectTo = '/main';

  
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
	
	public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
		$authUser = $this->findOrCreateUser($user,$provider);
		Auth::login($authUser,true);
		return redirect($this->redirectTo);
		
    }
	
	public function findOrCreateUser($user, $provider)
	{
		$authUser = User::where('provider_id', $user->id)->first();
		if($authUser){
			return $authUser;
		}else{
			return User::create([
				'name'			=>$user->name,
				'email'			=>$user->email,
				'provider'		=>$provider,
				'provider_id'	=>$user->id,
			]);
		}
	}
}
