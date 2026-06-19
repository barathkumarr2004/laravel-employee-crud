<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    protected $table = 'employee'; 

    protected $fillable = ['name', 'email', 'phone', 'date'];
}