<nav class="flex-1 px-2 py-4 bg-gray-800">
    <x-nav-link  class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link  class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700" :href="route('customers.index')" :active="request()->routeIs('customers.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        {{ __('Customer') }}
    </x-nav-link>

    <br>
    <x-nav-link  class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700" :href="route('drivers.index')" :active="request()->routeIs('drivers.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        {{ __('Driver') }}
    </x-nav-link>

    <br>
    <x-nav-link  class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700" :href="route('packages.index')" :active="request()->routeIs('packages.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        {{ __('Package') }}
    </x-nav-link>

    {{-- <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
        Settings
    </a> --}}
</nav>