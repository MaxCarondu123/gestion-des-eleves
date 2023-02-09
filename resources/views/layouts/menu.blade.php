<div class="flex flex-col w-full">
    <!--Menu en haut-->
    <div class="flex justify-between bg-gray-200 h-2/12 p-10 ">
        <h1 class="font-bold text-xl">@if(URL::current() == 'http://127.0.0.1:8000/accueil') Accueil / Horaire
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/absences') Absences
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/notes') Notes
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/examenstravaux') Examens et Travaux
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/sessions' || url()->current() == 'http://127.0.0.1:8000/sessions/ajout') Sessions
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/groupessessions') Groupes par sessions
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/elevesgroupes') Eleves par groupes
                                      @elseif(URL::current() == 'http://127.0.0.1:8000/periodes') Periodes
                                      @endif </h1>
    </div>  