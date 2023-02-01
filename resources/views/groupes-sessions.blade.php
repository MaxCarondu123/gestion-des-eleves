@include('layouts.head')
@include('layouts.navigation')


    <div class="flex flex-col w-full">
        <!--Menu en haut-->
        <div class="flex justify-between bg-gray-200 h-2/12 p-10 ">
            <h1 class="font-bold text-xl">Test</h1>
        </div>      
    
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