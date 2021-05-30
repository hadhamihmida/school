<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Matieres;
use App\Models\Seance;
use App\Models\profabsents;

class Profs extends Model
{
    use HasFactory;

    protected $fillable =['nom','prenom','email','adresse','tel','cin','experience','date_naissance','matiere_id'];
    use SoftDeletes;
    public function matiere()
    {
        return $this->belongsTo(Matieres::class);
    }
    public function seance()
    {
        return $this->hasMany(Seance::class);
    }
    public function absents()
    {
        return $this->hasMany(profabsents::class);
    }
    
}
