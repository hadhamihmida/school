<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Classe;
use App\Models\Matieres;


  


class Annee extends Model
{
    use HasFactory;
    protected $fillable =['nom'];
    use SoftDeletes;
//classes
    public function classes()
    {
        return $this->hasMany(Classe::class,'annee_id');
    }
    //matieres
    public function matieres()
    {
        return $this->hasMany(Matieres::class);
    }
}
