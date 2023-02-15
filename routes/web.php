<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GroupesSessionsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ElevesGroupesController;
use App\Http\Controllers\CommunController;
use App\Http\Controllers\AccueilController;

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
Route::get('/accueil', [CommunController::class, 'read']);

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
Route::get('/sessions', [SessionController::class, 'read']);
Route::get('/sessions-ajout', [SessionController::class, 'add'])->name('sessions-ajout');
Route::post('/sessions-save', [SessionController::class, 'save'])->name('sessions-save');
Route::get('/sessions-annuler', [SessionController::class, 'annuler'])->name('sessions-annuler');
Route::get('/sessions-supp/{sessid}', [SessionController::class, 'supprimer'])->name('sessions-supp');
Route::get('/sessions-changecourante/{sessid}', [SessionController::class, 'changecourante'])->name('sessions-changecourante');

// Groupes par sessions
Route::get('/groupessessions', [GroupesSessionsController::class, 'chercherDonnes']);
Route::get('/groupessessions-ajout', [GroupesSessionsController::class, 'ajoutDonnees'])->name('groupessessions-ajout');
Route::post('/groupessessions-save', [GroupesSessionsController::class, 'sauvegarderDonnees'])->name('groupessessions-save');
Route::get('/groupessessions-annuler', [GroupesSessionsController::class, 'annuler'])->name('groupessessions-annuler');
Route::get('/groupessessions-selectsessionsrow/{sessid}', [GroupesSessionsController::class, 'selectSessionsRow'])->name('groupessessions-selectsessionsrow');
Route::get('/groupessessions-selectgroupmatrow/{groupmatid}', [GroupesSessionsController::class, 'selectGroupMatRow'])->name('groupessessions-selectgroupmatrow');
Route::get('/groupessessions-ajouterGroupSess', [GroupesSessionsController::class, 'ajouterGroupSess'])->name('groupessessions-ajouterGroupSess');
Route::get('/groupessessions-groupmatsupp/{groupmatid}', [GroupesSessionsController::class, 'groupMatSupp'])->name('groupessessions-groupmatsupp');
Route::get('/groupessessions-groupsesssupp/{groupsessid}', [GroupesSessionsController::class, 'groupSessSupp'])->name('groupessessions-groupsesssupp');

// Eleves par groupes
Route::get('/elevesgroupes', [ElevesGroupesController::class, 'chercherDonnes']);

// Periodes
Route::get('/periodes', function () {
    return view('periodes');
});

