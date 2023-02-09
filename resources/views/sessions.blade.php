@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des sessions</h1>
        </div>

        <div class="h-full p-12">
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
                        <tr class="bg-zinc-300">
                            <th class="border-2 border-slate-700">{{$session->sess_id}}</th>
                            <th class="border-2 border-slate-700">{{$session->sess_num}}</th>
                            <th class="border-2 border-slate-700">{{$session->sess_startdate}}</th>
                            <th class="border-2 border-slate-700">{{$session->sess_enddate}}</th>
                            <th class="border-2 border-slate-700">@if($session->sess_current == 1) <i class="fa-sharp fa-solid fa-xmark"></i> @endif</th>
                            <th class="border-2 border-slate-700"><i class="fa-solid fa-trash-can"></i></th>
                        </tr>
                    @endforeach
                    @if(Session::has('nbrsessions'))
                        @for ($i = Session::get('nbrsessionsbd'); $i <= Session::get('nbrsessions'); $i++)
                            <tr class="bg-zinc-300">
                                <th class="border-2 border-slate-700">{{$i}}</th>
                                <th class="border-2 border-slate-700"><input class="text-center bg-zinc-300" type="text"></th>
                                <th class="border-2 border-slate-700"><input class="text-center bg-zinc-300" type="text"></th>
                                <th class="border-2 border-slate-700"><input class="text-center bg-zinc-300" type="text"></th>
                                <th class="border-2 border-slate-700"><input class="text-center bg-zinc-300" type="text"></th>
                                <th class="border-2 border-slate-700"><i class="fa-solid fa-trash-can"></i></th>
                            </tr>
                        @endfor
                    @endif         
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-blue-200">
        <div class="pt-16 px-4">
            <h2 class="flex justify-center font-bold text-lg mb-2">Actions</h2>
            <label class="flex justify-center rounded-3xl" for="">Etape courante:</label>
            <select class="py-2 mb-6 w-full rounded-3xl" name="" id="">               
                @foreach ($sessions as $session)
                    <option class="text-center" value="">{{$session->sess_id}}</option>
                @endforeach
            </select>
            <div class="border-2 border-black mb-6"></div>
            <form action="{{route('testtest')}}" method="post">
                @csrf
                <input class="w-full py-1 mb-2 bg-neutral-200" type="password" name="password">
                <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl" type="sumbit">Ajouter</button>
            </form>
            <button class="py-2 mb-6 w-full bg-green-400 rounded-3xl"><a href="sessionssave">Enregistrer</a></button>
            <!--<form action="//route('sessions')}}" method="get">
                <button class="py-2 mb-6 w-full bg-red-300 rounded-3xl" type="sumbit">Annuler</button>
            </form>-->
        </div>      
    </div>
</div>