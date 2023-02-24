@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des periodes</h1>
        </div>

        
        <div class="h-full px-16 pt-4">
            @include('tables.tableperiodes')                   
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <div class="border-2 border-black mb-6"></div>
            <form  action="{{route('periodes-createMonth')}}" method="post">
                @csrf
                <label for="">Entrer le nombre de jours du mois:</label><br>
                <input class="py-2 mb-6 bg-zinc-300" type="text" name="nbrjour"><br>
                <label for="">Date du premier jour du mois:</label><br>
                <input class="py-2 mb-6 bg-zinc-300" type="date" name="jourun"><br>
                <button class="py-2 mb-6 bg-green-400 rounded-3xl">Faire les periodes pour le mois</button>
            </form>
        </div>      
    </div>
</div>
