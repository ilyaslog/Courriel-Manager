<?php

namespace App\Http\Controllers\Courriels;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'categorie' => 'required|string|max:255',
        ]);

        // Create a new instance of Importance model
        $categorie = new Categorie();

        // Assign values from the request to the model instance
        $categorie->nom = $request->input('categorie');

        // Save the instance to the database
        $categorie->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Importance created successfully.');
    }

    public function destroy(Categorie $categorie = null)
    {
        if (!$categorie) {
            return redirect()->back()->with('error', 'Categorie not found.');
        }

        $categorie->delete();

        return redirect()->back()->with('success', 'Categorie deleted successfully.');
    }
}
