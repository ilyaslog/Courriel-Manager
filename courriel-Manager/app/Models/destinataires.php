<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    use HasFactory;

    protected $table = 'destinataires'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // Replace with actual columns in your 'destinataires' table
        'email',
    ];

    /**
     * The courriels that belong to the destinataire.
     */
}
