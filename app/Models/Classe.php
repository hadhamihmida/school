<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Annee;
use App\Models\eleves;
use App\Models\Seance;
use App\Models\exman;

class Classe extends Model
{
    use HasFactory;

    protected $fillable=['capaciter','numérotation', 'annee_id'];
    use SoftDeletes;
    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function eleves()
    {
        return $this->hasMany(eleves::class);
    }
                    //seances
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function examens()
    {
        return $this->hasMany(exman::class);
    }
}
