<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'departement_id',
        'date',
        'period',
        'absence',
        'signature',
        'students_list',
    ];
    public function departement()
    {
        return $this->belongsTo(departement::class);
    }
}
