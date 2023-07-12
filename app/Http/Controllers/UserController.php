<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\ProspectController;

class UserController extends Controller
{ 
    public function countUsers()
    {
        return User::count();
    }
    public function countUsersok()
    {
        return User::where('administrateur', 1)->count();
    }
    public function listeusers()
    { $liste_users=User::all();
        return view('Listeusers',compact("liste_users"));
    }
    public function listeagents()
    { $liste_users=User::where('administrateur', 1)->get();
        return view('Listeusers',compact("liste_users"));
    }
    public function listeguests()
    { $liste_users=User::where('administrateur', 0)->get();
        return view('Listeusers',compact("liste_users"));
    }
    public function editer( Request $request,User $user)
    {  $validatedData = $request->validate([
        'is_admin' => 'nullable|boolean',
    ]);

    $user->administrateur = $validatedData['is_admin'];
    $user->save();
    Alert::toast('Utilisateur modifié avec succès', 'success');
    
    return redirect()->route('Listeusers', $user)->with('success', 'Utilisateur  mis à jour avec succès.');
    
    }
    
}
