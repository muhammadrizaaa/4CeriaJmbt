<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    // Fungsi untuk menampilkan form lokasi
    public function showForm()
    {
        return view('location_form'); // Sesuaikan dengan nama view form Anda
    }

    // Fungsi untuk menyimpan data lokasi yang dikirimkan dari form
    public function storeLocation(Request $request)
    {
        // Validasi data dari form
        $validated = $request->validate([
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kodepos' => 'required|string|max:10',
            'alamat' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        // Menyimpan data lokasi ke database
        $location = new Location();
        $location->provinsi = $validated['provinsi'];
        $location->kabupaten = $validated['kabupaten'];
        $location->kecamatan = $validated['kecamatan'];
        $location->kelurahan = $validated['kelurahan'];
        $location->kodepos = $validated['kodepos'];
        $location->alamat = $validated['alamat'];
        $location->lat = $validated['lat'];
        $location->lng = $validated['lng'];

        $location->save();

        // Redirect atau memberikan respon
        return redirect()->route('location.form')->with('success', 'Lokasi berhasil disimpan!');
    }
}
