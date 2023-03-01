<?php

namespace App\Http\Controllers;

use App\Models\groupes_matieres;
use App\Models\sess_grmats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;


class GroupesSessionsController extends Controller
{
    public function update(Request $request){
        print_r(session('groupmatrowselect'));
        if(session()->exists('groupmatrowselect')){
            //Valider les champs
            self::validerChamps($request);

            //Chercher les infos d'un groupe avec sa matiere
            $grMat = groupes_matieres::find(session('groupmatrowselect'));
            $grMat->groupmat_mat = $request->matiere;
            $grMat->groupmat_name= $request->nom;
            $grMat->groupmat_num = $request->numero;
            $grMat->groupmat_description = $request->description;
            $grMat->user_id = 1;

            //Requete sql pour entrer les informations
            $res = $grMat->update();
        }else{
            //Fail de la mise a jour retour a la page
            return back()->with('updateFail', "Veuillez selectionner une ligne a modifier");
        }

        //Retourner a annuler
        return self::cancel();  
    }

    public function read(){
        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();

        //Requete pour aller chercher les groupes par sessions
        $sess_grmats = DB::table('sess_grmats')->get();

        //Requete pour aller chercher les sessions
        $sessions = DB::table('sessions')->get();

        //Retourne vue session
        return view("groupessessions", ['groupes_matieres' => $groupes_matieres, 'sess_grmats' => $sess_grmats, 'sessions' => $sessions]);
    }

    public function save(Request $request){
        //Valider les champs
        self::validerChamps($request);

        //Chercher les infos d'un groupe avec sa matiere
        $grMat = new groupes_matieres();
        $grMat->groupmat_mat = $request->matiere;
        $grMat->groupmat_name= $request->nom;
        $grMat->groupmat_num = $request->numero;
        $grMat->groupmat_description = $request->description;
        $grMat->user_id = 1;

        //Requete sql pour entrer les informations
        $res = $grMat->save();

        //Retourner a annuler
        return self::cancel();
    }

    public function cancel(){
        session()->flush('nbrgroupmatbd');
        session()->flush('nbrgroupmatvide');
        session()->flush('groupmatrowselect');
        session()->flush('sessionsrowselect');
        session()->flush('multiplegroupmatrowselect');

        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function addRow(){
        //Requete aller chercher le nombre de groupe
        $nbrGroupMatBD = DB::table('groupes_matieres')->orderBy('id', 'desc')->first();

        $idSuivant = 0;
        if($nbrGroupMatBD){
            $idSuivant = $nbrGroupMatBD->id + 1;
        }else{
            $idSuivant = 1;
        }
        
        session(['idsuivant' => $idSuivant]);

        //Retourne vue session
        return redirect('groupessessions');       
    }

    public function selectSessionsRow($sessId){
        session(['sessionsrowselect' => $sessId]);

        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function selectGroupMatRow($groupMatId){
        session()->flush('multiplegroupmatrowselect');
        session(['groupmatrowselect' => $groupMatId]);
        
        //Retourne vue session
        return redirect('groupessessions');  
    }

    public function mutlipleSelectGroupMatRow($groupMatId){
        session()->flush('groupmatrowselect');
        $array = [];
        print_r('testdebut');
        print_r(session()->all('multiplegroupmatrowselect'));
        $contientDeja = false;
        if(session()->exists('multiplegroupmatrowselect')){
            print_r('test');
            $array = session('multiplegroupmatrowselect');

            foreach($array as $element){
                if($element == $groupMatId){
                    $contientDeja = true;
                }
            }
        }

        if($contientDeja == false){
            $array[] = $groupMatId;
        }
        
        session(['multiplegroupmatrowselect' => $array]);

        //Retourne vue session
        //return redirect('groupessessions');  
    }

    public function addGroupSess(){
        //Associer un groupe a la session
        $sessGrMat = new sess_grmats();
        $sessGrMat->sess_id = session('sessionsrowselect');
        $sessGrMat->groupmat_id = session('groupmatrowselect');

        $res = $sessGrMat->save();

        //Retourne vue session
        return redirect('groupessessions');
    }

    public function groupMatDelete($groupMatId){
        //Valider que le groupe existe
        $groupMat = groupes_matieres::where('id', '=' ,$groupMatId)->first();
        if($groupMat){
            //Supprimer le groupe
            groupes_matieres::where('id', '=' ,$groupMatId)->delete();

            //Retourne vue session
            return redirect('groupessessions');  
        }
    }

    public function groupSessDelete($groupSessId){
        //Valider que le groupe avec la session
        $groupSess = sess_grmats::where('id', '=' ,$groupSessId)->first();
        if($groupSess){
            //Supprimer le groupe avec la session
            sess_grmats::where('id', '=' ,$groupSessId)->delete();

            //Retourne vue session
            return redirect('groupessessions');  
        }
    }

    public function validerChamps($request){
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
    }
}
