<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'name', 'description'
    ];

    public function peoples()
    {
        return $this->hasMany(Person::class);
    }


    static public function groups()
    {
        $groups = Group::all();
        return $groups;
    }
}
