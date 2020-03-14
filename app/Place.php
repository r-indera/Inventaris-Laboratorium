<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
    	'name', 'ket', 'foto_lab'
    ];

    public function inventories(){

    	return $this->hasMany(Inventory::class);
    }
}
