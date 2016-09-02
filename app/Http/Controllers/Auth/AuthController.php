<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
//        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'company_name' => 'required',
//            'password' => 'required|min:6|confirmed',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        User::create([
            'name' => $data['name'],
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return response()->json(['done' => true]);
    }

    public function ajaxRegister()
    {
        $inputData = Input::get();
        $formFields = $inputData;
        $userData = array(
            'name' => $formFields['name'],
            'company_name' => $formFields['company_name'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'password_confirmation' => $formFields['password_confirmation'],
        );
        $rules = array(
            'name'         => 'required',
            'password'     => 'required|min:6|confirmed',
            'company_name' => 'required',
            'email'        => 'required|email|unique:users',
        );
        $validator = Validator::make($userData, $rules);
        if ($validator->fails())
            return Response::json(array(
                'done' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            $password = $userData['password'];

            $userData['password'] = Hash::make($userData['password']);
            unset($userData['password_confirmation']);

            $user = new User();
            $user->setRawAttributes($userData);

            $project_settings = Session::get('project_model');
            $role_id          = $project_settings['role_id'];
            unset($project_settings['role_id']);

            Session::put('project_model', $project_settings);
            $user->setAttribute('role_id', $role_id);
            if ($user->save()) {
                Auth::login($user);
                //return success  message
                return Response::json(array(
                    'done' => true,
                    'email' => $userData['email'],
                    'password' => $password
                ));
            }
        }
    }
}
