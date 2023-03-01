<table class="w-full">
    <thead class="bg-blue-400 border-2 border-slate-700">
        <tr>
            <th class="p-4 border-2 border-slate-700">Nom du groupe</th>
            <th class="p-4 border-2 border-slate-700">Nom de l'eleve</th>
            <th class="p-4 border-2 border-slate-700">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($elevesgroupes as $elevegroupe)
            <tr class="@if($elevegroupe->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th class="border-2 border-slate-700 @if($elevegroupe->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    @foreach($groupes_matieres as $groupe_matiere)
                        @if($elevegroupe->groupmat_id == $groupe_matiere->id)
                            {{$groupe_matiere->groupmat_name}}
                        @endif
                    @endforeach
                </th>
                <th class="border-2 border-slate-700 @if($elevegroupe->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    @foreach($eleves as $eleve)
                        @if($elevegroupe->stud_id == $eleve->id)
                            {{$eleve->stud_name}}
                        @endif
                    @endforeach
                </th>
                <th class="border-2 border-slate-700 @if($elevegroupe->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                    <a href="{{route('elevesgroupes-elevesgroupsesssupp', ['elevegroupsesid'=>$elevegroupe->id])}}" onclick="return confirm('Etes-vous sur de supprimer?')"><i class="fa-solid fa-trash-can"></i></a>
                </th>
            </tr>
        @endforeach 
    </tbody>
</table>