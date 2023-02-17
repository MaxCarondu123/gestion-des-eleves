<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElevesGroupesController extends Controller
{
    public function create(){

    }

    public function update(){
        
    }

    public function read(){
        //Requete pour aller chercher les eleves
        $eleves = DB::table('eleves')->get();
        //Requete pour aller chercher les eleves par groupe
        $elevesGroupes = DB::table('groupes_eleves')->get();
        //Requete pour aller chercher les groupes/matieres
        $groupes_matieres = DB::table('groupes_matieres')->get();

        //Retourne vue session
        return view("elevesgroupes", ['eleves' => $eleves, 'elevesgroupes' => $elevesGroupes, 'groupes_matieres' => $groupes_matieres]);
    }

    public function delete(){
        
    }

    public function save(){
        
    }

    public function add(){
        $nbrGroupMatVide = 0;
        $nbrGroupMatBD = 0;
        //Requete aller chercher le nombre de sessions
        $first = DB::table('groupes_matieres')->orderBy('groupmat_id', 'desc')->first();
        if($first){
            $nbrGroupMatBD  = $first->groupmat_id + 1;
        }else{

        }
        

        

        //if(session()->exists('nbrgroupmatvide')){
            //$nbrGroupMatVide = session()->get('nbrgroupmatvide');
            //$nbrGroupMatVide++;
        //}

        session(['nbrgroupmatbd' => $nbrGroupMatBD]);

        //Activer bouton enregistrer
        //$btnEnregistrer = false;
        //session(['btnenregistrer' => $btnEnregistrer]);

        //Retourne vue session
        return redirect('groupessessions');       
    }
}
