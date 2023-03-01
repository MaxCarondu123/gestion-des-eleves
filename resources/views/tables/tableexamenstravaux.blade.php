<table class="w-full">
    <thead class="bg-blue-400 border-2 border-slate-700">
        <tr>
            <th class="p-4 border-2 border-slate-700">Nom</th>
            <th class="p-4 border-2 border-slate-700">Date</th>
            <th class="p-4 border-2 border-slate-700">Ponderation</th>
            <th class="p-4 border-2 border-slate-700">Sur combien</th>
            <th class="p-4 border-2 border-slate-700">Examen ou Travail</th>
            <th class="p-4 border-2 border-slate-700">Action</th>
        </tr>
    </thead>

    <tbody >
        <form action="{{route('examenstravaux-update')}}" method="post" id="formUpdate">
        @foreach ($examens_travaux as $examen_travail)
            
                @csrf
                <tr class="@if(Session::get('updateid') == $examen_travail->id) bg-amber-300 @elseif($examen_travail->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $examen_travail->id)
                            <input class="text-center bg-amber-300" type="text" value="{{$examen_travail->extr_name}}" name="nom">
                        @else
                            {{$examen_travail->extr_name}}
                        @endif                        
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $examen_travail->id)
                            <input class="text-center bg-amber-300" type="date" value="{{$examen_travail->extr_date}}" name="date">
                        @else
                            {{$examen_travail->extr_date}}
                        @endif 
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $examen_travail->id)
                            <input class="text-center bg-amber-300" type="text" value="{{$examen_travail->extr_pond}}" name="ponderation">
                        @else
                            {{$examen_travail->extr_pond}}
                        @endif 
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $examen_travail->id)
                            <input class="text-center bg-amber-300" type="text" value="{{$examen_travail->extr_surcombien}}" name="surcombien">
                        @else
                            {{$examen_travail->extr_surcombien}}
                        @endif 
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $examen_travail->id)
                            <select class="text-center bg-amber-300" name="eorw">
                                <option @if($examen_travail->extr_eorw == 'E') selected @endif value="E">Examen</option>
                                <option @if($examen_travail->extr_eorw == 'T') selected @endif value="T">Travail</option>
                            </select>
                        @else
                            @if($examen_travail->extr_eorw == 'E')
                                Examen
                            @else
                                Travail
                            @endif
                        @endif 
                    </th>
                    <th class="border-2 border-slate-700">
                        <div class="flex justify-evenly">
                            <a href="{{route('examenstravaux-supp', ['id'=> $examen_travail->id])}}" onclick="return confirm('Etes-vous sur de supprimer?')"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{route('examenstravaux-updateligne', ['id'=> $examen_travail->id])}}"><i class="fa-solid fa-pen"></i></a>            
                        </div>
                    </th>
                </tr>
            
        @endforeach
    </form>
        <form action="{{route('examenstravaux-creer')}}" method="post" id="formCreate">  
            @csrf         
            @if(Session::has('idsuivant'))                        
                    <tr class="bg-red-200">
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="nom"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="date"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="ponderation"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="surcombien"></th>
                        <th class="border-2 border-slate-700"><select class="text-center bg-red-200" name="eorw">
                                                                <option value="E">Examen</option>
                                                                <option value="T">Travail</option>
                                                               </select>
                        <th class="border-2 border-slate-700"></th>
                    </tr>                  
            @endif
        </form>          
    </tbody>
</table>