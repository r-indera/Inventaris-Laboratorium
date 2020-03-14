<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
    	'user_id', 'inventory_id','keperluan', 'start_date', 'due_date', 'end_date', 'sk_file',
    ];

    public function user(){

    	return $this->belongsTo(User::class);
    }


    public function inventory(){

    	return $this->belongsTo(Inventory::class);
    }
}
