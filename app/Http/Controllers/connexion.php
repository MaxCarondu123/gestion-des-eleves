<?php

namespace App\Http\Controllers;

use App\Models\utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\MdpOublierMail;
use resources\views\emails\test;


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

    public function mdpOublier(){
        return view("mdp-oublier");
    }

    public function deconnecter(){
        return redirect('connexion');
    }

    public function connexionUtilisateur(Request $request)
    {
        //Valider les champs
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>"L'adresse courriel est vide",
            'email.email'=>"L'adresse courriel n'est pas valide",
            'password.required'=>'Le mot de passe est vide'
        ]);
        
        //Verifier si l'utilisteur existe
        $utilisateur = utilisateurs::where('user_email', '=', $request->email)->first();
        if($utilisateur){
            //Verifier le mot de passe
            if(Hash::check($request->password, $utilisateur->user_password)){

                //Mettre l'utilisateur dans la session
                $request->session()->put('connexion', $utilisateur->user_id);
                
                //Allez a l'accueil
                return redirect('accueil');

            }else{
                //Fail password retour a la page
                return back()->with('passwordFail', "Le courriel ou le mot de pass de corresponde pas");
            }
        }else{
            //Fail user retour a la page
            return back()->with('userFail', "Cette utilisateur n'existe pas");
        }
    }

    public function inscriptionUtilisateur(Request $request)
    {     
        //Valider les champs
        $request->validate([
            'name' => 'required',
            'email'=>'required|email',
            'password1'=>'required',
            'password2'=>'required'
        ],[
            'name.required' => "Veuillez entrer un nom",
            'email.required'=> "L'adresse courriel est vide",
            'email.email'=> "L'adresse courriel n'est pas valide",
            'password1.required'=> 'Le mot de passe est vide',
            'password2.required'=> 'Le mot de passe est vide'
        ]);

        //valider mot de pass corresponde
        if($request->password1 == $request->password2){ 
        
            //Chercher les infos de l'utilisteurs
            $utilisateur = new utilisateurs();
            $utilisateur->user_name= $request->name;
            $utilisateur->user_email= $request->email;
            $utilisateur->user_password = Hash::make($request->password);

            //Requete sql pour entrer les informations
            $res = $utilisateur->save();
            if($res){              
                //Retour page connexion
                return redirect('connexion');

            }else{
                //Fail save retour a la page
                return back()->with('saveFail', "Probleme avec les informations");
            }
        }else{
            //Fail password retour a la page
            return back()->with('passwordFail', "Les mots de passe ne corresponde pas");
        }
    }

    public function envoyerEmail(Request $request){
        //Valider le champ
        $request->validate([
            'email' => 'required'
        ],[
            'email.required' => "Veuillez entrer un email",
        ]);

        //Valider email existe
        $utilisateur = utilisateurs::where('user_email', '=', $request->email)->first();
        if($utilisateur){
            //Entrer User_id dans la session
            $request->session()->put('email', $utilisateur->user_id);

            //Envoyer le email
            Mail::to('test@gmail.com')->send(new MdpOublierMail());

            //Aller a la page changer le mot de passe
            return view("mdp-oublier-code");
        }else{
            //Fail email retour a la page
            return back()->with('emailFail', "Le email n'est pas valide");
        }        
    }

    public function changerMdp(Request $request){
        //Valider les champs
        $request->validate([
            'code' => 'required',
            'password1' => 'required',
            'password2' => 'required'
        ],[
            'code.required' => "Veuillez entrer le code",
            'password1.required' => "Veuillez entrer le nouveau mot de passe",
            'password2.required' => "Veuillez confimer le mot de passe"
        ]);

        //Valider le code
        if($request->code == session()->get('code')){               
                //Valider le meme mot de passe
                if($request->password1 == $request->password2){                   
                    //Requete sql modifier le mot de passe
                    Utilisateurs::where('user_id', session()->get('email'))
                                ->update(['user_password' => Hash::make($request->password1)]);

                    //Retour page connexion
                    return redirect('connexion');
                }else{
                    //Fail password retour a la page
                    return back()->with('passwordFail', "Les mots de passe ne corresponde pas");
                }
        }else{
            //Fail code retour a la page
            return back()->with('codeFail', "Le code n'est pas bon");
        }       
    }
}
