<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\parents;

class eleves extends Model
{
    use HasFactory;
   

    public function parent()
    {
        return $this->belongsTo(parents::class);
    }
    
}