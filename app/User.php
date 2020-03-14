<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employee(){

        return $this->hasOne(Employee::class);
    }

    public function student(){

        return $this->hasOne(Student::class);
    }

    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'borrows')->withPivot(['id', 'keperluan', 'start_date', 'due_date', 'end_date']);
    }
}
