<?php

use App\Http\Controllers\AbsencesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GroupesSessionsController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ElevesGroupesController;
use App\Http\Controllers\CommunController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ExamensTravauxController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PeriodesController;

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
Route::get('/absences', [AbsencesController::class, 'read']);

// Notes
Route::get('/notes', [NotesController::class, 'read']);
Route::get('/notes-ajoutligne', [NotesController::class, 'addRow'])->name("notes-ajoutligne");
Route::post('/notes-creer', [NotesController::class, 'create'])->name("notes-creer");
Route::get('/notes-annuler', [NotesController::class, 'cancel'])->name("notes-annuler");
Route::get('/notes-supp/{id}', [NotesController::class, 'delete'])->name("notes-supp");
Route::get('/notes-updateligne/{id}', [NotesController::class, 'updateRow'])->name("notes-updateligne");
Route::post('/notes-update', [NotesController::class, 'update'])->name("notes-update");
Route::post('/notes-save', [NotesController::class, 'save'])->name("notes-save");

// Examens et travaux
Route::get('/examenstravaux', [ExamensTravauxController::class, 'read']);
Route::get('/examenstravaux-ajoutligne', [ExamensTravauxController::class, 'addRow'])->name("examenstravaux-ajoutligne");
Route::post('/examenstravaux-creer', [ExamensTravauxController::class, 'create'])->name("examenstravaux-creer");
Route::get('/examenstravaux-annuler', [ExamensTravauxController::class, 'cancel'])->name("examenstravaux-annuler");
Route::get('/examenstravaux-supp/{id}', [ExamensTravauxController::class, 'delete'])->name("examenstravaux-supp");
Route::get('/examenstravaux-updateligne/{id}', [ExamensTravauxController::class, 'updateRow'])->name("examenstravaux-updateligne");
Route::post('/examenstravaux-update', [ExamensTravauxController::class, 'update'])->name("examenstravaux-update");

//----------- Annuelle -----------
// Sessions
Route::get('/sessions', [SessionController::class, 'read']);
Route::get('/sessions-ajout', [SessionController::class, 'addRow'])->name('sessions-ajout');
Route::post('/sessions-save', [SessionController::class, 'save'])->name('sessions-save');
Route::post('/sessions-update', [SessionController::class, 'update'])->name('sessions-update');
Route::get('/sessions-selectrow/{sessid}', [SessionController::class, 'selectRow'])->name('sessions-selectrow');
Route::get('/sessions-annuler', [SessionController::class, 'cancel'])->name('sessions-annuler');
Route::get('/sessions-supp/{sessid}', [SessionController::class, 'delete'])->name('sessions-supp');
Route::get('/sessions-changecourante/{sessid}', [SessionController::class, 'changeCourante'])->name('sessions-changecourante');

// Groupes par sessions
Route::get('/groupessessions', [GroupesSessionsController::class, 'read']);
Route::get('/groupessessions-ajout', [GroupesSessionsController::class, 'addRow'])->name('groupessessions-ajout');
Route::post('/groupessessions-save', [GroupesSessionsController::class, 'save'])->name('groupessessions-save');
Route::post('/groupessessions-update', [GroupesSessionsController::class, 'update'])->name('groupessessions-update');
Route::get('/groupessessions-annuler', [GroupesSessionsController::class, 'cancel'])->name('groupessessions-annuler');
Route::get('/groupessessions-selectsessionsrow/{sessid}', [GroupesSessionsController::class, 'selectSessionsRow'])->name('groupessessions-selectsessionsrow');
Route::get('/groupessessions-selectgroupmatrow/{groupmatid}', [GroupesSessionsController::class, 'selectGroupMatRow'])->name('groupessessions-selectgroupmatrow');
Route::get('/groupessessions-ajouterGroupSess', [GroupesSessionsController::class, 'addGroupSess'])->name('groupessessions-ajouterGroupSess');
Route::get('/groupessessions-groupmatsupp/{groupmatid}', [GroupesSessionsController::class, 'groupMatDelete'])->name('groupessessions-groupmatsupp');
Route::get('/groupessessions-groupsesssupp/{groupsessid}', [GroupesSessionsController::class, 'groupSessDelete'])->name('groupessessions-groupsesssupp');

// Eleves par groupes
Route::get('/elevesgroupes', [ElevesGroupesController::class, 'read']);
Route::get('/elevesgroupes-ajout', [ElevesGroupesController::class, 'addRow'])->name('elevesgroupes-ajout');
Route::post('/elevesgroupes-save', [ElevesGroupesController::class, 'save'])->name('elevesgroupes-save');
Route::post('/elevesgroupes-update', [ElevesGroupesController::class, 'update'])->name('elevesgroupes-update');
Route::get('/elevesgroupes-annuler', [ElevesGroupesController::class, 'cancel'])->name('elevesgroupes-annuler');
Route::get('/elevesgroupes-selectelevesrow/{studid}', [ElevesGroupesController::class, 'selectElevesRow'])->name('elevesgroupes-selectelevesrow');
Route::get('/elevesgroupes-selectgrmatsrow/{grmat}', [ElevesGroupesController::class, 'selectGrMatRow'])->name('elevesgroupes-selectgrmatsrow');
Route::get('/elevesgroupes-ajouterEleveGroup', [ElevesGroupesController::class, 'addEleveGroup'])->name('elevesgroupes-ajouterEleveGroup');
Route::get('/elevesgroupes-elevessupp/{studid}', [ElevesGroupesController::class, 'ElevesDelete'])->name('elevesgroupes-elevessupp');
Route::get('/elevesgroupes-elevesgroupsesssupp/{elevegroupsesid}', [ElevesGroupesController::class, 'ElevesGroupesDelete'])->name('elevesgroupes-elevesgroupsesssupp');

// Periodes
Route::get('/periodes', [PeriodesController::class, 'read']);
Route::post('/periodes-createMonth', [PeriodesController::class, 'createMonth'])->name('periodes-createMonth');
