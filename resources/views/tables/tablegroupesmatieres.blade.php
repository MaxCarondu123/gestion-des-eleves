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
        @foreach ($groupes_matieres as $groupe_matiere)
            <tr class="@if(Session::get('sessionsrowselect') == $groupe_matiere->id || Session::get('grMatrowselect') == $groupe_matiere->id) bg-amber-300 @elseif($groupe_matiere->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_mat}}</th>
                <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_name}}</th>
                <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_num}}</th>
                <th class="border-2 border-slate-700">{{$groupe_matiere->groupmat_description}}</th>
                <th class="border-2 border-slate-700">
                    @if(URL::current() == 'http://127.0.0.1:8000/groupessessions')
                        <a href="{{route('groupessessions-selectsessionsrow', ['sessid'=>$groupe_matiere->id])}}">
                    @elseif(URL::current() == 'http://127.0.0.1:8000/elevesgroupes')
                        <a href="{{route('elevesgroupes-selectgrmatsrow', ['grmat'=>$groupe_matiere->id])}}">
                    @endif          
                <i class="fa-solid fa-square-check"></i></a></th>
            </tr>
        @endforeach 
    </tbody>
</table>