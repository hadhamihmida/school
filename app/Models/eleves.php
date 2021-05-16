<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\parents;
use App\Models\Classe;

class eleves extends Model
{
    use HasFactory;

   protected $fillabel =['nom-el', 'prenom_el', 'date_naiss', 'image','parent_id','classe_id'];

    public function parent()
    {
        return $this->belongsTo(parents::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    
}
