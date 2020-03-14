<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
    	'category_id', 'merk', 'thn_pengadaan', 'specification', 'device_foto'
    ];

    public function inventories(){

    	return $this->hasMany(Inventory::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
