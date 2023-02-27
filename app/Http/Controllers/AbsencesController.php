<?php

namespace App\Http\Controllers;

use App\Models\absences;
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
            ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
            ->get();

        $examens_travaux = DB::table('examens_travauxes')->get();

        $absences = DB::table('absences')->get();

        $periodes = DB::table('periodes')
                            ->where('per_date', '=', '2023-02-01')
                            ->get();

        //Retourne vue session
        return view('absences', ['notes' => $notes, 'groupes_matieres' => $groupes_matieres, 'groupes_eleves' => $groupes_eleves, 'examens_travaux' => $examens_travaux, 'absences' => $absences, 'periodes' => $periodes]);
    }

    public function save(Request $request){

        $groupes_eleves = DB::table('groupes_eleves')
            ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
            ->get();

        foreach($groupes_eleves as $groupe_eleve){
            for($i = 1; $i <= 5; $i++){
                if($request->get('periode'.$i.'_'.$groupe_eleve->id) == !null){
                    //Chercher les infos de l'utilisteurs
                    $absence = new absences();
                    $absence->per_id = $i;
                    $absence->group_stud_id = $groupe_eleve->id;
                    $absence->abs_description = $request->get('description'.$i.'_'.$groupe_eleve->id);
    
                    //Requete sql pour entrer les informations
                    $res = $absence->save();
                }
            }           
        }
        return redirect('absences');
    }
}
