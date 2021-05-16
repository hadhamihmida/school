<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profs;
use App\Models\Annee;

class Matieres extends Model
{
    use HasFactory;
    protected $fillable=['nom','annee_id','niveau','nombre'];

    public function profs()
    {
        return $this->hasMany(profs::class);
    }
    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }
    
}
