<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Prospect;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProspectController extends Controller
{
    public function countProspects()
{
    return Prospect::count();
}
public function countProspectsok()
{
    return Prospect::where('sale_concluded', true)->count();
}
public function countProspectsnook()
{
    return Prospect::where('sale_concluded', false)->count();
}

    public function listeprospects()
    { $liste_prospects=Prospect::Paginate(3);
        return view('Listeprospects',['liste_prospects' => $liste_prospects]);
    }
    public function guestprospection()
      {
        $liste_prospects=Prospect::Paginate(3);
        return view('Lesprospections',['liste_prospects' => $liste_prospects]);
    }
    public function listeprospectsok()
    { $liste_prospects = DB::table('prospects')
        ->where('sale_concluded', true)
        ->paginate(1);

        return view('Listeprospects',compact("liste_prospects"));
    }
    public function listeprospectsnook()
    {$liste_prospects = DB::table('prospects')
        ->where('sale_concluded', false)
        ->paginate(1);
        return view('Listeprospects',compact("liste_prospects"));
    }
    public function create(Prospect $prospect)
    {
       

return view("createProspect");
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'agent_nom' => 'required',
            'client_nom' => 'required',
            'client_adresse' => 'required',
            'date' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'produit_presente' => 'required',
            'observations' => 'nullable',
            'vente_conclue' => 'nullable|boolean',
        ]);
        $heureDebut = $validatedData['heure_debut'];
$heureFin = $validatedData['heure_fin'];

// Convertir les valeurs en objets DateTime
$heureDebutObj = new DateTime($heureDebut);
$heureFinObj = new DateTime($heureFin);

// Calculer la durée en utilisant la méthode diff() pour obtenir la différence entre les deux objets DateTime
$duree = $heureDebutObj->diff($heureFinObj);

// Extraire la durée sous la forme d'un nombre entier en minutes
$dureeEnMinutes = $duree->h * 60 + $duree->i;

// Assigner la durée calculée au champ correspondant dans l'objet Prospect
        $venteConclue = $request->input('vente-conclue') === 'oui' ? 1 : 0;        // Créer un nouvel objet Prospect
        $prospect = new Prospect;
        $prospect->agent_name = $validatedData['agent_nom'];
        $prospect->client_name = $validatedData['client_nom'];
        $prospect->client_address = $validatedData['client_adresse'];
        $prospect->date = $validatedData['date'];
        $prospect->start_time = $validatedData['heure_debut'];
        $prospect->end_time = $validatedData['heure_fin'];
        $prospect->product = $validatedData['produit_presente'];
        $prospect->client_observation = $validatedData['observations'];
        $prospect->sale_concluded =$venteConclue;
        $prospect->duration = $dureeEnMinutes;

        // Enregistrer le prospect dans la base de données
        $prospect->save();
        Alert::toast('prospection ajoutée', 'success');
        // Rediriger vers une autre page ou afficher un message de succès
        return redirect()->route('Listeprospects')->with('success', 'Le prospect a été créé avec succès.');
    }
    public function delete(Prospect $prospect)
{ 
  // Supprimer les relations du prospect avec d'autres modèles, le cas échéant
  // ...

  $prospect->delete();
  Alert::toast('Prospection supprimée', 'success');

  return back()->with("successDelete", "Le prospect a été supprimé avec succès.");
}
public function edit(Prospect $prospect)
    {
return view("editerProspect",compact("prospect"));
    }
    public function editer( Request $request,Prospect $prospect)
    {
        $validatedData = $request->validate([
            'agent_nom' => 'required',
            'client_nom' => 'required',
            'client_adresse' => 'required',
            'date' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'produit_presente' => 'required',
            'observations' => 'nullable',
            'vente_conclue' => 'nullable|boolean',
        ]);
        $heureDebut = $validatedData['heure_debut'];
        $heureFin = $validatedData['heure_fin'];
        
        // Convertir les valeurs en objets DateTime
        $heureDebutObj = new DateTime($heureDebut);
        $heureFinObj = new DateTime($heureFin);

// Calculer la durée en utilisant la méthode diff() pour obtenir la différence entre les deux objets DateTime
$duree = $heureDebutObj->diff($heureFinObj);

// Extraire la durée sous la forme d'un nombre entier en minutes
$dureeEnMinutes = $duree->h * 60 + $duree->i;
$venteConclue = $request->input('vente-conclue') === 'oui' ? 1 : 0;        // Créer un nouvel objet Prospect

$prospect->agent_name = $validatedData['agent_nom'];
$prospect->client_name = $validatedData['client_nom'];
$prospect->client_address = $validatedData['client_adresse'];
$prospect->date = $validatedData['date'];
$prospect->start_time = $validatedData['heure_debut'];
$prospect->end_time = $validatedData['heure_fin'];
$prospect->product = $validatedData['produit_presente'];
$prospect->client_observation = $validatedData['observations'];
$prospect->sale_concluded =$venteConclue;
$prospect->duration = $dureeEnMinutes;
// Enregistrer les modifications dans la base de données
$prospect->save();
Alert::toast('Prospection modifiée avec succès', 'success');

return redirect()->route('Listeprospects', $prospect)->with('success', 'Le prospect a été mis à jour avec succès.');

    }
}
