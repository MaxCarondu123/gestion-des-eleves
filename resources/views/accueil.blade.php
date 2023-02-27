@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">

    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Date aujourd'hui</h1>
        </div>

        
        <div class="grid grid-cols-2 gab-4 px-16 pt-4">
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">8h35-9h15</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div>                 
            </div>
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">Diner</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">9h15-10h30</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">1h00-2h15</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">10h45-11h45</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>
            <div class="border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">2h30-3h15</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>
            <div class="col-span-2 border-2 border-zinc-400 rounded h-40">
                <!--Titre-->
                <h2 class="text-center h-8 bg-blue-300 rounded">Soir</h2>

                <!--DropDown Liste-->
                <div class="text-center">
                    <label for="">Groupes:</label>
                    <select name="" id="">

                    </select>
                </div>
                
                <!--Input texte-->   
                <div class="flex justify-center h-20 my-2 mx-4">
                    <input class="w-full h-full" type="text">       
                </div> 
            </div>                            
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <div class="border-2 border-black mb-6"></div>
            <label for="">Date:</label>
            <select class="text-center py-2 mb-6 w-full bg-green-400 rounded-3xl" name="" id="">

            </select>  
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