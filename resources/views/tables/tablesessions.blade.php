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
        <form action="{{route('sessions-update')}}" method="post" id="formMettreAJour">  
            @foreach ($sessions as $session)
                @csrf 
                <tr class="@if(Session::get('updateid') == $session->id) bg-amber-300 @elseif($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $session->id)
                            <select class="text-center bg-amber-300" type="text" value="{{$session->sess_num}}" name="etape">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        @else
                            {{$session->sess_num}}
                        @endif                     
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $session->id)
                            <input class="text-center bg-amber-300" type="date" value="{{$session->sess_startdate}}" name="datedebut">
                        @else
                            {{$session->sess_startdate}}
                        @endif
                    </th>
                    <th class="border-2 border-slate-700">
                        @if(Session::get('updateid') == $session->id)
                            <input class="text-center bg-amber-300" type="date" value="{{$session->sess_enddate}}" name="datefin">
                        @else
                            {{$session->sess_enddate}}
                        @endif
                    </th>
                    <th class="border-2 border-slate-700">
                        @if($session->sess_current == 1) <i class="fa-sharp fa-solid fa-xmark"></i> @endif
                    </th>
                    <th class="border-2 border-slate-700">
                        <div class="flex justify-evenly">
                            <a href="{{route('sessions-supp', ['sessid'=>$session->id])}}" onclick="return confirm('Etes-vous sur de supprimer?')"><i class="fa-solid fa-trash-can"></i></a>
                            <a href="{{route('sessions-selectrow', ['sessid'=>$session->id])}}"><i class="fa-solid fa-pen"></i></a>
                        </div>
                    </th>
                </tr>
            @endforeach
        </form> 
        <form action="{{route('sessions-save')}}" method="post" id="formEnregistrer">  
            @csrf         
            @if(Session::has('idsuivant'))                       
                    <tr class="bg-red-200">
                        <th class="border-2 border-slate-700"> <select class="text-center bg-red-200" type="text" name="etape">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datedebut"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datefin"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="checkbox" name="courante"></th>
                        <th class="border-2 border-slate-700"></th>
                    </tr>                  
            @endif
        </form>          
    </tbody>
</table>