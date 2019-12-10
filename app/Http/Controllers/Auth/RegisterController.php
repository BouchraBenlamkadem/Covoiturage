<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
class RegisterController extends Controller
{
    var $email="";
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'max:150'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
           /// email de confirmation
    /*    $to_email = $data['email'];
        $subject = 'Email de confirmation';
        $message = 'cet email vous a était envoyé pour confirmer votre enregistrement avec cette adresse dans Mchina.com , pour confirmer veuillez entrer au lien suivant : www.http://127.0.0.1:8000/verifier';
        $headers = 'From: noreply @ company . com';
        mail($to_email,$subject,$message,$headers);
            //////////////////////////////
*/


   $email=$data['email'];
  /*   Mail::send(['text'=>'mail'],['name','admin'],function($message) use($email){
        $message->to($email)->subject("vérification de l'email");
        $message->from('bouchra.ben97@gmail.com');
    });
 */
    Mail::send([], [], function ($message) use($email) { 
    $message->to($email, 'test')
       ->subject('vérification de l\'email') 
       ->setBody('cet email vous a été envoyé pour confirmer votre enregistrement avec cette adresse dans Mchina.com , pour confirmer veuillez entrer au lien suivant : http://127.0.0.1:8000/verifier', 'text/html'); 
});


      return User::create([
            'nom' => $data['nom'],
            'age' => $data['age'],
            'photo' => 'profile.png',
            'email' => $data['email'],
            'password' =>/* Hash::make*/bcrypt($data['password']),
        ]);
    }
/*use Illuminate\Support\Facades\Auth;
    protected function guard()
{
    return Auth::guard('guard-name');
}*/
}
