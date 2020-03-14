<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    	'user_id', 'name', 'nim', 'email', 'no_telp', 'alamat', 'image_student'
    ];

    public function user(){

    	return $this->belongsTo(User::class);
    }
}
