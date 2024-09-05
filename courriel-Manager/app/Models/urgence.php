<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urgence extends Model
{
    use HasFactory;

    protected $table = 'urgences';

    protected $fillable = ['id', 'nom'];

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Urgence::create([
            'nom' => $request->nom,
        ]);

        return redirect()->back()->with('success', 'Urgence created successfully.');
    }
}
