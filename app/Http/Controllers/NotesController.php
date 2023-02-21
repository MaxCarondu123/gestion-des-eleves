<?php

namespace App\Http\Controllers;

use App\Models\eleves;
use App\Models\examens_travaux;
use App\Models\groupes_eleves;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function update(){

    }
    
    public function read(){
        $notes = DB::table('notes')->get();

            //print_r($notes);
            //dd($notes);

        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();

        $groupes_eleves = DB::table('groupes_eleves')
            ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
            ->where('groupes_eleves.groupmat_id', '=', 1)
            ->get();

        $eleves = DB::table('eleves')->get();

        $examens_travaux = DB::table('examens_travauxes')->get();

        //Retourne vue session
        return view('notes', ['notes' => $notes, 'groupes_matieres' => $groupes_matieres, 'groupes_eleves' => $groupes_eleves, 'eleves' => $eleves, 'examens_travaux' => $examens_travaux]);
    }

    public function save(){

    }

    public function updateRow($id){
        session(['updateid' => $id]);

        //Retourne vue session
        return redirect('notes');  
    }

    public function cancel(){
        session()->flush('idsuivant');
        session()->flush('updateid');
    
        //Retourne vue session
        return redirect('notes'); 
    }
}
