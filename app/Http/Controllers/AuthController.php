<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedIn');
    }

    public function signUpView()
    {
        Session::put('title', "Sign Up");
        return view('auth.sign-up');
    }

    public function loginView()
    {
        Session::put('title', "Login");
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $body = json_decode($request->getContent());
        $email =  isset($body->email) ? $body->email : "";
        $password =  isset($body->password) ? $body->password : "";
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                Session::put('loginId',$user->id);
                Session::put('loginEmail', $user->email);
                return Response::json([
                    'error' => false,
                    'message' => "login successful",
                ],200);
            } else {
                return Response::json([
                    'error' => true,
                    'message' =>$user->id,
                ],400);
            }
        }
        return Response::json([
            'error' => true,
            'message' => "invalid email",
        ], 404);
    }

    public function logout(Request $request) {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
