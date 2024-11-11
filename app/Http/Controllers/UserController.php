<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function display(){
        $users = User::all();
        return view('users.users-list', compact('users'));
    }
    public function formEdit($id){
        $users = User::find($id);
        return view('users.user-edit', compact('users'));
    }
    public function editUser(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$id],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);
        $push = User::find($id);
        $push->name = $request->name;
        $push->username = $request->username;
        $push->email = $request->email;
        $push->save();
        return redirect()->route('users.list');
    }
}
