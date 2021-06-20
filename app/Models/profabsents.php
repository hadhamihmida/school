<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seance;
use App\Models\Profs;
use App\Models\Matieres;

class profabsents extends Model
{
    use HasFactory;
    protected $fillable=['date','seance_id','profs_id','matiere_id','status'];
    use SoftDeletes;
    
    public function prof()
    {
        return $this->belongsTo(Profs::class,'profs_id');
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }
  public function matiere()
  {
      return $this->belongsTo(Matieres::class);
  }
  
}
