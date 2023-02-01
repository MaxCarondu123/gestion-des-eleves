@include('layouts.head')

    <body>
        <main class="flex items-center justify-center h-screen bg-neutral-200">
            <div class="bg-zinc-50 h-3/6 w-1/4">             
                <form class="px-8 py-12" action="{{route('inscription-utilisateur')}}" method="post">
                    @if(Session::has('passwordFail'))
                        <span class="text-red-500">{{Session::get('passwordFail')}}</span>
                    @endif
                    @if(Session::has('saveFail'))
                        <span class="text-red-500">{{Session::get('saveFail')}}</span>
                    @endif
                    @csrf
                    <h1 class="flex justify-center pb-4 font-black">S'inscrire</h1>

                    <label for="">Nom</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="text" name="name">
                    <span class="text-red-500">@error('nom') {{$message}} @enderror</span>

                    <label for="">Adresse courriel</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="text" name="email">
                    <span class="text-red-500">@error('email') {{$message}} @enderror</span>

                    <label for="">Mot de passe</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="password" name="password1">
                    <span class="text-red-500">@error('password1') {{$message}} @enderror</span>

                    <label for="">Confirmer le mot de passe</label>
                    <input class="w-full py-1 mb-10 bg-neutral-200" type="password" name="password2">
                    <span class="text-red-500">@error('password2') {{$message}} @enderror</span>

                    <button class="w-full py-4 bg-indigo-300 rounded" type="submit">Envoyer</button>
                </form>
            </div>
        </main>
    </body>
</html>