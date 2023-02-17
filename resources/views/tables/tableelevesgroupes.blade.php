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