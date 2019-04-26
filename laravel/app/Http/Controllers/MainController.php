<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use App\User;
class MainController extends Controller
{
    function index()
    {
     return view('login');
    }
    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required'
     ],[
        'email.required' => 'The email field is required.',
        'password.required'=>'The password field is required.',
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

    if(Auth::attempt($user_data))
        {
            return view('layouts.admin');
           
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }


    function logout()
    {
     Auth::logout();
     return redirect('login');
    }

    public function create()
    {
        return view('register');
    }
    
    public function checkRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:50',           
            'email' => 'required|email|min:6|max:64|unique:users',
            'password' => 'required|min:6|max:64',
            'password_confirmation' => 'required|same:password',
        ],[
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 4 characters.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.max' => 'The email may not be greater than 64 characters.',
            'email.min' => 'The email must be at least 6 characters.',
            'email.email' => 'Wrong email format.',
            'email.unique' => 'Email existed.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters',
            'password.max' => 'The password may not be greater than 64 characters.',
            'password_confirmation.required' => 'The comfirm password field is required.',
            'password_confirmation.same' => 'The password does not match.',
        ]);
        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );
        $user->remember_token = $request->_token;
        $user->save();

        
        // auth()->login($user);
        
        return redirect()->to('/login')->with('success','Register successfully!');
    }
}
