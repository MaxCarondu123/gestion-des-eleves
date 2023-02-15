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
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Id</th>
                                    <th class="p-4 border-2 border-slate-700">Nom</th>
                                    <th class="p-4 border-2 border-slate-700">Sexe</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eleves as $eleve)
                                    <tr class="@if(Session::get('groupmatrowselect') == $eleve->stud_id) bg-amber-300 @elseif($eleve->stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                        <th class="border-2 border-slate-700 @if(Session::get('groupmatrowselect') == $eleve->stud_id) bg-amber-300 @elseif($eleve->stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">{{$eleve->stud_id}}</th>
                                        <th class="border-2 border-slate-700"><input class="w-24 text-center @if(Session::get('groupmatrowselect') == $eleve->stud_id) bg-amber-300 @elseif($eleve->stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$eleve->stud_name}}"></th>
                                        <th class="border-2 border-slate-700"><input class="text-center @if(Session::get('groupmatrowselect') == $eleve->stud_id) bg-amber-300 @elseif($eleve->stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$eleve->stud_sexe}}"></th>
                                        <th class="border-2 border-slate-700">
                                            <div class="flex justify-evenly">
                                                <a href="{{route('groupessessions-groupmatsupp', ['groupmatid'=>$groupe_matiere->groupmat_id])}}"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="{{route('groupessessions-selectgroupmatrow', ['groupmatid'=>$groupe_matiere->groupmat_id])}}"><i class="fa-solid fa-square-check"></i></a>
                                            </div>                                           
                                        </th>
                                    </tr>
                                @endforeach 
                                <form action="{{route('groupessessions-save')}}" method="post" id="formEnregistrer">  
                                    @csrf         
                                    @if(Session::has('nbrgroupmatvide'))
                                        @for ($i = Session::get('nbrgroupmatbd'); $i <= Session::get('nbrgroupmatvide'); $i++)                            
                                            <tr class="bg-red-200">
                                                <th class="border-2 border-slate-700">{{$i}}</th>
                                                <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="matiere"></th>
                                                <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="nom"></th>
                                                <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="numero"></th>
                                                <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="description"></th>
                                                <th class="border-2 border-slate-700"><a href="{{route('groupessessions-annuler')}}"><i class="fa-solid fa-trash-can"></i></a></th>
                                            </tr>                  
                                        @endfor
                                    @endif
                                </form>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--Les boutons(en haut a droite)-->   
            <div class="flex w-1/4 h-full bg-blue-200">
                <div class="flex items-center">
                    <div class="mx-12">
                        <a href="{{route('elevesgroupes-ajout')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter un eleve</button></a>
                        <a href="{{route('groupessessions-ajouterGroupSess')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter un eleve au groupe</button></a>
                        <button class="w-full py-2 mb-6 bg-green-400 rounded-3xl" type="submit" form="formEnregistrer">Enregistrer</button>
                        <a href="{{route('groupessessions-annuler')}}"><button class="w-full py-2 mb-6 bg-red-300 rounded-3xl">Annuler</button></a>
                        <!--Erreur-->
                        <span class="text-red-500">@error('matiere')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
                        <span class="text-red-500">@error('nom')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
                        <span class="text-red-500">@error('numero')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span>
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
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Id</th>
                                    <th class="p-4 border-2 border-slate-700">Groupe</th>
                                    <th class="p-4 border-2 border-slate-700">Nom</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($elevesgroupes as $elevegroupe)
                                    <tr class="@if($elevegroupe->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                        <th class="border-2 border-slate-700 @if($elevegroupe->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">{{$elevegroupe->group_stud_id}}</th>
                                        <th class="border-2 border-slate-700 @if($elevegroupe->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">{{$elevegroupe->groupmat_id}}</th>
                                        <th class="border-2 border-slate-700 @if($elevegroupe->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">{{$elevegroupe->stud_id}}</th>
                                        <th class="border-2 border-slate-700 @if($elevegroupe->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif"><a href="{{route('groupessessions-groupsesssupp', ['groupsessid'=>$sess_grmat->sess_grmat_id])}}"><i class="fa-solid fa-trash-can"></i></a></th>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>                  
            </div>

            <!--Table des sessions(en bas a droite)--> 
            <div class="flex w-1/2 h-full ">
                <div class="w-full">
                    <div class="flex justify-center items-center h-10">
                        <h1 class="font-bold text-2xl">Table des groupes/matieres</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Id</th>
                                    <th class="p-4 border-2 border-slate-700">Matiere</th>
                                    <th class="p-4 border-2 border-slate-700">Numero</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupes_matieres as $groupe_matiere)
                                    <tr class="@if(Session::get('sessionsrowselect') == $groupe_matiere->groupmat_id) bg-amber-300 @elseif($groupe_matiere->groupmat_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                        <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_id}}</th>
                                        <th class="border-2 border-slate-700">{{$groupe_matiere->sgroupmat_mat}}</th>
                                        <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_num}}</th>
                                        <th class="border-2 border-slate-700"><a href="{{route('groupessessions-selectsessionsrow', ['sessid'=>$groupe_matiere->groupmat_id])}}"><i class="fa-solid fa-square-check"></i></a></th>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</body>