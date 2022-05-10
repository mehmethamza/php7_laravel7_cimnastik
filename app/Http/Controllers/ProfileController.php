<?php

namespace App\Http\Controllers;

use App\Models\UsersDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = auth()->user();
        return view("dashboard.profile.index",compact("user"));
    }
    public function updateDetails(Request $request,FileController $file)
    {
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->save();
        $details = UsersDetails::where("user_id",$user->id)->first();
        $details->twitter = $request->twitter;
        $details->facebook = $request->facebook;
        $details->instagram = $request->instagram;
        $details->youtube = $request->youtube;
        $details->phone = $request->phone;
        $details->linkedin = $request->linkedin;
        if (!empty($request -> image) ) {
            $file -> deleteImage($details->image);
            $details->image = $file->uploadImage($request -> image);

        }
        $details->save();
        return redirect()->route("dashboard.profile.show")
        ->with("alert","Profiliniz başarıyla güncelleştirildi.")
        ->with("alert_type","success");
    }
    public function updateAccountPassword(Request $request)
    {
       if ($request->newpassword == $request->confirmnewpassword) {
           if (Hash::check($request->lastpassword,auth()->user()->password)) {
               $user = User::find(auth()->user()->id);
               $user->password = Hash::make($request->newpassword);
               $user->save();
           }
       }
    }
}
