<table class="w-full">
    <thead class="bg-blue-400 border-2 border-slate-700">
        <tr>
            <th class="p-4 border-2 border-slate-700">Id</th>
            <th class="p-4 border-2 border-slate-700">Etape</th>
            <th class="p-4 border-2 border-slate-700">Date de debut</th>
            <th class="p-4 border-2 border-slate-700">Date de fin</th>
            <th class="p-4 border-2 border-slate-700">Courante</th>
            <th class="p-4 border-2 border-slate-700">Action</th>
        </tr>
    </thead>

    <tbody >
        @foreach ($sessions as $session)
            <tr class="@if($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th class="border-2 border-slate-700"><input class="w-24 text-center @if($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$session->id}}"></th>
                <th class="border-2 border-slate-700"><input class="w-24 text-center @if($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$session->sess_num}}"></th>
                <th class="border-2 border-slate-700"><input class="text-center @if($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="date" value="{{$session->sess_startdate}}"></th>
                <th class="border-2 border-slate-700"><input class="text-center @if($session->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="date" value="{{$session->sess_enddate}}"></th>
                <th class="border-2 border-slate-700">@if($session->sess_current == 1) <i class="fa-sharp fa-solid fa-xmark"></i> @endif</th>
                <th class="border-2 border-slate-700"><a href="{{route('sessions-supp', ['sessid'=>$session->id])}}"><i class="fa-solid fa-trash-can"></i></a></th>
            </tr>
        @endforeach
        <form action="{{route('sessions-save')}}" method="post" id="formEnregistrer">  
            @csrf         
            @if(Session::has('nbrsessionsvide'))
                @for ($i = Session::get('nbrsessionsbd'); $i <= Session::get('nbrsessionsvide'); $i++)                            
                    <tr class="bg-red-200">
                        <th class="border-2 border-slate-700">{{$i}}</th>
                        <th class="border-2 border-slate-700"> <select class="text-center bg-red-200" type="text" name="etape">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                </select></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datedebut"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datefin"></th>
                        <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="checkbox" name="courante"></th>
                        <th class="border-2 border-slate-700"><a href=""><i class="fa-solid fa-trash-can"></i></a></th>
                    </tr>                  
                @endfor
            @endif
        </form>          
    </tbody>
</table>