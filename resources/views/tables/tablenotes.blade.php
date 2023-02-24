<table class="w-full">
    <col>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <tr class="bg-blue-400 border-2 border-slate-700">
      <th rowspan="2" class="border-2 border-slate-700">Nom</th>
      @foreach($examens_travaux as $examen_travail)
        <th colspan="2" scope="colgroup" class="border-2 border-slate-700 @if(Session::get('updateid') == $examen_travail->id) bg-amber-300 @endif">
            {{$examen_travail->extr_name}}
            <a class="mr-6" href="{{route('notes-updateligne', ['id'=> $examen_travail->id])}}"><button onclick="InputDisable({{$examen_travail->id}})"><i class="fa-solid fa-square-check"></i></button></a>
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


<form action="{{route('notes-creer')}}" method="post" id="formSave">
    @csrf
    @foreach($groupes_eleves as $groupe_eleve)
        <tr class="@if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
            <th scope="row" class="border-2 border-slate-700 @if($groupe_eleve->id % 2) bg-green-400 @else bg-green-300 @endif">{{$groupe_eleve->stud_name}}</th> 

            @foreach($examens_travaux as $examen_travail)
                <td class="text-center border-2 border-slate-700">
                    <input class="text-center @if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="note_{{$groupe_eleve->id}}" id="note-1" onblur="Sortie_input({{$groupe_eleve->id}})" @if(Session::get('updateid') == $examen_travail->id) @else disabled @endif
                        @foreach($notes as $note)
                            @if($examen_travail->id == $note->extr_id && $groupe_eleve->id == $note->group_stud_id)                            
                                @if(Session::get('updateid') == $examen_travail->id)
                                    value="{{$note->note_note}}"
                                @else
                                    value="{{$note->note_note}}" 
                                @endif                                              
                            @endif
                        @endforeach
                    > 
                </td>
                <td class="text-center border-2 border-slate-700">
                    @foreach($notes as $note)              
                        @if($examen_travail->id == $note->extr_id && $groupe_eleve->id == $note->group_stud_id)  
                            <input class="text-center @if($groupe_eleve->id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" name="note100_{{$groupe_eleve->id}}" id="note100-{{$examen_travail->id}}" value="{{$note->note_note100}}" disabled>                                                                                                  
                        @endif
                    @endforeach
                </td>                                   
            @endforeach

            <td class="text-center border-2 border-slate-700"></td>

        </tr>
    @endforeach
</form>
</table>

<script>
    function Sortie_input(id){
        
    }

    function InputDisable(id){
        console.log("test");
        document.getElementById('note-1').enable = true;

        console.log(document.getElementById('note-'+id).value);
    }
</script>