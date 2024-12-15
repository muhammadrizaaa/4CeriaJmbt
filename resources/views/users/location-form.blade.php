@extends('layouts.app')

@section('content')
    <form action="{{ route('location.store') }}" method="POST">
        @csrf
        <div>
            <label for="provinsi">Provinsi:</label>
            <input type="text" name="provinsi" id="provinsi" value="{{ old('provinsi') }}" required>
        </div>
        <div>
            <label for="kabupaten">Kabupaten:</label>
            <input type="text" name="kabupaten" id="kabupaten" value="{{ old('kabupaten') }}" required>
        </div>
        <div>
            <label for="kecamatan">Kecamatan:</label>
            <input type="text" name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}">
        </div>
        <div>
            <label for="kelurahan">Kelurahan:</label>
            <input type="text" name="kelurahan" id="kelurahan" value="{{ old('kelurahan') }}">
        </div>
        <div>
            <label for="kodepos">Kode Pos:</label>
            <input type="text" name="kodepos" id="kodepos" value="{{ old('kodepos') }}" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" required>
        </div>
        <div>
            <label for="lat">Latitude:</label>
            <input type="text" name="lat" id="lat" value="{{ old('lat') }}" required>
        </div>
        <div>
            <label for="lng">Longitude:</label>
            <input type="text" name="lng" id="lng" value="{{ old('lng') }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
