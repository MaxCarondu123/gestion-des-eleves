@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des sessions</h1>
        </div>

        
        <div class="h-full px-16 pt-4">
            <table class="w-full">
                <thead class="bg-blue-400 border-2 border-slate-700">
                    <tr class="">
                        <th class="p-4 border-2 border-slate-700">Id</th>
                        <th class="p-4 border-2 border-slate-700">Etape</th>
                        <th class="p-4 border-2 border-slate-700">Date de debut</th>
                        <th class="p-4 border-2 border-slate-700">Date de fin</th>
                        <th class="p-4 border-2 border-slate-700">Courante</th>
                        <th class="p-4 border-2 border-slate-700">Action</th>
                    </tr>
                </thead>

                <tbody class="">
                    @foreach ($sessions as $session)
                        <tr class="@if($session->sess_id % 2) bg-zinc-300 @else bg-zinc-200 @endif">
                            <th class="border-2 border-slate-700"><input class="w-24 text-center @if($session->sess_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$session->sess_id}}"></th>
                            <th class="border-2 border-slate-700"><input class="w-24 text-center @if($session->sess_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="text" value="{{$session->sess_num}}"></th>
                            <th class="border-2 border-slate-700"><input class="text-center @if($session->sess_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="date" value="{{$session->sess_startdate}}"></th>
                            <th class="border-2 border-slate-700"><input class="text-center @if($session->sess_id % 2) bg-zinc-300 @else bg-zinc-200 @endif" type="date" value="{{$session->sess_enddate}}"></th>
                            <th class="border-2 border-slate-700">@if($session->sess_current == 1) <i class="fa-sharp fa-solid fa-xmark"></i> @endif</th>
                            <th class="border-2 border-slate-700"><a href="{{route('sessions-supp', ['sessid'=>$session->sess_id])}}"><i class="fa-solid fa-trash-can"></i></a></th>
                        </tr>
                    @endforeach     
                    <form action="{{route('sessions-save')}}" method="post" id="formEnregistrer">  
                        @csrf         
                        @if(Session::has('nbrsessionsvide'))
                            @for ($i = Session::get('nbrsessionsbd'); $i <= Session::get('nbrsessionsvide'); $i++)                            
                                <tr class=" bg-red-200">
                                    <th class="border-2 border-slate-700">{{$i}}</th>
                                    <th class="border-2 border-slate-700"> <select class="text-center bg-red-200" type="text" name="etape">
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                            </select></th>
                                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datedebut"></th>
                                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="date" name="datefin"></th>
                                    <th class="border-2 border-slate-700"><input class="text-center bg-red-200" type="checkbox" name="courante"></th>
                                    <th class="border-2 border-slate-700"><a href=""><i class="fa-solid fa-trash-can"></i></a></th>
                                </tr>                  
                            @endfor
                        @endif
                    </form>                         
                </tbody>
            </table>
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
                    <option class="text-center" value="{{route('sessions-changecourante', ['sessid'=>$session->sess_id])}}" @if($session->sess_current == true) selected @endif>{{$session->sess_id}}</option>
                @endforeach
            </select>
            <div class="border-2 border-black mb-6"></div>         
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl @if(Session::get('btnenregistrer') == 1) opacity-75" disabled @else " @endif type="submit" form="formEnregistrer">Enregistrer</button>        
            <a href="{{route('sessions-ajout')}}"><button class="py-2 mb-6 w-full bg-green-400 rounded-3xl">Ajouter</button></a>  
            <a href="{{route('sessions-annuler')}}"><button class="py-2 mb-6 w-full bg-red-300 rounded-3xl">Annuler</button></a>
        </div>      
    </div>
</div>