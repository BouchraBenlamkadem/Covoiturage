<?php

namespace App\Http\Controllers\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
/*use Illuminate\Support\Facades\Auth;
    protected function guard()
{
    return Auth::guard('guard-name');
}*/
}







/*

use Illuminate\Support\Facades\Auth;
// Get the currently authenticated user...
$user = Auth::user();

// Get the currently authenticated user's ID...
$id = Auth::id();



// check if logged in
use Illuminate\Support\Facades\Auth;

if (Auth::check()) {
    // The user is logged in...
}


// auth necessaire pour acces:
Illuminate\Auth\Middleware\Authenticate
Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');

//ou à partir d'un controler
public function __construct()
{
    $this->middleware('auth');
}
//else :function in app/Http/Middleware/Authenticate.php:
protected function redirectTo($request)
{
    return route('login');
}


//logout
use Illuminate\Support\Facades\Auth;

Auth::logout();
*/
