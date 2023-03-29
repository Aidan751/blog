<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->profile()->create();

        return redirect(route('users.index'))->with('success', 'User created successfully');
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
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.create', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // update user permission
        if ($user->admin == 1) {
            $user->admin = 0;
        } else {
            $user->admin = 1;
        }

        $user->save();

        return redirect(route('users.index'))->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kill($id)
    {

        $user = User::withTrashed()->where('id', $id)->first();
        if ($user->trashed()) {
            $user->forceDelete();
            $user->profile->deleteImage();
            $user->profile->forceDelete();

        } else {
            $user->delete();
        }

        return redirect(route('users.index'))->with('success', 'User deleted successfully');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();


        return view('admin.users.index')->with('users', $users);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->restore();

        return redirect(route('users.index'))->with('success', 'User restored successfully');
    }

    public function permissions($id)
    {
        $user = User::where('id', $id)->first();
        // update user permission
        if ($user->is_admin == 1) {
            $user->is_admin = 0;
        } else {
            $user->is_admin = 1;
        }

        $user->save();

        return redirect(route('users.index'))->with('success', 'User updated successfully');
    }
}