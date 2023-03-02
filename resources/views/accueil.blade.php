@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')



<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">
                Date: @if(Session::has('selectdate')) {{Session::get('selectdate')}} @else {{(20 . date('y-m-d'));}} @endif
            </h1>
        </div>

        <form action="{{route('accueil-save')}}" method="post" id="formSave">    
            @csrf
            <div class="grid grid-cols-2 gap-4 px-16 pt-4">
                
                <!--8h35-9h15-->
                <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-amber-200 rounded">8h35-9h15</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe1">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '8h35-9h15')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                                                                      
                        </select>
                        
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note1" class="text-left"  cols="80" placeholder="Notes...">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '8h35-9h15')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

                 <!--9h15-10h30-->
                 <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-amber-200 rounded">9h15-10h30</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe2">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '9h15-10h30')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note2" cols="80" rows="10">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '9h15-10h30')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

                <!--10h45-11h45-->
                <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-amber-200 rounded">10h45-11h45</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe3"">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '10h45-11h45')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note3" cols="80" rows="10">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '10h45-11h45')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

                <!--Diner-->
                <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-blue-300 rounded">Diner</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe4">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '11h45-1h00')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note4" cols="80" placeholder="Notes..." >
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '11h45-1h00')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

                <!--1h00-2h15-->
                <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-teal-100 rounded">1h00-2h15</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe5">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '1h00-2h15')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note5" cols="80" rows="10">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '1h00-2h15')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>                

                <!--2h30-3h15-->
                <div class="border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-teal-100 rounded">2h30-3h15</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe6">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '2h30-3h15')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note6" cols="80" rows="10">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '2h30-3h15')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

                <!--Soir-->
                <div class="col-span-2 border-2 border-zinc-400 rounded h-40">
                    <!--Titre-->
                    <h2 class="text-center h-8 bg-blue-300 rounded">Soir</h2>

                    <!--DropDown Liste-->
                    <div class="text-center">
                        <label>Groupes:</label>
                        <select name="groupe7">
                            @foreach($groupes_matieres as $groupe_matiere)
                                <option
                                    @foreach($periodes as $periode)
                                        @if($periode->per_date == Session::get('selectdate') && $periode->per_heure == '3h15-5h00')
                                            @if($periode->sess_grmat_id == $groupe_matiere->id)
                                                selected
                                            @endif
                                        @endif 
                                    @endforeach
                                >
                                    {{$groupe_matiere->groupmat_name}}
                                </option>
                            @endforeach
                            
                                                
                        </select>
                    </div>
                    
                    <!--Input texte-->   
                    <div class="flex justify-center h-20 my-2 mx-4">
                        <textarea name="note7" cols="80" rows="10">
                            @foreach($periodes as $periode)
                                @if($periode->per_heure == '3h15-5h00')
                                    {{$periode->per_notes}}
                                @endif
                            @endforeach
                        </textarea>   
                    </div>                 
                </div>

            </div>
        </div>
    </form>  
    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <div class="border-2 border-black mb-6"></div>
            <form action="{{route('accueil-changedate')}}" method="get">
                <label class="flex justify-center rounded-3xl">Selection d'une date:</label>
                <input class="text-center py-2 mb-6 w-full rounded-3xl" type="date" name="date" @if(Session::has('selectdate')) value="{{Session::get('selectdate')}}" @else value="{{(20 . date('y-m-d'))}}" @endif>
                <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="submit">Changer la date</button>
            </form>
            <div class="border-2 border-black mb-6"></div>
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" form="formSave">Enregistrer</button>
            <a href="{{route('accueil-annuler')}}"><button class="py-2 mb-6 w-full bg-red-300 rounded-3xl">Annuler</button></a>
            <span class="text-red-500">{{Session::get('rowFail')}}</span>
            <span class="text-red-500">{{Session::get('updateFail')}}</span>
            <span class="text-red-500">@error('nom')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('date')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('ponderation')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span><br>
            <span class="text-red-500">@error('surcombien')<i class="w-4 fa-solid fa-exclamation text-center"></i> {{$message}} @enderror</span>   
    </div>
</div>