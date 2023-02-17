<?php

namespace App\Http\Controllers;

use App\Models\examens_travaux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamensTravauxController extends Controller
{
    public function create(Request $request){
        if(session()->exists('idsuivant')){
            self::validerChamps($request);

            //Chercher les infos de l'utilisteurs
            $examensTravaux = new examens_travaux();
            $examensTravaux->user_id = 1;//session('connexion');
            $examensTravaux->sess_grmat_id = $request->sessgroupid;
            $examensTravaux->extr_name = $request->nom;
            $examensTravaux->extr_date = $request->date;
            $examensTravaux->extr_pond = $request->ponderation;
            $examensTravaux->extr_surcombien = $request->surcombien;
            $examensTravaux->extr_eorw = $request->eorw;

            //Requete sql pour entrer les informations
            $res = $examensTravaux->save();
        }else{
            //Fail password retour a la page
            return back()->with('rowFail', "Veuillez ajouter une ligne");
        }
        

        //Retourner a annuler
        return self::cancel();
    }

    public function update(Request $request){
        if(session()->exists('updateid')){
            self::validerChamps($request);

            //Chercher les infos de l'utilisteurs
            $examensTravaux = examens_travaux::find(session('updateid'));
            $examensTravaux->user_id = 1;//session('connexion');
            $examensTravaux->sess_grmat_id = $request->sessgroupid;
            $examensTravaux->extr_name = $request->nom;
            $examensTravaux->extr_date = $request->date;
            $examensTravaux->extr_pond = $request->ponderation;
            $examensTravaux->extr_surcombien = $request->surcombien;
            $examensTravaux->extr_eorw = $request->eorw;

            //Requete sql pour entrer les informations
            $res = $examensTravaux->update();
        }else{
            //Fail password retour a la page
            return back()->with('updateFail', "Veuillez selectionner une ligne a modifier");
        }

        //Retourner a annuler
        return self::cancel();  
    }
    
    public function read(){
        $examens_travaux = DB::table('examens_travaux')->get();

        //Retourne vue session
        return view('examenstravaux', ['examens_travaux' => $examens_travaux]);
    }

    public function delete($id){
        //Valider que la session existe
        $examenTravaux = examens_travaux::where('id', '=' ,$id)->first();
        if($examenTravaux){
            examens_travaux::where('id', '=' ,$id)->delete();

            //Retourne vue session
            return redirect('examenstravaux');  
        }
    }

    public function addRow(){
        //Requete aller chercher le nombre de sessions
        $nbrExamensTravauxBD = DB::table('examens_travaux')->orderBy('id', 'desc')->first();

        $idSuivant = 0;
        if($nbrExamensTravauxBD){
            $idSuivant = $nbrExamensTravauxBD->id + 1;
        }else{
            $idSuivant = 1;
        }
        

        session(['idsuivant' => $idSuivant]);

        //Retourne vue session
        return redirect('examenstravaux');  
    }

    public function updateRow($id){
        session(['updateid' => $id]);

        //Retourne vue session
        return redirect('examenstravaux');  
    }

    public function cancel(){
        session()->flush('idsuivant');
        session()->flush('updateid');
    
        //Retourne vue session
        return redirect('examenstravaux'); 
    }

    public function validerChamps($request){
        //Valider les champs
        $request->validate([
            'nom' => 'required',
            'date' => 'required',
            'ponderation' => 'required|numeric',
            'surcombien' => 'required|numeric'
        ],[
            'nom.required' => "Veuillez entrer un nom",
            'date.required' => "Veuillez entrer une date",
            'ponderation.required' => "Veuillez entrer une ponderation",
            'ponderation.numeric' => "Veuillez entrer un nombre valide",
            'surcombien.required' => "Veuillez entrer une note sur combien",
            'surcombien.numeric' => "Veuillez entrer un nombre valide"
        ]);
    }
}
