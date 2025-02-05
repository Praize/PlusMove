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
                <h2 class="text-2xl font-bold">Package Section</h2>
                @if ($message = Session::get('success'))
                    <div class="mt-5 mb-2 flex items-center justify-between p-5 leading-normal text-green-600 bg-green-100 rounded-lg" role="alert">
                        <p>{{ $message }}</p>
                    
                        <svg onclick="return this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z"/>
                        </svg>
                    </div>
                @endif
                <div class="float-right mb-3">
                    <a  class="cursor-pointer rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white" href="{{ route('packages.create') }}"> Create New Package</a>
                </div>
                <table class="min-w-full divide-y mb-3 divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Package Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Weight (Kg)
                            </th>
                            {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th> --}}
                            @if (Auth::user()->roles === 1)
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if (count($packages) > 0 )
                            @foreach ($packages as $package)
                        
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/2066/2066642.png" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$package->package_name}}
                                            </div>
                                  
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$package->package_weight}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($package->is_active === 1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span> 
                                    @else
                                        <span class="px-2 inline-flex text-xs text-white leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Not Active
                                        </span>
                                    @endif
                                    
                                </td>
                                @if (Auth::user()->roles === 1)
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    
                                    <form action="{{ route('packages.destroy',$package->id) }}" method="POST">

                                        <a  href="{{ route('packages.edit',$package->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 text-red-600">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <th colspan="5" class="px-6 py-5">No Data</th>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <!-- pagination -->
                @if ($packages)
                    {!! $packages->links() !!}
                @endif
            </div>
        </div>
        
    </div>
</x-app-layout>
