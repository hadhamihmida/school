<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\matieres;

class Profs extends Model
{
    use HasFactory;
    protected $fillable =['nom','prenom','email','adresse','tel','cin','specialite','experience','date_naissance','matiere_id'];
    
    public function matiere()
    {
        return $this->belongsTo(Matieres::class);
    }
    
    
}
