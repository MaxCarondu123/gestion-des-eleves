<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\SessionController;

// Connexion
Route::get('/connexion', [ConnexionController::class, 'login']);
Route::get('/inscription', [ConnexionController::class, 'register']);
Route::get('/mdpoublier', [ConnexionController::class, 'mdpOublier']);
Route::post('/connexion-utilisateur', [ConnexionController::class, 'connexionUtilisateur'])->name('connexion-utilisateur');
Route::post('/inscription-utilisateur', [ConnexionController::class, 'inscriptionUtilisateur'])->name('inscription-utilisateur');
Route::get('/deconnecter', [ConnexionController::class, 'deconnecter']);
Route::get('/envoyer-email', [ConnexionController::class, 'envoyerEmail']);
Route::post('/changer-mdp', [ConnexionController::class, 'changerMdp'])->name('changer-mdp');

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
Route::get('/sessions-ajout', [SessionController::class, 'ajoutDonnees'])->name('sessions-ajout');
Route::post('/sessions-save', [SessionController::class, 'sauvegarderDonnees'])->name('sessions-save');
Route::get('/sessions-annuler', [SessionController::class, 'annuler'])->name('sessions-annuler');
Route::get('/sessions-supp/{sessid}', [SessionController::class, 'supprimer'])->name('sessions-supp');
Route::get('/sessions-changecourante/{sessid}', [SessionController::class, 'changecourante'])->name('sessions-changecourante');

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

