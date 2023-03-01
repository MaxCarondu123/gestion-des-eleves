@include('layouts.head')

    <body>
        @if(Session::has('userInscrit') || Session::has('userMDPChanger') || Session::has('userDeco'))
            <div class="text-center bg-emerald-100">
                <span class="text-green-800 w-full">{{Session::get('userInscrit')}}{{Session::get('userMDPChanger')}}{{Session::get('userDeco')}}</span>
            </div>      
        @endif
        <main class="flex items-center justify-center h-screen bg-neutral-200">
            
            <div class="bg-zinc-50 h-3/6 w-1/4">             
                <form class="px-8 py-12" action="{{route('connexion-utilisateur')}}" method="post">
                    @if(Session::has('userFail'))
                        <span class="text-red-500">{{Session::get('userFail')}}</span>
                    @endif
                    @if(Session::has('passwordFail'))
                        <span class="text-red-500">{{Session::get('passwordFail')}}</span>
                    @endif
                    @csrf
                    <h1 class="flex justify-center pb-4 font-black">Se connecter</h1>
                    
                    <label for="form">Adresse courriel</label>
                    <input class="w-full py-1 mb-4 bg-neutral-200" type="text" name="email">
                    <span class="text-red-500">@error('email') {{$message}} @enderror</span>

                    <label for="form">Mot de passe</label>
                    <input class="w-full py-1 mb-2 bg-neutral-200" type="password" name="password">
                    <span class="text-red-500">@error('password') {{$message}} @enderror</span>
              
                    <button class="w-full py-3 mb-16 bg-indigo-300 rounded" type="submit" name="validate">Se connecter</button>  
                    
                    <button class="w-full py-1 mb-4 bg-indigo-300 rounded"><a href="mdpoublier">Mot de passe oublier</a></button>
                    <button class="w-full py-1 bg-indigo-300 rounded"><a href="inscription">S'inscrire</a></button>
                </form>              
            </div>
        </main>
    </body>
</html>