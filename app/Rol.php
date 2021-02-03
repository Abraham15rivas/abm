<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $tabel = 'rols';

    protected $fillable = [
        'name', 'description'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    static public function roles()
    {
        $roles = Rol::all();
        return $roles;
    }
}
