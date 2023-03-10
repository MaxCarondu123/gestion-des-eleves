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
            $examens_travaux = DB::table('examens_travauxes')
                                ->where('id', '=',  session('updateid'))
                                ->get()
                                ->first();

            $notes = DB::table('notes')
                                ->where('group_stud_id', '=', $groupe_eleve->id)
                                ->where('extr_id', '=', session('updateid'))
                                ->get()
                                ->first();

            if($notes){
                $notes = notes::find($notes->id);
                $notes->group_stud_id = $groupe_eleve->id;//session('connexion');
                $notes->extr_id = session('updateid');
                $notes->note_note = $request->get('note_'.$groupe_eleve->id);
                $notes->note_note100 = (($request->get('note_'.$groupe_eleve->id) * 100)/$examens_travaux->extr_surcombien);

                //Requete sql pour entrer les informations
                $res = $notes->update();
            }else{
                //Chercher les infos de l'utilisteurs
                $notes = new notes();
                $notes->group_stud_id = $groupe_eleve->id;//session('connexion');
                $notes->extr_id = session('updateid');
                $notes->note_note = $request->get('note_'.$groupe_eleve->id);
                $notes->note_note100 = (($request->get('note_'.$groupe_eleve->id) * 100)/$examens_travaux->extr_surcombien);

                $res = $notes->save();
            }
        }

        //Retourner a annuler
        return self::cancel();
    }
    
    public function read(){
        $notes = DB::table('notes')->get(); 

        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();
        
        $groupes_eleves = DB::table('groupes_eleves')
                                ->where('groupmat_id', '=', session('groupidselect'))
                                ->join('eleves', 'eleves.id', '=', 'groupes_eleves.stud_id')
                                ->get();

        $eleves = DB::table('eleves')->get();

        $examens_travaux = DB::table('examens_travauxes')->get();

        $groupes_matieresFirst = DB::table('groupes_matieres')->first();
        if(!session()->exists(['groupidselect'])){
            session(['groupidselect' => $groupes_matieresFirst->id]);
        }

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
        session()->forget('updateid');

        //Retourne vue session
        return redirect('notes'); 
    }

    public function changeGroupe($groupId){
        session(['groupidselect' => $groupId]);

        //Retourne vue session
        return redirect('notes'); 
    }
}
