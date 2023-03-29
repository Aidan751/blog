<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        //
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
            'password' => bcrypt($request->password)
        ]);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }
}