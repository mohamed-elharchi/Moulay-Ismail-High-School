<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;


class departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'matiere_id',
        'departement_id',
        'teacher_id'
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_departments');
    }
}
