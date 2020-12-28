<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ConfirmYourEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    use RegistersUsers;


    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirm_token' => Str::random(25)
        ]);
    }


    protected function registered(Request $request, $user)
    {
        Mail::to($user)->send(new ConfirmYourEmail($user));
        return redirect($this->redirectPath());
    }
}
