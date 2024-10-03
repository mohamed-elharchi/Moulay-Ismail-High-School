<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisation_du_temps extends Model
{
    use HasFactory;
    protected $fillable = ['departement_id', 'image'];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id');
    }
}
