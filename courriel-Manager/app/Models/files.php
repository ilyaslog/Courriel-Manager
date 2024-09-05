<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;

    public function Courriel()
    {
        return $this->belongsToMany(Courriel::class, 'courrier', 'Courriel_id');
    }
}
