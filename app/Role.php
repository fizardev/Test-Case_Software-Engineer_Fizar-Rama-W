<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['role'];

    public function getRouteKeyName()
    {
        return 'role';
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
