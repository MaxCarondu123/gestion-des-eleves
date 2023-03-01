@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des absenses</h1>
        </div>

        
        <div class="h-full px-16 pt-4">
           @include('tables.tableabsences')                  
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <div class="border-2 border-black mb-6"></div>           
            <label class="flex justify-center rounded-3xl" >Nom du groupe:</label>
            <select class="py-2 mb-6 w-full rounded-3xl" onchange="location = this.value;">
                @foreach ($groupes_matieres as $groupe_matiere)
                    <option class="text-center" value="{{route('absences-changegroupe', ['groupid'=>$groupe_matiere->id])}}" @if(Session::get('groupidselect') == $groupe_matiere->id) selected @endif>{{$groupe_matiere->groupmat_name}}</option>
                @endforeach
            </select>
            <form action="{{route('absences-changedate')}}" method="get">
                @csrf
                <label class="flex justify-center rounded-3xl">Selection d'une date:</label>
                <input class="text-center py-2 mb-6 w-full rounded-3xl" type="date" name="date" @if(Session::has('selectdate')) value="{{Session::get('selectdate')}}" @else value="{{(20 . date('y-m-d'))}}" @endif>
                <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit">Changer la date</button>
            </form>     
            <div class="border-2 border-black mb-6"></div> 
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" form="formSave">Enregistrer</button>
            <a href="{{route('notes-annuler')}}"><button class="py-2 mb-6 w-full bg-red-300 rounded-3xl">Annuler</button></a>
            <span class="text-red-500">{{Session::get('rowFail')}}</span>
            <span class="text-red-500">{{Session::get('updateFail')}}</span>
            <span class="text-red-500">@error('nom')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('date')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('ponderation')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('surcombien')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span>       
        </div>      
    </div>
</div>