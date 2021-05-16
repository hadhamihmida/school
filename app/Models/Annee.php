<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;
use App\Models\Matieres;

class Annee extends Model
{
    use HasFactory;
    protected $fillable =['nom'];

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
    public function matieres()
    {
        return $this->hasMany(Matieres::class);
    }
}
