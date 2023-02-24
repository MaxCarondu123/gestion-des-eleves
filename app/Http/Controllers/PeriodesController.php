<?php

namespace App\Http\Controllers;

use App\Models\periodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodesController extends Controller
{
    public function read(){
        $periodes = DB::table('periodes')->get();
        return view('periodes', ['periodes' => $periodes]);
    }

    public function createMonth(Request $request){
        $jourun = $request->jourun;

        for($i = 0; $i < $request->nbrjour; $i++){
                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = date('Y-m-d', strtotime($jourun. ' +'.$i.' days'));
                $periodes->per_heure = '8h35-9h15';
    
                //Requete sql pour entrer les informations
                $res = $periodes->save();


                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = date('Y-m-d', strtotime($jourun. ' +'.$i.' days'));
                $periodes->per_heure = '9h15-10h30';
    
                //Requete sql pour entrer les informations
                $res = $periodes->save();


                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = date('Y-m-d', strtotime($jourun. ' +'.$i.' days'));
                $periodes->per_heure = '10h45-11h45';
    
                //Requete sql pour entrer les informations
                $res = $periodes->save();

                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = date('Y-m-d', strtotime($jourun. ' +'.$i.' days'));
                $periodes->per_heure = '1h00-2h15';
    
                //Requete sql pour entrer les informations
                $res = $periodes->save();

                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = date('Y-m-d', strtotime($jourun. ' +'.$i.' days'));
                $periodes->per_heure = '2h30-3h15';
    
                //Requete sql pour entrer les informations
                $res = $periodes->save();
        }

        return redirect('periodes');
    }
}
