<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\parents;
use App\Models\Classe;
use App\Models\exman;

class eleves extends Model
{
    use HasFactory;
    use SoftDeletes;
   protected $fillable =[
       'nom_el',
       'prenom_el',
       'date_naiss',
       'image',
       'parent_id',
       'classe_id',
       ];
   // protected $guarded=[]; // this is wrong, either use $fillable or $guarded, not both.
    public function parent()
    {
        return $this->belongsTo(parents::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function exmans(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this
            ->belongsToMany(exman::class,'notes','eleve_id','examen_id')
            ->withPivot(['note','remarque']);
    }

    public function notes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\note::class,'eleve_id');
    }

}
