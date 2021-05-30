<?php

namespace App\Models;
use App\Models\Profs;
use App\Models\Classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seance extends Model
{
    use HasFactory;
    protected $fillable =['classe_id','profs_id','jour','heure_debut','heure_fin'];
    //protected $guarded=[];
    use SoftDeletes;
    public function prof()
    {
        return $this->belongsTo(Profs::class,'profs_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
