<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElevesGroupesController extends Controller
{
    public function chercherDonnes(){
        //Requete pour aller chercher les eleves
        $eleves = DB::table('eleves')->get();
        //Requete pour aller chercher les eleves par groupe
        $elevesGroupes = DB::table('groupes_eleves')->get();
        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();

        //Retourne vue session
        return view("elevesgroupes", ['eleves' => $eleves, 'elevesgroupes' => $elevesGroupes, 'groupes_matieres' => $groupes_matieres]);
    }

    public function ajoutDonnees(){
        //Requete aller chercher le nombre de sessions
        $first = DB::table('groupes_matieres')->orderBy('groupmat_id', 'desc')->first();
        $nbrGroupMatBD  = $first->groupmat_id + 1;

        $nbrGroupMatVide = $nbrGroupMatBD;

        //if(session()->exists('nbrgroupmatvide')){
            //$nbrGroupMatVide = session()->get('nbrgroupmatvide');
            //$nbrGroupMatVide++;
        //}

        session(['nbrgroupmatvide' => $nbrGroupMatVide]);
        session(['nbrgroupmatbd' => $nbrGroupMatBD]);

        //Activer bouton enregistrer
        //$btnEnregistrer = false;
        //session(['btnenregistrer' => $btnEnregistrer]);

        //Retourne vue session
        return redirect('groupessessions');       
    }
}
