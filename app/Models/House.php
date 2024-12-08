<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class House extends Model
{
    protected $table = 'house';
    protected $fillable = ['nama_rumah', 'harga', 'alamat', 'gambar_rumah', 'kamar_tidur', 'kamar_mandi', 'luas'];

    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function houseAddress():HasOne
    {
        return $this->hasOne(HouseAddress::class, 'id_house');
    }
    public function house_pic():HasOne
    {
        return $this->hasOne(HousePic::class, 'id_house');
    }
    public function detailHouse(){
        return $this->hasOne(DetailHouse::class, 'id_house');
    }
}
