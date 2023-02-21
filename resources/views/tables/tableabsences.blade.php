<table class="w-full">
    <col>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <tr class="bg-blue-400 border-2 border-slate-700">
      <th rowspan="2" class="border-2 border-slate-700">Nom</th>
      @foreach($examens_travaux as $examen_travail)
        <th colspan="2" scope="colgroup" class="border-2 border-slate-700 @if(Session::get('updateid') == $examen_travail->id) bg-amber-300 @endif">
            {{$examen_travail->extr_name}}<a href="{{route('notes-updateligne', ['id'=> $examen_travail->id])}}"><i class="fa-solid fa-pen"></i></a>
        </th>
      @endforeach 
    </tr>
    <tr class="bg-blue-300 border-2 border-slate-700">
        @foreach($examens_travaux as $examen_travail)
            <th scope="col" class="border-2 border-slate-700 @if(Session::get('updateid') == $examen_travail->id) bg-amber-300 @endif" id="surcombien">{{$examen_travail->extr_surcombien}}</th>
            <th scope="col" class="border-2 border-slate-700 @if(Session::get('updateid') == $examen_travail->id) bg-amber-300 @endif">100%</th>
        @endforeach
        <th scope="col" class="border-2 border-slate-700">Note finale</th>
    </tr>



    @foreach($groupes_eleves as $groupe_eleve)
        <tr class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
            <th scope="row" class="border-2 border-slate-700 @if($groupe_eleve->id % 2) bg-green-400 @else bg-green-300 @endif">{{$groupe_eleve->stud_name}}</th> 

            @foreach($examens_travaux as $examen_travail)
                @foreach($notes as $note)
                
                    @if($examen_travail->id == $note->extr_id) 
                        <td class="text-center border-2 border-slate-700">
                            @if(Session::get('updateid') == $examen_travail->id)
                                <input class="text-center @if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$note->note_note}}" name="note" id="note-{{$groupe_eleve->id}}" onblur="Sortie_input({{$groupe_eleve->id}})">
                            @else
                                {{$note->note_note}}
                            @endif                                   
                        </td>
                        <td class="text-center border-2 border-slate-700">
                            @if(Session::get('updateid') == $examen_travail->id)
                                <input class="text-center @if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$note->note_note100}}" name="note100" id="note100-{{$groupe_eleve->id}}" disabled>
                            @else
                                {{$note->note_note100}}
                            @endif 
                        </td>
                    @endif

                @endforeach
            @endforeach

        </tr>
    @endforeach
</table>