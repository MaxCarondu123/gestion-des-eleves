<body>
    <div class="flex flex-row h-screen">

        <!--Barre de navigation-->
        <div class="flex justify-center items-center bg-indigo-100 w-72">
            <div>
                <h1 class="flex justify-center font-bold text-lg mb-2">Action</h1>
                <div class="flex justify-around">
                    <button class="flex justify-center py-2 mb-6 w-full bg-sky-200 rounded-3xl border-2 border-black"><a href="">Courante</a></button>
                    <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="">Annuelle</a></button>
                </div>
                <div class="border-2 border-black mb-6"></div>
                <!--Courante-->
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-200 rounded-3xl  border-2 border-black"><a href="accueil">Accueil / Horaire</a></button>                
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="absences">Gestion des absences</a></button> 
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="notes">Gestion des notes</a></button>
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="examenstravaux">Gestion des examens ou travaux</a></button>

                <!--Annuelle-->
                <!--<button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="sessions">Gestion des sessions</a></button>
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="groupessessions">Gestion des groupes par sessions</a></button>                
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="elevesgroupes">Gestion des eleves par groupes</a></button> 
                <button class="flex justify-center py-2 mb-6 w-full bg-sky-200 rounded-3xl border-2 border-black"><a href="periodes">Gestion des periodes</a></button>--> 

                <button class="flex justify-center py-2 mb-6 w-full bg-red-200 rounded-3xl"><a href="deconnecter">Se deconnecter</a></button>
                <h1>{{Route::currentRouteName()}}</h1>  
                @if(Route::currentRouteName() == 'absences')
                    <button class="flex justify-center py-2 mb-6 w-full bg-sky-50 rounded-3xl"><a href="examenstravaux">Gestion des examens ou travaux</a></button>
                @endif
            </div>
        </div>