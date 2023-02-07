<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\connexion;
use App\Http\Controllers\SessionController;

// Connexion
Route::get('/connexion', [connexion::class, 'login']);
Route::get('/inscription', [connexion::class, 'register']);
Route::get('/mdpoublier', [connexion::class, 'mdpOublier']);
Route::post('/connexion-utilisateur', [connexion::class, 'connexionUtilisateur'])->name('connexion-utilisateur');
Route::post('/inscription-utilisateur', [connexion::class, 'inscriptionUtilisateur'])->name('inscription-utilisateur');
Route::get('/deconnecter', [connexion::class, 'deconnecter']);
Route::get('/envoyer-email', [connexion::class, 'envoyerEmail']);
Route::post('/changer-mdp', [connexion::class, 'changerMdp'])->name('changer-mdp');

//----------- Courante -----------
// Accueil
Route::get('/accueil', function () {
    return view('accueil');
});

// Absences
Route::get('/absences', function () {
    return view('absences');
});

// Notes
Route::get('/notes', function () {
    return view('notes');
});

// Examens et travaux
Route::get('/examenstravaux', function () {
    return view('examens-travaux');
});

//----------- Annuelle -----------
// Sessions
Route::get('/sessions', [SessionController::class, 'chercherDonnees']);

// Groupes par sessions
Route::get('/groupessessions', function () {
    return view('groupes-sessions');
});

// Eleves par groupes
Route::get('/elevesgroupes', function () {
    return view('eleves-groupes');
});

// Periodes
Route::get('/periodes', function () {
    return view('periodes');
});

