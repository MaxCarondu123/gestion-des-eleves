@include('layouts.head')

    <body>
        <main class="flex items-center justify-center h-screen bg-neutral-200">
            <div class="bg-zinc-50 h-4/12 w-1/4">             
                <form class="px-8 py-12" action="{{route('changer-mdp')}}" method="post">
                    @if(Session::has('codeFail'))
                        <span class="text-red-500">{{Session::get('codeFail')}}</span>
                    @endif
                    @if(Session::has('passwordFail'))
                        <span class="text-red-500">{{Session::get('passwordFail')}}</span>
                    @endif
                    @csrf
                    <h1 class="flex justify-center pb-4 font-black">Changement du mot de passe</h1>
                    <p class="flex justify-center pb-4">Veuillez entrer le code qui a ete envoyer par email.</p>

                    <label for="">Code</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="text" name="code">
                    <span class="text-red-500">@error('code') {{$message}} @enderror</span>

                    <label for="">Nouveau mot de passe</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="password" name="password1">
                    <span class="text-red-500">@error('password1') {{$message}} @enderror</span>

                    <label for="">Confirmer la mot de passe</label>
                    <input class="w-full py-1 mb-10 bg-neutral-200" type="password" name="password2">
                    <span class="text-red-500">@error('password1') {{$message}} @enderror</span>

                    <button class="w-full py-3 bg-indigo-300 rounded" type="submit">Envoyer</button>
                </form>
            </div>
        </main>
    </body>
</html>