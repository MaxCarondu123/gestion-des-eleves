<table class="w-full">
    <thead class="bg-blue-400 border-2 border-slate-700">
        <tr>
            <th class="p-4 border-2 border-slate-700">Date de la periode</th>
            <th class="p-4 border-2 border-slate-700">Heure de la periode</th>
            <th class="p-4 border-2 border-slate-700">Notes</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($periodes as $periode)
            <tr class="@if($periode->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                <th class="border-2 border-slate-700">{{$periode->per_date}}</th>
                <th class="border-2 border-slate-700">{{$periode->per_heure}}</th>
                <th class="border-2 border-slate-700">{{$periode->per_notes}}</th>
            </tr>
        @endforeach 
    </tbody>
</table>