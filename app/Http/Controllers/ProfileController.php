<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function setting()
    {
        return view('profile.setting', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileRequest $request)
    {
        // update profile
        auth()->user()->update($request->all());                
        return redirect()->back()->withSuccess('Record successfully update!');
    }
}
