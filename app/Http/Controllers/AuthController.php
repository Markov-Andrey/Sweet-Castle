<?php

namespace App\Http\Controllers;

use App\Actions\ForgotPasswordAction;
use App\Actions\RegisterUserAction;
use App\Http\Requests\Auth\AuthForgotRequest;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function login(AuthLoginRequest $request)
    {
        $data = $request->validated();

        if(auth("web")->attempt($data)){
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors((["email" => trans('auth.email')]));
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }

    public function register(AuthRegisterRequest $request, RegisterUserAction $registerUserAction)
    {
        $data = $request->validated();

        $user = $registerUserAction($data);

        if($user){
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }

    public function forgot(AuthForgotRequest $request, ForgotPasswordAction $forgotPasswordAction)
    {
        $data = $request->validated();

        $forgotPasswordAction($data);

        return redirect(route("home"));
    }


}
