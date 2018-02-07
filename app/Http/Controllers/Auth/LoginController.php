<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use Exception;
use Redirect;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

  /**
   * Redirect the user to the Google authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  /**
   * Obtain the user information from Google.
   *
   *
   */
  public function handleGoogleCallback()
  {
    try {
      $user = Socialite::driver('google')->user();
    } catch (Exception $e) {
      return Redirect::to('auth/facebook');
    }
    $authUser = $this->findOrCreateUser($user);
    Auth::login($authUser, true);
    return \Redirect::to('/');
  }

  /**
   * Return user if exists; create and return if doesn't
   *
   * @param $googleUser
   * @return User
   */
  private function findOrCreateUser($googleUser)
  {
    if ($authUser = User::where('google_id', $googleUser->id)->first()) {
      return $authUser;
    }
    return User::create([
      'name' => $googleUser->name,
      'email' => $googleUser->email,
      'google_id' => $googleUser->id,
      'avatar' => $googleUser->avatar,
      'password'=>''
    ]);
  }
}
