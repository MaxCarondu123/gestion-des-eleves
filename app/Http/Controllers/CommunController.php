<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommunController extends Controller
{
    public function create(){

    }

    public function update(){
        
    }

    public function read(){
        $sessions = DB::table('sessions')->get();

        //print_r(Schema::getColumnListing('sessions'));

        return view('accueil', ['sessions' => $sessions, 'columns' => Schema::getColumnListing('sessions')]);
    }

    public function delete(){
        
    }

    public function save(){
        
    }
}
