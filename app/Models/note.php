<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\eleves;
use App\Models\exman;

class note extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['note','moyenne','eleve_id','examen_id','remarque'];

    public function eleve()
    {
        return $this->belongsTo(eleves::class);
    }
                    
    public function examen()
    {
        return $this->belongsTo(exman::class);
    }
}
