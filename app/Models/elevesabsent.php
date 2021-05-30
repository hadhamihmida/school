<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Classe;
use App\Models\eleves;
use App\Models\Seance;

class elevesabsent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['classe_id','eleve_id','seance_id','date'];
    public function eleve()
    {
        return $this->belongsTo(eleves::class,'eleve_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
}
