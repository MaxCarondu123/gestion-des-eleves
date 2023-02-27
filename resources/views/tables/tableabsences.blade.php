<table class="w-full">
    <col>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <tr class="bg-blue-400 border-2 border-slate-700">
      <th rowspan="2" class="border-2 border-slate-700">Nom</th>
      <th colspan="2" scope="colgroup" class="border-2 border-slate-700">8h35-9h15</th>
      <th colspan="2" scope="colgroup" class="border-2 border-slate-700">9h15-10h30</th>
      <th colspan="2" scope="colgroup" class="border-2 border-slate-700">10h45-11h45</th>
      <th colspan="2" scope="colgroup" class="border-2 border-slate-700">1h00-2h15</th>
      <th colspan="2" scope="colgroup" class="border-2 border-slate-700">2h30-3h15</th>
    </tr>
    <tr class="bg-blue-300 border-2 border-slate-700">
        <th scope="col" class="border-2 border-slate-700">Absent</th>
        <th scope="col" class="border-2 border-slate-700">Description</th>
        <th scope="col" class="border-2 border-slate-700">Absent</th>
        <th scope="col" class="border-2 border-slate-700">Description</th>
        <th scope="col" class="border-2 border-slate-700">Absent</th>
        <th scope="col" class="border-2 border-slate-700">Description</th>
        <th scope="col" class="border-2 border-slate-700">Absent</th>
        <th scope="col" class="border-2 border-slate-700">Description</th>
        <th scope="col" class="border-2 border-slate-700">Absent</th>
        <th scope="col" class="border-2 border-slate-700">Description</th>
    </tr>


    <form action="{{route('absences-save')}}" method="post" id="formSave">
        @csrf
        @foreach($groupes_eleves as $groupe_eleve)
            <tr class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th scope="row" class="border-2 border-slate-700 @if($groupe_eleve->id % 2) bg-green-400 @else bg-green-300 @endif">{{$groupe_eleve->stud_name}}</th> 

                <th class="text-center border-2 border-slate-700">
                    <input type="checkbox" name="periode1_{{$groupe_eleve->id}}"
                        @foreach($absences as $absence)
                            @if($groupe_eleve->id == $absence->group_stud_id)
                                @foreach($periodes as $periode)
                                    @if($periode->per_heure == '8h35-9h15' && $periode->id == $absence->per_id)
                                        checked 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    >
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="description1_{{$groupe_eleve->id}}">
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input type="checkbox" name="periode2_{{$groupe_eleve->id}}"
                        @foreach($absences as $absence)
                            @if($groupe_eleve->id == $absence->group_stud_id)
                                @foreach($periodes as $periode)
                                    @if($periode->per_heure == '9h15-10h30' && $periode->id == $absence->per_id)
                                        checked 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    >
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="description2_{{$groupe_eleve->id}}">
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input type="checkbox" name="periode3_{{$groupe_eleve->id}}"
                        @foreach($absences as $absence)
                            @if($groupe_eleve->id == $absence->group_stud_id)
                                @foreach($periodes as $periode)
                                    @if($periode->per_heure == '10h45-11h45' && $periode->id == $absence->per_id)
                                        checked 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    >
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="description3_{{$groupe_eleve->id}}">
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input type="checkbox" name="periode4_{{$groupe_eleve->id}}"
                        @foreach($absences as $absence)
                            @if($groupe_eleve->id == $absence->group_stud_id)
                                @foreach($periodes as $periode)
                                    @if($periode->per_heure == '1h00-2h15' && $periode->id == $absence->per_id)
                                        checked 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    >
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="description4_{{$groupe_eleve->id}}">
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input type="checkbox" name="periode5_{{$groupe_eleve->id}}"
                        @foreach($absences as $absence)
                            @if($groupe_eleve->id == $absence->group_stud_id)
                                @foreach($periodes as $periode)
                                    @if($periode->per_heure == '2h30-3h15' && $periode->id == $absence->per_id)
                                        checked 
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    >
                </th>
                <th class="text-center border-2 border-slate-700">
                    <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="description5_{{$groupe_eleve->id}}">
                </th>

            </tr>
        @endforeach
    </form>
</table>