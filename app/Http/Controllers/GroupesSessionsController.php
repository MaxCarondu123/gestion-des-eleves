<?php

namespace App\Http\Controllers;

use App\Models\groupes_matieres;
use App\Models\sess_grmats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupesSessionsController extends Controller
{
    public function chercherDonnes(){
        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();
        //Requete pour aller chercher les groupes par sessions
        $sess_grmats = DB::table('sess_grmats')->get();
        //Requete pour aller chercher les sessions
        $sessions = DB::table('sessions')->get();
        
        //session()->flush('nbrsessions');
        //session()->flush('nbrsessionsvide');

        if(!Session()->exists('sessionsrowselect')){
            session(['sessionsrowselect' => 1]);
        }
        if(!Session()->exists('groupmatrowselect')){
            session(['groupmatrowselect' => 1]);
        }

        //Verifier si au moin une sessions
        if(!$sessions){
            
        }

        //Retourne vue session
        return view("groupessessions", ['groupes_matieres' => $groupes_matieres, 'sess_grmats' => $sess_grmats, 'sessions' => $sessions]);
    }

    public function ajoutDonnees(){
        //Requete aller chercher le nombre de sessions
        $groupMatHaute = DB::table('groupes_matieres')->orderBy('groupmat_id', 'desc')->first();
        $nbrGroupMatBD  = $groupMatHaute->groupmat_id + 1;

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

    public function annuler(){
        session()->flush('nbrgroupmatbd');
        session()->flush('nbrgroupmatvide');
        
        //Desactiver bouton enregistrer
        //$btnEnregistrer = true;
        //session(['btnenregistrer' => $btnEnregistrer]);

        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function selectSessionsRow($sessId){
        session(['sessionsrowselect' => $sessId]);

        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function selectGroupMatRow($groupMatId){
        session(['groupmatrowselect' => $groupMatId]);

        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function sauvegarderDonnees(Request $request){
        //Valider les champs
        $request->validate([
            'matiere' => 'required|alpha:ascii',
            'nom' => 'required',
            'numero' => 'required',
        ],[
            'matiere.required' => 'Veuillez entrer une matiere',
            'matiere.alpha' => 'Veuillez entrer des lettres',
            'nom.required' => 'Veuillez entrer un nom',
            'numero.required' => 'Veuillez entrer un numero'
        ]);

        //Chercher les infos de l'utilisteurs
        $grMat = new groupes_matieres();
        $grMat->groupmat_mat = $request->matiere;
        $grMat->groupmat_name= $request->nom;
        $grMat->groupmat_num = $request->numero;
        $grMat->groupmat_description = $request->description;
        $grMat->user_id = session('connexion');

        //Requete sql pour entrer les informations
        $res = $grMat->save();

        //Retourner a annuler
        return self::annuler();
    }

    public function ajouterGroupSess(){
        $sessGrMat = new sess_grmats();
        $sessGrMat->sess_id = session('sessionsrowselect');
        $sessGrMat->groupmat_id = session('groupmatrowselect');

        $res = $sessGrMat->save();

        //Retourne vue session
        return redirect('groupessessions');
    }

    public function groupMatSupp($groupMatId){
        //Valider que la session existe
        $groupMat = groupes_matieres::where('groupmat_id', '=' ,$groupMatId)->first();
        if($groupMat){
            groupes_matieres::where('groupmat_id', '=' ,$groupMatId)->delete();

            //Retourne vue session
            return redirect('groupessessions');  
        }
    }

    public function groupSessSupp($groupSessId){
        //Valider que la session existe
        $groupSess = sess_grmats::where('sess_grmat_id', '=' ,$groupSessId)->first();
        if($groupSess){
            sess_grmats::where('sess_grmat_id', '=' ,$groupSessId)->delete();

            //Retourne vue session
            return redirect('groupessessions');  
        }
    }
}
