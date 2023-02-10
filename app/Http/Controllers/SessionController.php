<?php

namespace App\Http\Controllers;

use App\Models\sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class SessionController extends Controller
{
    public function chercherDonnees(Request $request){
        //Requete pour aller chercher les sessions
        $sessions = DB::table('sessions')->get();
        
        //session()->flush('nbrsessions');
        //session()->flush('nbrsessionsvide');

        //Verifier si au moin une sessions
        if(!$sessions){
            
        }

        //Retourne vue session
        return view("sessions", ['sessions' => $sessions]);
    }

    public function ajoutDonnees(Request $request){
        //Requete aller chercher le nombre de sessions
        $sessionHaute = DB::table('sessions')->orderBy('sess_id', 'desc')->first();
        $nbrSessionsBD  = $sessionHaute->sess_id + 1;

        $nbrSessionsVide = $nbrSessionsBD;

        if(session()->exists('nbrsessionsvide')){
            $nbrSessionsVide = session()->get('nbrsessionsvide');
            $nbrSessionsVide++;
        }

        session(['nbrsessionsvide' => $nbrSessionsVide]);
        session(['nbrsessionsbd' => $nbrSessionsBD]);

        //Activer bouton enregistrer
        $btnEnregistrer = false;
        session(['btnenregistrer' => $btnEnregistrer]);

        //Retourne vue session
        return redirect('sessions');       
    }

    public function sauvegarderDonnees(Request $request){

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
        
        //Chercher les infos de l'utilisteurs
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
                sessions::where('sess_id', '=', $sessionCourante->sess_id)->update(['sess_current' => false]);
            }
        }else{
            $courante = false;
        }
        $session->sess_current = $courante;

        //Requete sql pour entrer les informations
        $res = $session->save();

        //Retourner a annuler
        return self::annuler();
    }

    public function annuler(){
        session()->flush('nbrsessions');
        session()->flush('nbrsessionsvide');
        
        //Desactiver bouton enregistrer
        $btnEnregistrer = true;
        session(['btnenregistrer' => $btnEnregistrer]);

        //Retourne vue session
        return redirect('sessions');  
    }

    public function supprimer($sessId){
        //Valider que la session existe
        $session = sessions::where('sess_id', '=' ,$sessId)->first();
        if($session){
            sessions::where('sess_id', '=' ,$sessId)->delete();

            //Retourne vue session
            return redirect('sessions');  
        }
    }

    public function changecourante($sessId){
        //Verifier qui a une sessions courante
        $session = sessions::where('sess_current', '=', true)->first();
        if($session){
            //Enlever la session qui etait courante
            sessions::where('sess_id', '=', $session->sess_id)->update(['sess_current' => false]);
        }

        //mettre la nouvelle session courante
        sessions::where('sess_id', '=', $sessId)->update(['sess_current' => true]);

        //Retourne vue session
        return redirect('sessions');  
    }

}