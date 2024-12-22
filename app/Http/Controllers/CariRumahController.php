<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\House;

class CariRumahController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = House::query();
        $query->where('id_user', '!=', $user->id);

        if ($request->filled('kota')) {
            $query->where('alamat', 'like', '%' . $request->kota . '%');
        }
        if ($request->filled('kamarTidur')) {
            $query->where('kamar_tidur', $request->kamarTidur);
        }
        if ($request->filled('kamarMandi')) {
            $query->where('kamar_mandi', $request->kamarMandi);
        }
        if ($request->filled('minPrice')) {
            $query->where('harga', '>=', str_replace('.', '', $request->minPrice));
        }
        if ($request->filled('maxPrice')) {
            $query->where('harga', '<=', str_replace('.', '', $request->maxPrice));
        }

        $houses = $query->paginate(9);

        return view('house.cariRumah')->with('flash_message', 'Pesan berhasil');

    }
}
