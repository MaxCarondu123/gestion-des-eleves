@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')    
    
        <!--Contenue des tables-->
        <div class="flex w-full h-1/2 bg-gray-100">

            <!--Table des groupes/matieres(en haut a gauche)-->   
            <div class="flex w-3/4 h-full">
                <div class="w-full h-full">
                    <div class="flex justify-center items-center h-10">
                        <h1 class="font-bold text-2xl">Table des eleves</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        @include('tables.tableeleves')
                    </div>
                </div>
            </div>

            <!--Les boutons(en haut a droite)-->   
            <div class="flex w-1/4 h-full bg-blue-200">
                <div class="flex items-center">
                    <div class="mx-12">
                        <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
                        <div class="border-2 border-black mb-6"></div> 
                        <a href="{{route('elevesgroupes-ajout')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter un eleve</button></a>
                        <a href="{{route('elevesgroupes-ajouterEleveGroup')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter le ou les eleves au groupe</button></a>
                        <button class="w-full py-2 mb-6 bg-green-400 rounded-3xl" type="submit" form="formMettreAJour">Mettre a jour</button>
                        <button class="w-full py-2 mb-6 bg-green-400 rounded-3xl" type="submit" form="formEnregistrer">Enregistrer</button>
                        <a href="{{route('elevesgroupes-annuler')}}"><button class="w-full py-2 mb-6 bg-red-300 rounded-3xl">Annuler</button></a>
                        <!--Erreur-->
                        <span class="text-red-500">@error('nom')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span>
                    </div>                   
                </div>            
            </div>

        </div>

        <div class="flex w-full h-1/2 bg-gray-100">

            <!--Table des groupes par sessions(en bas a gauche)--> 
            <div class="flex w-1/2 h-full ">
                <div class="w-full">
                    <div class="flex justify-center items-center h-10">
                        <h1 class="font-bold text-2xl">Table des eleves par groupes</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        @include('tables.tableelevesgroupes')
                    </div>
                </div>                  
            </div>

            <!--Table des sessions(en bas a droite)--> 
            <div class="flex w-1/2 h-full ">
                <div class="w-full">
                    <div class="flex justify-center items-center h-10">
                        <h1 class="font-bold text-2xl">Table des groupes avec leur matiere</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        @include('tables.tablegroupesmatieres')
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</body>