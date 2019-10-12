<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coustomer extends Model
{
    protected $fillable = ['first_name','last_name','email','password','phone','address'];
}
