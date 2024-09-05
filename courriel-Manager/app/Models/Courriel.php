<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courriel extends Model
{
    use HasFactory;

    protected $table = 'courriels';

    protected $fillable = ['expediteur_id', 'sujet', 'date_du_courrier', 'description', 'destinataire', 'categorie', 'importance', 'urgence', 'courrier'];

    public function expediteur()
    {
        return $this->belongsTo(User::class, 'expediteur_id');
    }

    public function destinataires()
    {
        return $this->belongsTo(User::class, 'destinataire','id');
    }
}
