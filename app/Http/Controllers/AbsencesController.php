<?php

namespace App\Http\Controllers;

use App\Models\absences;
use App\Models\periodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;

class AbsencesController extends Controller
{
    public function read(){
        $notes = DB::table('notes')->get();

            //print_r($notes);
            //dd($notes);

        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();

        $groupes_eleves = DB::table('groupes_eleves')
                                ->where('groupmat_id', '=', session('groupidselect'))
                                ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
                                ->get();

        $examens_travaux = DB::table('examens_travauxes')->get();

        $absences = DB::table('absences')->get();

        $periodes = DB::table('periodes')
                            ->where('per_date', '=', session('selectdate'))
                            ->get();

        //Retourne vue session
        return view('absences', ['notes' => $notes, 'groupes_matieres' => $groupes_matieres, 'groupes_eleves' => $groupes_eleves, 'examens_travaux' => $examens_travaux, 'absences' => $absences, 'periodes' => $periodes]);
    }

    public function save(Request $request){
        $groupes_eleves = DB::table('groupes_eleves')
                            ->where('groupmat_id', '=', session('groupidselect'))
                            ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
                            ->get();
                            
        foreach($groupes_eleves as $groupe_eleve){
            
            for($i = 1; $i <= 5; $i++){
                if($request->get('periode'.$i.'_'.$groupe_eleve->id) == 'on'){
                    switch($i){
                        case $i == 1:
                            $heure = '8h35-9h15';
                            break;
                        case 2:
                            $heure = '9h15-10h30';
                            break;
                        case 3:
                            $heure = '10h45-11h45';
                            break;
                        case 4:
                            $heure = '1h00-2h15';
                            break;
                        case 5:
                            $heure = '2h30-3h15';
                            break;
                    }

                    $periodes = DB::table('periodes')
                            ->where('per_date', '=', session('selectdate'))
                            ->where('per_heure', '=', $heure)
                            ->first();
                            
                    if($periodes == null){
                        print_r('test');
                        //Chercher les infos de l'utilisteurs
                        $periodes = new periodes();
                        $periodes->user_id = 1;//session('connexion');
                        $periodes->sess_grmat_id = 1;
                        $periodes->per_date = session('selectdate');
                        $periodes->per_heure = $heure;

                        //Requete sql pour entrer les informations
                        $res = $periodes->save();

                        $periodes = DB::table('periodes')
                            ->where('per_date', '=', session('selectdate'))
                            ->where('per_heure', '=', $heure)
                            ->first();
                    }

                    //Chercher les infos de l'utilisteurs
                    $absence = new absences();
                    $absence->per_id = $periodes->id;
                    $absence->group_stud_id = $groupe_eleve->id;
                    $absence->abs_description = $request->get('description'.$i.'_'.$groupe_eleve->id);
    
                    //Requete sql pour entrer les informations
                    $res = $absence->save();
                }
            }           
        }
        return redirect('absences');
    }

    public function ChangeDate(Request $request){
        session(['selectdate' => $request->date]);

        return redirect('absences');
    }

    public function changeGroupe($groupId){
        session(['groupidselect' => $groupId]);

        //Retourne vue session
        return redirect('absences'); 
    }
   
    public function cancel(){ 
        //Retourne vue session
        return redirect('absences'); 
    }
}
