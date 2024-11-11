<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseAddress extends Model
{
    protected $table = 'house_address';
    public $timestamps = false;

    protected $fillable = [
        'coordinate',
        'street_name',
        'kelurahan',
        'kecamatan',
        'kab_kota',
        'province',
        'postal_code',
        'id_house'
    ];

    public function house(){
        return $this->belongsTo(House::class, 'id_house');
    }

}
