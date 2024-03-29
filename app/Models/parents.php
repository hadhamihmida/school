<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\eleves;

class parents extends Model
{
    use HasFactory;

    protected $fillable=['nom_pr','prenom_pr','email','tel','adresse','cin','nombre'];

    //protected $guarded=[];
    use SoftDeletes;
    
    public function eleve()
    {
        return $this->hasMany(eleves::class);
    }
}
