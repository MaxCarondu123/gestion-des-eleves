@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des sessions</h1>
        </div>
       
        <div class="h-full px-16 pt-4">
            @include('tables.tablesessions')
            <span class="text-red-500">@error('datedebut')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('datefin')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span>                         
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <label class="flex justify-center rounded-3xl" for="">Etape courante:</label>
            <select class="py-2 mb-6 w-full rounded-3xl" onchange="location = this.value;">              
                @foreach ($sessions as $session)
                    <option class="text-center" value="{{route('sessions-changecourante', ['sessid'=>$session->id])}}" @if($session->sess_current == true) selected @endif>{{$session->sess_num}}</option>
                @endforeach
            </select>
            <div class="border-2 border-black mb-6"></div>
            <label class="flex justify-center rounded-3xl">Ajouter des sessions:</label>
            <select class="text-center py-2 mb-6 w-full rounded-3xl" name="nbrAjouter">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>               
            <a href="{{route('sessions-ajout')}}"><button class="py-2 mb-6 w-full bg-green-400 rounded-3xl">Ajouter</button></a>
            <div class="border-2 border-black mb-6"></div> 
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit" form="formMettreAJour">Mettre a jour</button>   
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit" form="formEnregistrer">Enregistrer</button>    
            <a href="{{route('sessions-annuler')}}"><button class="py-2 mb-6 w-full bg-red-300 rounded-3xl">Annuler</button></a>
        </div>      
    </div>
</div>