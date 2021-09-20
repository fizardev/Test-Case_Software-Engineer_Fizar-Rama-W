<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'role_id',
    ];
    protected $hidden = [
        'password',
    ];

    public function Role() {
        return $this->belongsTo(Role::class);
    }

    public function Items() {
        return $this->hasMany(Item::class);
    }

    
}
