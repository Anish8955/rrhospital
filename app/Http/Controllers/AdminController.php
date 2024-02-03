<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */

    public function adduser()
    {
        return view('admin.usermanagement.adduser');
    }

    public function listusers()
    {
        $users = User::all();
        return view('admin.usermanagement.listuser', ['users' => $users]);
    }

    public function adduserpost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'user_type' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);
        return redirect()->route('admin.dashboard');

    }




    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    
        // Redirect back to user list or other appropriate page
        return redirect()->route('listuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * 
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * 
     */
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usermanagement.edituser', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Update user information based on the submitted form data
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Save the updated user information
        $user->save();

        // Redirect back to user list or other appropriate page
        return redirect()->route('listuser');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * 
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * 
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
