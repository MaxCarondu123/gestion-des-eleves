<?php

namespace App\Http\Controllers;

use App\Models\utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class connexion extends Controller
{
    public function login()
    {
        return view("connexion");
    }
    public function register()
    {
        return view("inscription");
    }
    public function connexionUtilisateur(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>"L'adresse courriel est vide",
            'email.email'=>"L'adresse courriel n'est pas valide",
            'password.required'=>'Le mot de passe est vide'
        ]);

        $utilisateur = utilisateurs::where('user_email', '=', $request->email)->first();
        if($utilisateur){
            if(Hash::check($request->password, $utilisateur->user_password)){
                return redirect('accueil');
            }
        }else{
            return back()->with('fail', "Ce compte n'existe pas");
        }
    }
    public function inscriptionUtilisateur(Request $request)
    {
        echo 'test';
        $utilisateur = new utilisateurs();
        $utilisateur->user_name= $request->name;
        $utilisateur->user_email= $request->email;
        $utilisateur->user_password = Hash::make($request->password);
        $res = $utilisateur->save();
        if($res){
            echo 'marche user';
        }else{

        }
    }
}
