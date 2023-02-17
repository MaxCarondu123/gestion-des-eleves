<table class="w-full">
    <col>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <tr class="bg-blue-400 border-2 border-slate-700">
      <th rowspan="2" class="border-2 border-slate-700">Nom</th>
      @foreach($examens_travaux as $examen_travail)
        <th colspan="2" scope="colgroup" class="border-2 border-slate-700">{{$examen_travail->extr_name}}<a href=""><i class="fa-solid fa-pen"></i></a></th>
      @endforeach 
    </tr>
    <tr class="bg-blue-300 border-2 border-slate-700">
        @foreach($examens_travaux as $examen_travail)
            <th scope="col" class="border-2 border-slate-700">{{$examen_travail->extr_surcombien}}</th>
            <th scope="col" class="border-2 border-slate-700">100%</th>
        @endforeach
        <th scope="col" class="border-2 border-slate-700">Note finale</th>
    </tr>

    @foreach($groupes_eleves as $groupe_eleve)
        <tr class="@if($groupe_eleve->group_stud_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
           
            @foreach ($eleves as $eleve)
                @if($groupe_eleve->stud_id == $eleve->stud_id)
                    <th scope="row" class="border-2 border-slate-700 @if($groupe_eleve->group_stud_id % 2) bg-green-400 @else bg-green-300 @endif">{{$eleve->stud_name}}</th>   
                
                    @foreach($examens_travaux as $examen_travail)
                        @foreach($notes as $note)
                            @if($examen_travail->id == $note->extr_id && $groupe_eleve->group_stud_id == $note->group_stud_id)
                                <td class="text-center border-2 border-slate-700">{{$note->note_note}}</td>
                                <td class="text-center border-2 border-slate-700">{{$note->note_note100}}</td>
                            @endif
                        @endforeach
                    @endforeach
                    
                @endif 
            @endforeach

            <td class="text-center border-2 border-slate-700">100</td>
        </tr>
    @endforeach
</table>