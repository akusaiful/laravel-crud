<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('password.confirm');
    }

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
}
