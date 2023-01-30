<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\connexion;

// Connexion
Route::get('/connexion', [connexion::class, 'login']);
Route::get('/inscription', [connexion::class, 'register']);
Route::post('/connexion-utilisateur', [connexion::class, 'connexionUtilisateur'])->name('connexion-utilisateur');
Route::post('/inscription-utilisateur', [connexion::class, 'inscriptionUtilisateur'])->name('inscription-utilisateur');

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
Route::get('/sessions', function () {
    return view('sessions');
});

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