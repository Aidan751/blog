<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.profile.index', ['user' => auth()->user()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->profile->update([
            'about' => $request->about,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ]);

        if ($request->hasFile('avatar')) {
            $imageName = time() . $request->avatar->extension();

            $avatar = $request->avatar->storeAs('avatars', $imageName);

            $user->profile->avatar = $avatar;

            $user->profile->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}