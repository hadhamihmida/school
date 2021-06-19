<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Classe;
use App\Models\Matieres;
use App\Models\eleves;



class exman extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='examens';
    protected $fillable=['date','classe_id','matiere_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
                    
    public function matiere()
    {
        return $this->belongsTo(Matieres::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(eleves::class,'notes');
    }

}
