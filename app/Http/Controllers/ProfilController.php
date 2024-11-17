<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use App\Http\Controllers\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $houses = DB::table('house')->where('id_user', $user->id_user)->paginate(10);
        return view('profile', compact('user', 'houses'));
        // return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'update_name' => 'required|string|max:255',
            'update_email' => 'required|email|max:255',
            'update_password' => 'nullable|string|min:6',
            'update_deskripsi' => 'nullable|string|max:255',
            'update_pNumber' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->username = $request->update_name;
        $user->email = $request->update_email;
        $user->phone_number = $request->update_pNumber;
        $user->Deskripsi = $request->update_deskripsi;
        if ($request->filled('update_password')) {
            $user->password = Hash::make($request->update_password);
        }
        // $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function deleteHouse($id)
    {
        DB::table('house')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'House deleted successfully.');
    }
}
