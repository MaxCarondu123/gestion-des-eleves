<?php

namespace App\Http\Controllers;

use App\Models\sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use App\Http\Controllers\CommunController;

class SessionController extends Controller
{
    public function update(Request $request){
        if(session()->exists('updateid')){
            //Valider les champs
            self::validerChamps($request);

            //Chercher les infos de la sessions
            $session = sessions::find(session('updateid'));
            $session->sess_num = $request->etape;
            $session->sess_startdate = $request->datedebut;
            $session->sess_enddate = $request->datefin;

            //Requete sql pour mettre a jour les informations
            $res = $session->update();
        }else{
            //Fail de la mise a jour retour a la page
            return back()->with('updateFail', "Veuillez selectionner une ligne a modifier");
        }

        //Retourner a annuler
        return self::cancel();  
    }

    public function read(){
        $sessions = DB::table('sessions')->get();

        return view('sessions', ['sessions' => $sessions]);
    }

    public function delete($sessId){
        //Valider que la session existe
        $session = sessions::where('id', '=' ,$sessId)->first();

        if($session){
            //Requete sql pour supprimer la session
            sessions::where('id', '=' ,$sessId)->delete();

            //Retourne vue session
            return redirect('sessions');  
        }
    }

    public function save(Request $request){
        //Valider les champs
        self::validerChamps($request);

        //Chercher les infos de la session
        $session = new sessions();
        $session->sess_num = $request->etape;
        $session->sess_startdate = $request->datedebut;
        $session->sess_enddate = $request->datefin;
        if($request->courante == 'on'){
            $courante = true;
        
        //Verifier si une session courante
        $sessionCourante = sessions::where('sess_current', '=', true)->first();

        if($sessionCourante){
            //Enlever la session qui etait courante
            sessions::where('id', '=', $sessionCourante->id)->update(['sess_current' => false]);
        }
        }else{
            $courante = false;
        }
        $session->sess_current = $courante;

        //Requete sql pour entrer les informations
        $res = $session->save();

        //Retourner a annuler
        return self::cancel();
    }

    public function addRow(){
        //Requete aller chercher le nombre de sessions
        $nbrSessionsBD = DB::table('sessions')->orderBy('id', 'desc')->first();
  
        $idSuivant = 0;
        if($nbrSessionsBD){
            $idSuivant = $nbrSessionsBD->id + 1;
        }else{
            $idSuivant = 1;
        }
        
        session(['idsuivant' => $idSuivant]);

        //Retourne vue session
        return redirect('sessions');  
    }

    public function cancel(){
        session()->flush('nbrsessions');
        session()->flush('nbrsessionsvide');

        //Retourne vue session
        return redirect('sessions'); 
    }

    public function changeCourante($sessId){
        //Verifier qui a une sessions courante
        $session = sessions::where('sess_current', '=', true)->first();
        if($session){
            //Enlever la session qui etait courante
            sessions::where('id', '=', $session->id)->update(['sess_current' => false]);
        }

        //mettre la nouvelle session courante
        sessions::where('id', '=', $sessId)->update(['sess_current' => true]);

        //Retourne vue session
        return redirect('sessions');  
    }

    public function selectRow($sessId){
        session(['updateid' => $sessId]);

        //Retourne vue session
        return redirect('sessions'); 
    }

    public function validerChamps($request){
         //Valider les champs
         $request->validate([
            'etape' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required'
        ],[
            'etape.required' => "Veuillez entrer une etape",
            'datedebut.required' => "Veuillez entrer une date de debut",
            'datefin.required' => "Veuillez entrer une date de fin"
        ]);
    }

}