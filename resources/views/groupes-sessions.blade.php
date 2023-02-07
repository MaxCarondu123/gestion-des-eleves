@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')   
    
        <!--Contenue des tables-->
        <div class="flex w-full h-1/2 bg-gray-500">
            <!--Table en haut a gauche-->   
            <div class="flex w-1/2 h-full bg-blue-500">
                <h1>1</h1>                  
            </div>
            <!--Table en haut a droite-->   
            <div class="flex w-1/2 h-full bg-red-500">
                <h1>2</h1>
            </div>                    
        </div>

        <div class="flex w-full h-1/2 bg-red-500">
            <!--Table en bas a gauche--> 
            <div class="flex w-1/2 h-full bg-red-500">
                <h1>3</h1>                  
            </div>
            <!--Table en bas a droite--> 
            <div class="flex w-1/2 h-full bg-blue-500">
                <h1>4</h1>
            </div>
        </div>
    </div>
</body>