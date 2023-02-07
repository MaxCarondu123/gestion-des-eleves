<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function chercherDonnees(){
        //Requete pour aller chercher les sessions
        $sessions = DB::table('sessions')->get();

        //Verifier si au moin une sessions
        if(!$sessions){
            
        }
        return view("sessions", ['sessions' => $sessions]);
    }
}
