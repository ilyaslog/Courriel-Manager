<?php

namespace App\Http\Controllers\Courriels;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Courriel;
use App\Models\Importance;
use App\Models\Urgence;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CourrielController extends Controller
{
    public function index()
    {
        $urgences = Urgence::all();
        $importances = Importance::all();
        $categories = Categorie::all();
        $users = User::all();
        $courriels = Courriel::all();
        return view('User.CourrielsUser', compact('courriels', 'users', 'categories', 'importances', 'urgences'));
    }
    public function index2()
    {
        // Fetch all courriels where the authenticated user is the recipient
        $courriels = Courriel::all();
        $users = User::all();
        $categories = Categorie::all(); // Assuming you have a Category model
        $urgences = Urgence::all(); // Assuming you have an Urgence model
        $importances = Importance::all(); // Assuming you have an Importance model

        return view('User.CourrielsUser', compact('courriels', 'users', 'categories', 'urgences', 'importances'));
    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'sujet' => 'nullable|string|max:255',
            'date_du_courrier' => 'nullable|date',
            'description' => 'nullable|string',
            'importance' => 'nullable|string',
            'urgence' => 'nullable|string',
            'destinataire' => 'nullable|string',
            'categorie' => 'nullable|string',
            'file' => 'nullable|file',
        ]);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('files', $fileName);

            $validatedData['file'] = $fileName;
        }
  
        $courriel = new Courriel();
        $courriel->expediteur_id = Auth::user()->id;
        $courriel->sujet = $validatedData['sujet'];
        $courriel->date_du_courrier = $validatedData['date_du_courrier'];
        $courriel->description = $validatedData['description'];
        $courriel->importance = $validatedData['importance'];
        $courriel->urgence = $validatedData['urgence'];
        $courriel->destinataire = $validatedData['destinataire'];
        $courriel->categorie = $validatedData['categorie'];
        $courriel->courrier = $validatedData['file'];
        //dd($courriel);

        $courriel->save();

        $courriel->save();

        return redirect()->route('SentMails')->with('success', 'Message envoyé avec succès !');
    }
    public function indexSent()
    {
        $courriels = Courriel::where('expediteur_id', Auth::id())->get();
        return view('User.SentMails', compact('courriels'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sujet' => 'nullable|string|max:255',
            'date_du_courrier' => 'nullable|date',
            'description' => 'nullable|string',
            'importance' => 'nullable|string',
            'urgence' => 'nullable|string',
            'destinataire' => 'nullable|string',
            'categorie' => 'nullable|string',
            'file' => 'nullable|file',
        ]);

        // Handle file upload if provided
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('files', $fileName);

            $validatedData['file'] = $fileName;
        }
        // dd($validatedData,Auth::user()->id);
        // Create a new Courriel instance
        $courriel = new Courriel();
        $courriel->expediteur_id = Auth::user()->id;
        $courriel->sujet = $validatedData['sujet'];
        $courriel->date_du_courrier = $validatedData['date_du_courrier'];
        $courriel->description = $validatedData['description'];
        $courriel->importance = $validatedData['importance'];
        $courriel->urgence = $validatedData['urgence'];
        $courriel->destinataire = $validatedData['destinataire'];
        $courriel->categorie = $validatedData['categorie'];
        $courriel->courrier = $validatedData['file'];
        //dd($courriel);

        $courriel->save();

        return redirect()->route('Courrier')->with('success', 'Courriel created successfully!');
    }

    public function show($id)
    {
        $courriel = Courriel::findOrFail($id);
        return view('User.Read-courriel', compact('courriel'));
    }

    public function showSent($id)
    {
        $courriel = Courriel::findOrFail($id);

        return view('User.Read-User-Sent', compact('courriel'));
    }
}
