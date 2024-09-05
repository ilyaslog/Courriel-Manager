<?php

namespace App\Http\Controllers\Courriels;

use App\Models\Urgence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrgenceController extends Controller
{
    /**
     * Affiche la liste de toutes les urgences.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $urgences = $request->input('urgences', []);

        $urgences = Urgence::all();

        return view('ParametrageCourrier', compact('urgences'));
    }

    /**
     * Stocke une nouvelle urgence.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'NomUrgence' => 'required|string|max:255',
        ]);


        Urgence::create([
            'nom' => $request->input('NomUrgence'),
        ]);

       
        return redirect()->back()->with('success', 'Urgence créée avec succès.');
    }

    public function destroy(Urgence $urgence = null)
    {
        if (!$urgence) {
            return redirect()->back()->with('error', 'urgence not found.');
        }

        $urgence->delete();

        return redirect()->back()->with('success', 'urgence deleted successfully.');
    }
}
