<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $access_level = ['viewer' => 'Viewer',
        'reporter' => 'Reporter',
        'updater' => 'Updater',
        'developer' => 'Developer',
        'manager' => 'Manager'];

        return view('users.create', compact('access_level'));
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
        $request->validate([
            'username' => 'required|min:4|max:24|unique:users,username',
            'password' => 'required|min:6',
            'name' => 'required|min:4|max:255',
            'email' => 'required|unique:users,email',
            'access_level' => 'required'
        ]);

        $user = new User;
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->access_level = $request->input('access_level');
        $user->is_enabled = true;
        $user->save();

        return redirect('/users/' . $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $access_level = ['viewer' => 'Viewer',
        'reporter' => 'Reporter',
        'updater' => 'Updater',
        'developer' => 'Developer',
        'manager' => 'Manager'];

        return view('users.edit', compact('user','access_level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'username' => 'required|min:4|max:24|unique:users,username,' . $user->id,
            'password' => 'required|min:6',
            'name' => 'required|min:4|max:255',
            'email' => 'required|unique:users,email,' . $user->id,
            'access_level' => 'required'
        ]);

        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->access_level = $request->input('access_level');
        $user->is_enabled = true;
        $user->save();
        
        return redirect('/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect('/users');
    }
}
