@include('layouts.head')

    <body>
        <main class="flex items-center justify-center h-screen bg-neutral-200">
            <div class="bg-zinc-50 h-2/6 w-1/4">             
                <form class="px-8 py-12" action="envoyer-email" method="get">
                    @if(Session::has('emailFail'))
                        <span class="text-red-500">{{Session::get('emailFail')}}</span>
                    @endif
                    <h1 class="flex justify-center pb-4 font-black">Mot de passe oublier</h1>
                    <p class="flex justify-center pb-4">Veuillez entrer l'adresse courriel qui a ete indiquer a la creation du compte.</p>

                    <label for="">Adresse courriel</label>
                    <input class="w-full py-1 mb-8 bg-neutral-200" type="email" name="email">
                    <span class="text-red-500">@error('email') {{$message}} @enderror</span>
                    
                    <button class="w-full py-3 bg-indigo-300 rounded" type="submit">Envoyer</button>
                </form>
            </div>
        </main>
    </body>
</html>