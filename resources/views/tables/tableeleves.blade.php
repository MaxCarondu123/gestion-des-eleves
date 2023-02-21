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
            <tr class="@if(Session::get('elevesrowselect') == $eleve->id) bg-amber-300 @elseif($eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th class="border-2 border-slate-700 @if(Session::get('elevesrowselect') == $eleve->id) bg-amber-300 @elseif($eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">{{$eleve->id}}</th>
                <th class="border-2 border-slate-700"><input class="w-24 text-center @if(Session::get('elevesrowselect') == $eleve->id) bg-amber-300 @elseif($eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$eleve->stud_name}}"></th>
                <th class="border-2 border-slate-700"><input class="text-center @if(Session::get('elevesrowselect') == $eleve->id) bg-amber-300 @elseif($eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$eleve->stud_sexe}}"></th>
                <th class="border-2 border-slate-700">
                    <div class="flex justify-evenly">
                        <a href="{{route('elevesgroupes-elevessupp', ['studid'=> $eleve->id])}}"><i class="fa-solid fa-trash-can"></i></a>
                        <a href="{{route('elevesgroupes-selectelevesrow', ['studid'=> $eleve->id])}}"><i class="fa-solid fa-square-check"></i></a>
                    </div>                                           
                </th>
            </tr>
        @endforeach 
        <form action="{{route('elevesgroupes-save')}}" method="post" id="formEnregistrer">  
            @csrf         
            @if(Session::has('idsuivant'))                  
                <tr class="bg-red-200">
                    <th class="border-2 border-slate-700">{{Session::get('idsuivant')}}</th>
                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="nom"></th>
                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="text" name="sexe"></th>
                    <th class="border-2 border-slate-700"><a href="{{route('groupessessions-annuler')}}"><i class="fa-solid fa-trash-can"></i></a></th>
                </tr>                  
            @endif
        </form>     
    </tbody>
</table>