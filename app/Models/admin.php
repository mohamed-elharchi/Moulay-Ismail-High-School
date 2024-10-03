<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;


class Admin extends Model implements Authenticatable

{
    use AuthenticatableTrait;

    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function teacher()
    {
        return $this->hasOne(teacher::class);
    }
    
}
