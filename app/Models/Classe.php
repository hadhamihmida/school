<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Annee;
use App\Models\eleves;
use App\Models\Seance;

class Classe extends Model
{
    use HasFactory;

    protected $fillable=['capaciter','numérotation', 'annee_id'];

    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function eleves()
    {
        return $this->hasMany(eleves::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
