<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'user_id', 'name', 'nip', 'email', 'jabatan', 'no_telp', 'alamat', 'image_employee',
    ];

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
