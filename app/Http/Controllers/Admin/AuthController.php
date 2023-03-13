<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers\Admin
 */
class AuthController extends Controller
{

    public function index()
    {
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);

        if(auth("admin")->attempt($data)){
            return redirect(route("admin.products.index"));
        }

        return redirect(route("admin.login"))->withErrors((["email" => trans('auth.email')]));
    }
    public function logout()
    {
        auth("admin")->logout();

        return redirect(route("home"));
    }
}
