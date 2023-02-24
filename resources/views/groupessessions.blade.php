@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')   

        <!--Contenue des tables-->
        <div class="flex w-full h-1/2 bg-gray-100">

            <!--Table des groupes/matieres(en haut a gauche)-->   
            <div class="flex w-3/4 h-full">
                <div class="w-full h-full">
                    <div class="flex justify-center items-center h-10">
                        <h1 class="font-bold text-2xl">Table des groupes avec leur matiere</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Matiere</th>
                                    <th class="p-4 border-2 border-slate-700">Nom</th>
                                    <th class="p-4 border-2 border-slate-700">Numero</th>
                                    <th class="p-4 border-2 border-slate-700">Description</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{route('groupessessions-update')}}" method="post" id="formMettreAJour">  
                                    @csrf  
                                    @foreach ($groupes_matieres as $groupe_matiere)
                                        <tr class="@if(Session::get('groupmatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                            <th class="border-2 border-slate-700">
                                                <input class="w-24 text-center @if(Session::get('groupmatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$groupe_matiere->groupmat_mat}}" name="matiere">
                                            </th>
                                            <th class="border-2 border-slate-700">
                                                <input class="text-center @if(Session::get('groupmatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$groupe_matiere->groupmat_name}}" name="nom">
                                            </th>
                                            <th class="border-2 border-slate-700">
                                                <input class="text-center @if(Session::get('groupmatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$groupe_matiere->groupmat_num}}" name="numero">
                                            </th>
                                            <th class="border-2 border-slate-700">
                                                <input class="text-center @if(Session::get('groupmatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$groupe_matiere->groupmat_description}}" name="description">
                                            </th>
                                            <th class="border-2 border-slate-700">
                                                <div class="flex justify-evenly">
                                                    <a href="{{route('groupessessions-groupmatsupp', ['groupmatid'=>$groupe_matiere->id])}}"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{route('groupessessions-selectgroupmatrow', ['groupmatid'=>$groupe_matiere->id])}}"><i class="fa-solid fa-square-check"></i></a>
                                                </div>                                           
                                            </th>
                                        </tr>
                                    @endforeach 
                                </form>   
                                <form action="{{route('groupessessions-save')}}" method="post" id="formEnregistrer">  
                                    @csrf         
                                    @if(Session::has('idsuivant'))                       
                                        <tr class="bg-red-200">
                                            <th class="border-2 border-slate-700">
                                                <select class="text-center bg-red-200" name="matiere">
                                                    <option value="Anglais">Anglais</option>
                                                    <option value="Francais">Francais</option>
                                                    <option value="Mathematique">Mathematique</option>
                                                    <option value="Artsplastiques">Arts plastiques</option>
                                                    <option value="Educationphysique">Education physique</option>
                                                    <option value="Ethiqueetculturereligieuse">Ethique et culture religieuse</option>
                                                    <option value="Histoire">Histoire</option>
                                                    <option value="Geographie">Geographie</option>
                                                </select>
                                            </th>
                                            <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="nom"></th>
                                            <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="numero"></th>
                                            <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="description"></th>
                                            <th class="border-2 border-slate-700"></th>
                                        </tr>                  
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
                        <a href="{{route('groupessessions-ajout')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter un groupe</button></a>
                        <a href="{{route('groupessessions-ajouterGroupSess')}}"><button class="w-full py-2 mb-6 bg-green-400 rounded-3xl">Ajouter un groupe a la session</button></a>
                        <button class="w-full py-2 mb-6 bg-green-400 rounded-3xl" type="submit" form="formMettreAJour">Mettre a jour</button>
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
                        <h1 class="font-bold text-2xl">Table des groupes par sessions</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Etape</th>
                                    <th class="p-4 border-2 border-slate-700">Nom du groupe</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sess_grmats as $sess_grmat)
                                    <tr class="@if($sess_grmat->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                        <th class="border-2 border-slate-700 @if($sess_grmat->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                            @foreach ($sessions as $session)
                                                @if($sess_grmat->sess_id == $session->id)
                                                    {{$session->sess_num}}
                                                @endif
                                            @endforeach
                                        </th>
                                        <th class="border-2 border-slate-700 @if($sess_grmat->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                            @foreach ($groupes_matieres as $groupe_matiere)
                                                @if($sess_grmat->groupmat_id == $groupe_matiere->id)
                                                    {{$groupe_matiere->groupmat_name}}
                                                @endif
                                            @endforeach
                                        </th>
                                        <th class="border-2 border-slate-700 @if($sess_grmat->id % 2) bg-zinc-300 @else bg-zinc-200 @endif"><a href="{{route('groupessessions-groupsesssupp', ['groupsessid'=>$sess_grmat->id])}}"><i class="fa-solid fa-trash-can"></i></a></th>
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
                        <h1 class="font-bold text-2xl">Table des sessions</h1>
                    </div> 
                    <div class="px-16 pt-4">
                        <table class="w-full">
                            <thead class="bg-blue-400 border-2 border-slate-700">
                                <tr>
                                    <th class="p-4 border-2 border-slate-700">Etape</th>
                                    <th class="p-4 border-2 border-slate-700">Date de debut</th>
                                    <th class="p-4 border-2 border-slate-700">Date de fin</th>
                                    <th class="p-4 border-2 border-slate-700">Courante</th>
                                    <th class="p-4 border-2 border-slate-700">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sessions as $session)
                                    <tr class="@if(Session::get('sessionsrowselect') == $session->id) bg-amber-300 @elseif($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                                        <th class="border-2 border-slate-700">{{$session->sess_num}}</th>
                                        <th class="border-2 border-slate-700">{{$session->sess_startdate}}</th>
                                        <th class="border-2 border-slate-700">{{$session->sess_enddate}}</th>
                                        <th class="border-2 border-slate-700">@if($session->sess_current == 1) <i class="fa-sharp fa-solid fa-xmark"></i> @endif</th>
                                        <th class="border-2 border-slate-700"><a href="{{route('groupessessions-selectsessionsrow', ['sessid'=>$session->id])}}"><i class="fa-solid fa-square-check"></i></a></th>
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