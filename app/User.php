<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = []; //所有
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
