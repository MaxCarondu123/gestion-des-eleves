<?php

namespace App\Http\Controllers;

use App\Models\periodes;
use App\Models\sess_grmats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoraireController extends Controller
{
    public function read(){
        $periodes = DB::table('periodes')
                            ->where('per_date', '=', '2023-02-01')
                            ->get();

        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();
        //Requete pour aller chercher les groupes par sessions
        $sess_grmats = DB::table('sess_grmats')->get();

        return view('accueil', ['periodes' => $periodes, 'groupes_matieres' => $groupes_matieres, 'sess_grmats' => $sess_grmats]);
    }

    public function save(Request $request){
        for($i = 1; $i <= 7; $i++){
            $heure = 0;
            print_r($request->groupe.$i);

            switch($request->groupe.$i){
                case $request->groupe1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
                case 1;
                    $heure = '8h35-9h15';
                    break;
            }

            $periodes = periodes::where('per_date', '=', session('selectdate'))
                                ->where('per_heure', '=', $heure)
                                ->first();

            if($periodes){
                //Chercher les infos de l'utilisteurs
                $periodes = periodes::find($periodes->id);
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = session('selectdate');
                $periodes->per_heure = $heure;

                //Requete sql pour entrer les informations
                $res = $periodes->update();
            }else{
                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = session('selectdate');
                $periodes->per_heure = $heure;

                //Requete sql pour entrer les informations
                $res = $periodes->save();
            }  
        } 
        
        //return redirect('accueil');
    }

    public function ChangeDate(Request $request){
        session(['selectdate' => $request->date]);

        return redirect('accueil');
    }
}
