<?php

namespace App\Http\Controllers;

use App\Models\eleves;
use App\Models\groupes_eleves;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElevesGroupesController extends Controller
{
    public function update(Request $request){
        if(session()->exists('elevesrowselect')){
            //Valider les champs
            $request->validate([
                'nom' => 'required|alpha:ascii'
            ],[
                'nom.required' => 'Veuillez entrer un nom'
            ]);

            //Chercher les infos de l'utilisteurs
            $eleve = eleves::find(session('elevesrowselect'));
            $eleve->stud_name = $request->nom;
            $eleve->stud_sexe= $request->sexe;

            //Requete sql pour entrer les informations
            $res = $eleve->update();
        }else{
            //Fail password retour a la page
            return back()->with('updateFail', "Veuillez selectionner une ligne a modifier");
        }

        //Retourner a annuler
        return self::cancel();  
    }

    public function read(){
        //Requete pour aller chercher les eleves
        $eleves = DB::table('eleves')->get();
        //Requete pour aller chercher les eleves par groupe
        $elevesGroupes = DB::table('groupes_eleves')->get();
        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();
        //session()->flush('multipleeleverowselect');

        //Retourne vue session
        return view("elevesgroupes", ['eleves' => $eleves, 'elevesgroupes' => $elevesGroupes, 'groupes_matieres' => $groupes_matieres]);
    }

    public function save(Request $request){
        //Valider les champs
        $request->validate([
            'nom' => 'required|alpha:ascii'
        ],[
            'nom.required' => 'Veuillez entrer un nom'
        ]);

        //Chercher les infos de l'utilisteurs
        $eleves = new eleves();
        $eleves->stud_name = $request->nom;
        $eleves->stud_sexe = $request->sexe;


        //Requete sql pour entrer les informations
        $res = $eleves->save();

        //Retourner a annuler
        return self::cancel();
    }

    public function addRow(){
        //Requete aller chercher le nombre de sessions
        $nbrElevesBD = DB::table('eleves')->orderBy('id', 'desc')->first();

        
        $idSuivant = 0;
        if($nbrElevesBD){
            $idSuivant = $nbrElevesBD->id + 1;
        }else{
            $idSuivant = 1;
        }
        
        session(['idsuivant' => $idSuivant]);

        //Retourne vue session
        return redirect('elevesgroupes');       
    }

    public function cancel(){
        session()->flush('nbrgroupmatbd');
        session()->flush('nbrgroupmatvide');
        session()->flush('multipleeleverowselect');

        //Retourne vue session
        return redirect('elevesgroupes');  
    }

    public function SelectElevesRow($studId){
        session()->flush('multipleeleverowselect'); 
        session(['elevesrowselect' => $studId]);

        //Retourne vue session
        return redirect('elevesgroupes');       
    }

    public function SelectGrMatRow($grMatId){
        session(['grMatrowselect' => $grMatId]);

        //Retourne vue session
        return redirect('elevesgroupes'); 
    }

    public function multipleSelectElevesRow($eleveId){
        $array = session('multipleeleverowselect');
        session()->flush('elevesrowselect');
        
        $contientDeja = false;
        if($array){
            foreach($array as $element){
                if($element == $eleveId){
                    $contientDeja = true;
                }
            }
        }
          
        if($contientDeja == false){
            $array[] = $eleveId;
        }
            
        session(['multipleeleverowselect' => $array]);

        //Retourne vue session
        return redirect('elevesgroupes');  
    }

    public function ElevesDelete($studId){
        //Valider que la session existe
        $eleve = eleves::where('id', '=' ,$studId)->first();
        if($eleve){
            eleves::where('id', '=' ,$studId)->delete();

            //Retourne vue session
            return redirect('elevesgroupes');  
        }
    }

    public function ElevesGroupesDelete($eleveGroupeId){
        //Valider que la session existe
        $groupe_eleve = groupes_eleves::where('id', '=' ,$eleveGroupeId)->first();
        if($groupe_eleve){
            groupes_eleves::where('id', '=' ,$eleveGroupeId)->delete();

            //Retourne vue session
            return redirect('elevesgroupes');  
        }
    }

    public function addEleveGroup(){
        $array = session('multipleeleverowselect');
        foreach($array as $element){  
            $eleveGroup = new groupes_eleves();
            $eleveGroup->groupmat_id = session('grMatrowselect');
            $eleveGroup->stud_id = $element;

            $res = $eleveGroup->save();
        }

        //Retourne vue session
        return redirect('elevesgroupes');
    }
}
