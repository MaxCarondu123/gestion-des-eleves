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



    @foreach($groupes_eleves as $groupe_eleve)
        <tr class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
            <th scope="row" class="border-2 border-slate-700 @if($groupe_eleve->id % 2) bg-green-400 @else bg-green-300 @endif">{{$groupe_eleve->stud_name}}</th> 

            <th class="text-center border-2 border-slate-700">
                <input type="checkbox"
                @foreach($absences as $absence)

                @endforeach>
            </th>
            <th class="text-center border-2 border-slate-700">
                <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input type="checkbox">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input type="checkbox">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input type="checkbox">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input type="checkbox">
            </th>
            <th class="text-center border-2 border-slate-700">
                <input class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text">
            </th>

        </tr>
    @endforeach
</table>