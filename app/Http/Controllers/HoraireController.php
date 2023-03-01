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

            switch($request->get('groupe'.$i)){
                case $request->groupe1;
                    $heure = '8h35-9h15';
                    break;
                case $request->groupe2;
                    $heure = '9h15-10h30';
                    break;
                case $request->groupe3;
                    $heure = '10h45-11h45';
                    break;
                case $request->groupe4;
                    $heure = '11h45-1h00';
                    break;
                case $request->groupe5;
                    $heure = '1h00-2h15';
                    break;
                case $request->groupe6;
                    $heure = '2h30-3h15';
                    break;
                case $request->groupe7;
                    $heure = '3h15-5h00';
                    break;
            }

            $periodes = periodes::where('per_date', '=', session('selectdate'))
                                ->where('per_heure', '=', $heure)
                                ->first();
            print_r($request->get('note'.$i));
            if($periodes){
                //Chercher les infos de l'utilisteurs
                $periodes = periodes::find($periodes->id);
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = session('selectdate');
                $periodes->per_heure = $heure;
                $periodes->per_notes = $request->get('note'.$i);

                //Requete sql pour entrer les informations
                $res = $periodes->update();
            }else{
                //Chercher les infos de l'utilisteurs
                $periodes = new periodes();
                $periodes->user_id = 1;//session('connexion');
                $periodes->sess_grmat_id = 1;
                $periodes->per_date = session('selectdate');
                $periodes->per_heure = $heure;
                $periodes->per_notes = $request->get('note'.$i);

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

    public function cancel(){
        session()->flush('selectdate');
    
        //Retourne vue session
        return redirect('accueil'); 
    }
}
