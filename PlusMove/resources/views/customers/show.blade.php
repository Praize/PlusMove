<x-app-layout>
    <div class="flex h-screen bg-gray-100">

        <!-- sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white font-bold uppercase"><x-application-logo class="block h-9 w-auto fill-current text-red" /></span>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                @include('layouts.custom-nav')
            </div>
        </div>
    
        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            @include('layouts.navigation')

            <div class="p-4">
            
            </div>
        </div>
        
    </div>
</x-app-layout>
