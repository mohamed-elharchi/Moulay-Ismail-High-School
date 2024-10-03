<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commnt3 extends Model
{
    protected $table = 'commnt3';

    protected $fillable = ['name', 'date', 'comment'];

    protected $dates = ['date'];

}
