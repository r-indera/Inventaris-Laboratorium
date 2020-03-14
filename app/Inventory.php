<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
    	'device_id', 'place_id','category_id','kode', 'status'
    ];

    public function device(){

        return $this->belongsTo(Device::class);
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function place(){

        return $this->belongsTo(Place::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrows')->withPivot(['id', 'keperluan', 'start_date', 'due_date', 'end_date']);
    }
}
