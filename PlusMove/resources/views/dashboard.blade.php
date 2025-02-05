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
                <div class="flex flex-col lg:flex-row gap-4 mb-6">
                    <div class="flex-1 bg-indigo-100 border border-indigo-200 rounded-xl p-6 animate-fade-in">
                        <h2 class="text-2xl md:text-2xl text-blue-900">
                            No. of <br><strong>Drivers</strong>
                        </h2>
                        <span class="inline-block mt-8 px-8 py-2 rounded-full text-md font-bold text-white bg-indigo-800">
                            {{$data}}
                        </span>
                    </div>

                    <div class="flex-1 bg-blue-100 border border-blue-200 rounded-xl p-6 animate-fade-in">
                        <h2 class="text-2xl md:text-2xl text-blue-900">
                            Archives <br><strong>23</strong>
                        </h2>
                        <a href="#"  id="openContactForm" class="inline-block mt-8 px-8 py-2 rounded-full text-md font-bold text-white bg-blue-800 hover:bg-blue-900 transition-transform duration-300 hover:scale-105">
                            See archives
                        </a>
                    </div>
                </div>
            </div>
            <!-- table -->
             
            <div class="p-4">
                <table class="min-w-full divide-y mb-3 divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Driver Name
                            </th>
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
            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ( 1 > 0 )
                            @foreach (json_decode($data1) as $trip)
                        
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/2066/2066642.png" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$trip->customers_name}}
                                            </div>
                                  
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$trip->driver_name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$trip->package_name}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{$trip->package_weight}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($percentage > 30 && $percentage < 90)
                                        {{'On its way'}}
                                    @elseif($percentage > 30 && $percentage < 99)
                                        {{'Almost there'}}
                                    @elseif($percentage >= 99)
                                        {{'Complete'}}
                                    @else
                                        {{'Loading'}}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- @if ($package->is_active === 1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span> 
                                    @else
                                        <span class="px-2 inline-flex text-xs text-white leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Not Active
                                        </span>
                                    @endif --}}
                                    
                                </td>
                                {{-- @if (Auth::user()->roles === 1) --}}
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    
                                    {{-- <form action="{{ route('packages.destroy',$package->id) }}" method="POST">

                                        <a  href="{{ route('packages.edit',$package->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 text-red-600">Delete</button>
                                    </form> --}}
                                </td>
                                <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-xs font-medium">{{$percentage}}%</span>
                                        <div class="relative w-full">
                                            <div class="w-full bg-gray-200 rounded-sm h-2">
                                                <div class="bg-pink-600 h-2 rounded-sm" style="width: @php echo $percentage @endphp%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- @endif --}}
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <th colspan="5" class="px-6 py-5">No Data</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
           
        </div>
        
    </div>

    <!-- Modal -->
    <div id="contactFormModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white w-1/2 p-6 rounded shadow-md">
                <div class="flex justify-end">
                    <!-- Close Button -->
                    <button id="closeContactForm" class="text-gray-700 hover:text-red-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <h2 class="text-2xl font-bold mb-4">Archives</h2>
                {{-- {{$dataArray}} --}}
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
            
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ( 1 > 0 )
                            {{-- @foreach ($packages as $package) --}}
                        
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://cdn-icons-png.flaticon.com/512/2066/2066642.png" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{-- {{$package->package_name}} --}}
                                            </div>
                                  
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{-- {{$package->package_weight}} --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- @if ($package->is_active === 1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                        </span> 
                                    @else
                                        <span class="px-2 inline-flex text-xs text-white leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Not Active
                                        </span>
                                    @endif --}}
                                    
                                </td>
                                {{-- @if (Auth::user()->roles === 1) --}}
                                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                    
                                    {{-- <form action="{{ route('packages.destroy',$package->id) }}" method="POST">

                                        <a  href="{{ route('packages.edit',$package->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 text-red-600">Delete</button>
                                    </form> --}}
                                </td>
                                {{-- @endif --}}
                            </tr>
                            {{-- @endforeach --}}
                        @else
                        <tr>
                            <th colspan="5" class="px-6 py-5">No Data</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>


    <script>
// JavaScript to toggle the modal
    const openContactFormButton = document.getElementById('openContactForm');
    const closeContactFormButton = document.getElementById('closeContactForm');
    const contactFormModal = document.getElementById('contactFormModal');

    openContactFormButton.addEventListener('click', () => {
        contactFormModal.classList.remove('hidden');
    });

    closeContactFormButton.addEventListener('click', () => {
        contactFormModal.classList.add('hidden');
    });

    </script>
</x-app-layout>
