<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailHouse extends Model
{
    protected $table = 'detail_house';

    protected $fillable = [
        'width',
        'length',
        'ba',
        'br',
        'floors',
        'id_house'
    ];

    public function house(){
        return $this->belongsTo(House::class, 'id_house');
    }
}
