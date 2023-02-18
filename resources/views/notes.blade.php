@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')
     
     
<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des notes</h1>
        </div>

        
        <div class="h-full px-16 pt-4">
            @include('tables.tablenotes')                   
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <div class="border-2 border-black mb-6"></div>
            <label for="">Groupes / Matieres:</label>
            <select class="text-center py-2 mb-6 w-full bg-green-400 rounded-3xl" name="" id="">
                @foreach ($groupes_matieres as $groupe_matiere)
                    <option class="text-center" value="">{{$groupe_matiere->groupmat_id}}</option>
                @endforeach
            </select>
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit" form="formCreate">Creer</button>              
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit" form="formUpdate">Modifier</button>        
            <a href="{{route('notes-save')}}"><button class="py-2 mb-6 w-full bg-green-400 rounded-3xl">Enregistrer</button></a>  
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