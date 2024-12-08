<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\House;

class HomeController extends Controller
{
    public function index()
    {
        $flashMessage = session('flash_message');
        if ($flashMessage) {
            session()->forget('flash_message');
        }

        // $houses = House::orderBy('harga', 'desc')->limit(3)->get();
        $houses = House::all();
        // dd($houses->house_pic->file_name);
        return view('users/home', compact('flashMessage', 'houses'));
    }

    public function cariRumah()
    {
        return view('cariRumah');
    }

    public function tambahDataRumah()
    {
        return view('tambahDataRumah');
    }

    public function detailRumah()
    {
        return view('detailRumah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
