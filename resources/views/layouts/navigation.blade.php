<body>
    <div class="flex flex-row h-screen">

        <!--Barre de navigation-->
        <div class="flex justify-center items-center bg-indigo-100 w-72">
            <div>
                <h1 class="flex justify-center font-bold text-lg mb-2">Menu</h1>
                <div class="flex justify-around">
                    <button class="flex justify-center mr-1 py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/accueil' || url()->current() == 'http://127.0.0.1:8000/absences' || url()->current() == 'http://127.0.0.1:8000/notes' || url()->current() == 'http://127.0.0.1:8000/examenstravaux') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="accueil">Courante</a></button>
                    <button class="flex justify-center ml-1 py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/sessions' || url()->current() == 'http://127.0.0.1:8000/sessions/ajout' || url()->current() == 'http://127.0.0.1:8000/groupessessions' || url()->current() == 'http://127.0.0.1:8000/elevesgroupes' || url()->current() == 'http://127.0.0.1:8000/periodes') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="sessions">Annuelle</a></button>
                </div>
                <div class="border-2 border-black mb-6"></div>

                <!--Courante-->
                @if(url()->current() == 'http://127.0.0.1:8000/accueil' || url()->current() == 'http://127.0.0.1:8000/absences' || url()->current() == 'http://127.0.0.1:8000/notes' || url()->current() == 'http://127.0.0.1:8000/examenstravaux')
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/accueil') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="accueil">Accueil / Horaire</a></button>                
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/absences') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="absences">Gestion des absences</a></button> 
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/notes') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="notes">Gestion des notes</a></button>
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/examenstravaux') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="examenstravaux">Gestion des examens ou travaux</a></button>
                @endif

                <!--Annuelle-->
                @if(url()->current() == 'http://127.0.0.1:8000/sessions' || url()->current() == 'http://127.0.0.1:8000/sessions/ajout' || url()->current() == 'http://127.0.0.1:8000/groupessessions' || url()->current() == 'http://127.0.0.1:8000/elevesgroupes' || url()->current() == 'http://127.0.0.1:8000/periodes')
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/sessions' || url()->current() == 'http://127.0.0.1:8000/sessions/ajout') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="sessions">Gestion des sessions</a></button>
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/groupessessions') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="groupessessions">Gestion des groupes par sessions</a></button>                
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/elevesgroupes') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="elevesgroupes">Gestion des eleves par groupes</a></button> 
                    <button class="flex justify-center py-2 mb-6 w-full rounded-3xl @if(url()->current() == 'http://127.0.0.1:8000/periodes') bg-sky-200 border-2 border-black @else bg-sky-50 @endif "><a href="periodes">Gestion des periodes</a></button>
                @endif

                <button class="flex justify-center py-2 mb-6 w-full bg-red-200 rounded-3xl"><a href="{{route('deconnecter')}}">Se deconnecter</a></button>  
            </div>
        </div>
