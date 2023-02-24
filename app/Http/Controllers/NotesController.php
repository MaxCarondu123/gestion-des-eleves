<?php

namespace App\Http\Controllers;

use App\Models\eleves;
use App\Models\examens_travaux;
use App\Models\groupes_eleves;
use App\Models\notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function create(Request $request){
        $groupes_eleves = DB::table('groupes_eleves')
            ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
            ->get();

        foreach($groupes_eleves as $groupe_eleve){
            print_r($request->input('note_'.$groupe_eleve->id));
            //Chercher les infos de l'utilisteurs
            $notes = new notes();
            $notes->group_stud_id = $groupe_eleve->id;//session('connexion');
            $notes->extr_id = session('updateid');
            $notes->note_note = $request->note_  .+ $groupe_eleve->id;
            $notes->note_note100 = $request->note100_ . $groupe_eleve->id;

            // $res = $notes->save();
        }

        


        //Retourner a annuler
        //return self::cancel();
    }

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
