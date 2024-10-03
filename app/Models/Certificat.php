<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    protected $fillable = [
        'nom_complet', 'date_naissance', 'code_mssar', 'numero_telephone', 'statut',
    ];
}
