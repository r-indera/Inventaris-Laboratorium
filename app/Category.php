<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = [
    	'name', 'ket', 'foto_alat'
    ];

    public function inventories(){

    	return $this->hasMany(Inventory::class);
    }

    public function devices(){

    	return $this->hasMany(Device::class);
    }
}
