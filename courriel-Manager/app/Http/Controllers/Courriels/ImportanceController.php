<?php

namespace App\Http\Controllers\Courriels;

use App\Models\Importance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportanceController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'importance' => 'required|string|max:255',
        ]);


        $importance = new Importance();


        $importance->nom = $request->input('importance');


        $importance->save();

      
        return redirect()->back()->with('success', 'Importance created successfully.');
    }

    public function destroy($id)
    {
        $importance = Importance::find($id);
        if ($importance) {
            $importance->delete();
            return redirect()->back()->with('success', 'Importance deleted successfully.');
        }
        return redirect()->back()->with('error', 'Importance not found.');
    }
}
