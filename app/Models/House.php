<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class House extends Model
{
    protected $table = 'house';

    protected $fillable =[
        'name',
        'price',
        'house_desc',
        'id_user'
    ];

    public $timestamps = false;
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function houseAddress(){
        return $this->hasOne(HouseAddress::class, 'id_house');
    }
    public function detailHouse(){
        return $this->hasOne(DetailHouse::class, 'id_house');
    }
}
