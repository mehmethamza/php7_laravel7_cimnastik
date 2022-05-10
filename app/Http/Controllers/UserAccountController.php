<?php

namespace App\Http\Controllers;

use App\Models\UsersDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
            "phone" => "required|min:10|max:10|numeric"
        ]);
        $newUser = new User();
        $newUser -> name = $request->name;
        $newUser -> role = "seller";
        $newUser -> email = $request->email;
        $newUser -> password = Hash::make($request->password);
        $newUser -> save();
        $newUserDetails = new UsersDetails();
        $newUserDetails -> user_id = $newUser->id;
        $newUserDetails -> phone = $request -> phone;
        $newUserDetails -> save();
        return back()->withErrors("errors");

    }
    public function login(Request $request)
    {
        $credentails = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $status = auth()->attempt($credentails,$request->remember);
        if ($status) {
            return redirect()->route("dashboard.index");
        }
        else {
            return redirect()->route("home")
            ->with("alert","Kullanıcı adınız veya şifreniz hatalı")
            ->with("alert_type","error");
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route("home");
    }
}
