<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function chercherDonnees(Request $request){
        //Requete pour aller chercher les sessions
        $sessions = DB::table('sessions')->get();
        
        session()->flush('nbrsessions');
        session()->flush('nbrsessionsvide');

        //Verifier si au moin une sessions
        if(!$sessions){
            
        }

        //Retourne vue session
        return view("sessions", ['sessions' => $sessions]);
    }

    public function ajoutDonnees(){
        echo 'test';
        
    }

    public function test(Request $request){
        echo "test1";
    }

    public function sauvegarderDonnees(){
$sessions = DB::table('sessions')->get();
$nbrSessionsBD = DB::table('sessions')->count();
$nbrSessionsBD++; 
$nbrSessions = 0;

if(!session()->exists('nbrsessions')){
    //Requete pour aller chercher les sessions       
    $nbrSessions = $nbrSessionsBD;
}else{
    $nbrSessions = session()->get('nbrsessions');
    $nbrSessions++;
}

session(['nbrsessions' => $nbrSessions]);
session(['nbrsessionsbd' => $nbrSessionsBD]);

//, ['sessions' => $sessions], ['nbrsessions' => $nbrsessions]
//Retourne vue session
//return redirect('sessions');
}
}