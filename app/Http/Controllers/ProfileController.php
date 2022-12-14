<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('password.confirm');
    // }

    public function setting()
    {
        return view('profile.setting', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $data = [];
        if ($request->profile_picture) {
            $request->profile_picture->move(public_path('upload'), $filename = $request->user()->id . '-avatar.jpg');
            $data['profile_picture'] = $filename;
        }

        // update profile
        auth()->user()->update(array_merge($request->all(), $data));

        return redirect()->back()->withSuccess('Record successfully update!');
    }

    public function password()
    {
        return view('profile.password')->with('user', auth()->user());
    }

    public function updatePassword(PasswordChangeRequest $request)
    {       
        auth()->user()->setPassword($request->password)->update();
        return redirect()->back()->with('success', 'Password succesfylly changed');
    }
}
