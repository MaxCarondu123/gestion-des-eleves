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