<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $periodes = DB::table('periodes')->get();

        //Retourne vue session
        return view('absences', ['notes' => $notes, 'groupes_matieres' => $groupes_matieres, 'groupes_eleves' => $groupes_eleves, 'examens_travaux' => $examens_travaux, 'absences' => $absences, 'periodes' => $periodes]);
    }
}
