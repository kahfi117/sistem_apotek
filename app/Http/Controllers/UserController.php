<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('backend.user.all', compact('users'));
    }

    public function add()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = $request->id;

        if($request->password != null){
            User::findOrFail($userId)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);
        }else{
            User::findOrFail($userId)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.index')->with($notification);

    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        $notification = array(
             'message' => 'User Deleted Successfully',
             'alert-type' => 'success'
         );

         return redirect()->back()->with($notification);

    }
}
