<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:3',
            'role' => 'required|in:0,1,2',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('Ajouter_User')->with('success', 'Utilisateur créé avec succès');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,

            'role' => 'required|in:0,1,2',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');

       
            $user->save();

            return redirect()->route('List_User')->with('success', 'Utilisateur mis à jour avec succès');
        }

        return redirect()->route('List_User')->with('error', 'Utilisateur non trouvé');
    }

    public function updateAboutMe(Request $request, $id)
    {
        $request->validate([
            'Aboutme' => 'nullable|string|max:255',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->Aboutme = $request->input('Aboutme');
            $user->save();

            return redirect()->route('Profile')->with('success', 'About Me updated successfully');
        }

        return redirect()->route('Profile')->with('error', 'User not found');
    }

    public function updateAboutMeUser(Request $request, $id)
    {
        $request->validate([
            'Aboutme' => 'nullable|string|max:255',
        ]);

        $user = User::find($id);

        if ($user) {
            $user->Aboutme = $request->input('Aboutme');
            $user->save();

            return redirect()->route('Profile-User')->with('success', 'About Me updated successfully');
        }

        return redirect()->route('Profile-User')->with('error', 'User not found');
    }
    public function edit($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['error' => 'Utilisateur non trouvé'], 404);
    }
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('List_User')->with('success', 'Utilisateur supprimé avec succès');
        }

        return redirect()->route('List_User')->with('error', 'Utilisateur non trouvé');
    }
}
