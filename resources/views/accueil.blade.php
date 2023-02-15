@include('layouts.head')
@include('layouts.navigation')
@include('layouts.menu')

<div class="flex h-full grid grid-cols-6 bg-gray-100">
    <div class="col-span-5">
        <div class="flex justify-center items-center h-16">
            <h1 class="font-bold text-2xl">Table des sessions</h1>
        </div>

        
        <div class="h-full px-16 pt-4">
            @include('tables.tablesessions')                        
        </div>
    </div>

    <div class="bg-blue-200">

        </div>      
    </div>
</div>