<?php

namespace App\Http\Controllers;

use App\Models\DetailHouse;
use App\Models\House;
use App\Models\HouseAddress;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function displayAll(){
        $houses = House::with('user')->get();
        return view('house.houses-list', compact('houses'));
    }
    public function formCreateHouse(){
        return view('house.house-create');
    }
    public function createHouse(Request $request){
        $userId = Auth::id();
        $request->validate([
            'name'=>['required', 'string', 'max:255'],
            'price'=>['required', 'numeric'],
            'house_desc'=>['required', 'string', 'max:555']
        ]);

        House::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'house_desc'=>$request->house_desc,
            'id_user'=>$userId
        ]);
        return redirect()->route('houses-list');
    }
    public function formEditHouse($id){
        $house = House::find($id);
        return view('house.house-edit', compact('house'));
    }
    public function editHouse($id, Request $request){
        $request->validate([
            'name'=>['required'. 'string', 'max:255'],
            'price'=>['required', 'numeric', 'max:17'],
            'house_desc'=>['required', 'string']
        ]);
        $pushHouse = House::findOrFail($id);

        $pushHouse->name=$request->name;
        $pushHouse->price=$request->price;
        $pushHouse->house_desc=$request->house_desc;
        $pushHouse->save();
        
        return redirect()->route('houses-list');
    }

    public function destroyHouse(House $house){
        try {
            $house->delete();
            return redirect()->route('houses-list');
        } catch (Exception $e) {
            return redirect()->route('houses-list')->with('error', 'An error occured '.$e->getMessage());
        }
    }
    public function displayDetail($idHouse){

        $house = House::with('houseAddress', 'detailHouse')->find($idHouse);

        // return $house;
        return view('house.house-detail', compact('house'));
    }
    public function formCreateDetail($id){
        return view('house.house-detail-create', compact('id'));
    }
    public function createDetail(Request $request){
        $request->validate([
            'width'=>['required', 'numeric', 'max_digits:4'],
            'length'=>['required', 'numeric', 'max_digits:4'],
            'ba' =>['required', 'numeric', 'max_digits:2'],
            'br' =>['required', 'numeric', 'max_digits:2'],
            'floors' =>['required', 'numeric', 'max_digits:2']
        ]);
        DetailHouse::create([
            'width'=>$request->width,
            'length'=>$request->length,
            'ba'=>$request->ba,
            'br'=>$request->br,
            'floors'=>$request->floors,
            'id_house'=>$request->id_house
        ]);

        return redirect()->route('house.detail',$request->id_house);

    }

    public function formEditDetail($id){
        $detailHouse = DetailHouse::find($id);
        return view('house.house-detail-edit', compact('detailHouse'));
    }

    public function editDetail(Request $request, $id){
        $request->validate([
            'width'=>['required', 'numeric', 'max_digits:4'],
            'length'=>['required', 'numeric', 'max_digits:4'],
            'ba' =>['required', 'numeric', 'max_digits:2'],
            'br' =>['required', 'numeric', 'max_digits:2'],
            'floors' =>['required', 'numeric', 'max_digits:2']
        ]);

        $pushEdit = DetailHouse::findOrFail($id);
        $pushEdit->width = $request->width;
        $pushEdit->length = $request->length;
        $pushEdit->ba = $request->ba;
        $pushEdit->br = $request->br;
        $pushEdit->floors = $request->floors;
        $pushEdit->save();

        return redirect()->route('house.detail', $request->id_house);
    }

    public function formCreateAddress($id){
        return view('house.house-address-create', compact('id'));
    }


    public function createAddress(Request $request){
        $request->validate([
            'street_name'=>['required', 'string', 'max:255'],
            'kab_kota' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'max_digits:255'],
        ]);
        HouseAddress::create([
            'street_name' => $request->street_name,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kab_kota' => $request->kab_kota,
            'province' => $request->province,
            'postal_code' => $request->postal_code,
            'coordinate' => $request->lat .", ". $request->lng,
            'id_house' => $request->id_house,
        ]);
        return redirect()->route('house.detail', $request->id_house);
    }
    public function destroyAddress(HouseAddress $id){
        $idHouse = $id->id_house;
        // return $idHouse;
        try {
            $id->delete();
            return redirect()->route('houses.detail',$idHouse);
        } catch (Exception $e) {
            return redirect()->route('houses.detail',$idHouse)->with('error', 'An error occured '.$e->getMessage());
        }
    }
    public function displayMap(){
        $initialMarkers = [
            
        ];
        return view('dashboard', compact('initialMarkers'));
    }
}
