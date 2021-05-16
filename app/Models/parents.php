<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\eleves;

class parents extends Model
{
    use HasFactory;
   
    protected $fillabel=['nom_pr','prenom_pr','email','tel','adresse','nombre'];
    public function students()
    {
        return $this->hasMany(eleves::class);
    }
}
