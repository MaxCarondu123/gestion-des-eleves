<table class="w-full">
    <thead class="bg-blue-400 border-2 border-slate-700">
        <tr>
            <th class="p-4 border-2 border-slate-700">Nom</th>
            <th class="p-4 border-2 border-slate-700">Sexe</th>
            <th class="p-4 border-2 border-slate-700">Action</th>
        </tr>
    </thead>
    
    <tbody>
        <form action="{{route('elevesgroupes-update')}}" method="post" id="formMettreAJour">
            @csrf
            @foreach ($eleves as $eleve)
                @php $selectRow = false; @endphp 
                @if(Session::has('multipleeleverowselect')) 
                    @foreach(Session::get('multipleeleverowselect') as $eleveId)        
                        @if($eleveId == $eleve->id) 
                            @php $selectRow = true; @endphp                                       
                        @endif 
                    @endforeach
                @endif

                <tr class="@if($selectRow == true) bg-cyan-300 @elseif(Session::get('elevesrowselect') == $eleve->id) bg-amber-300 @elseif($eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    <th class="border-2 border-slate-700">
                        @if(Session::get('elevesrowselect') == $eleve->id)
                            <input class="w-24 text-center bg-amber-300" type="text" value="{{$eleve->stud_name}}" name="nom">
                        @else
                            {{$eleve->stud_name}}
                        @endif
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('elevesrowselect') == $eleve->id)
                            <select class="text-center bg-amber-300" type="text" name="sexe">
                                <option value="M" @if($eleve->stud_sexe == 'M') selected @endif>Gars</option>
                                <option value="F" @if($eleve->stud_sexe == 'F') selected @endif>Fille</option>
                            </select>
                        @else
                            @if($eleve->stud_sexe == 'M')
                                Gars
                            @else
                                Fille
                            @endif
                        @endif
                    </th>
                    <th class="border-2 border-slate-700">
                        <div class="flex justify-evenly">
                            <a href="{{route('elevesgroupes-elevessupp', ['studid'=> $eleve->id])}}" onclick="return confirm('Etes-vous sur de supprimer?')"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{route('elevesgroupes-selectelevesrow', ['studid'=> $eleve->id])}}"><i class="fa-solid fa-pen"></i></a>
                            <a href="{{route('elevesgroupes-multipleselectelevesrow', ['studid'=> $eleve->id])}}"><i class="fa-solid fa-square-check"></i></a>
                        </div>                                           
                    </th>
                </tr>
            @endforeach 
        </form>
        <form action="{{route('elevesgroupes-save')}}" method="post" id="formEnregistrer">  
            @csrf         
            @if(Session::has('idsuivant'))                  
                <tr class="bg-red-200">
                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="nom"></th>
                    <th class="border-2 border-slate-700">
                        <select class="text-center bg-red-200" type="text" name="sexe">
                            <option value="M">Gars</option>
                            <option value="F">Fille</option>
                        </select>
                    </th>
                    <th class="border-2 border-slate-700"></th>
                </tr>                  
            @endif
        </form>     
    </tbody>
</table>