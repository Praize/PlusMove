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
                <h2 class="text-2xl font-bold">Driver Edit</h2>
                <div class="row">
                    <div class="pull-left">
                        <a class="" href="{{ route('drivers.index') }}"> Back</a>
                    </div>
                </div>
            
                @if ($errors->any())

                    <div class="mt-5 flex items-center justify-between p-5 leading-normal text-red-600 bg-red-100 rounded-lg" role="alert">
                        <p><strong>Whoops!</strong> There were some problems with your input.</p>
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <svg onclick="return this.parentNode.remove();" class="inline w-4 h-4 fill-current ml-2 hover:opacity-80 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM359.5 133.7c-10.11-8.578-25.28-7.297-33.83 2.828L256 218.8L186.3 136.5C177.8 126.4 162.6 125.1 152.5 133.7C142.4 142.2 141.1 157.4 149.7 167.5L224.6 256l-74.88 88.5c-8.562 10.11-7.297 25.27 2.828 33.83C157 382.1 162.5 384 167.1 384c6.812 0 13.59-2.891 18.34-8.5L256 293.2l69.67 82.34C330.4 381.1 337.2 384 344 384c5.469 0 10.98-1.859 15.48-5.672c10.12-8.562 11.39-23.72 2.828-33.83L287.4 256l74.88-88.5C370.9 157.4 369.6 142.2 359.5 133.7z"/>
                        </svg>
                    </div>
                @endif
            

                <form class="mx-14 mt-10 border-2 border-blue-400 rounded-lg" action="{{ route('drivers.update',$driver->id) }}" method="POST">

                    @csrf
            
                    @method('PUT')

                    {{-- <div class="mt-10 text-center font-bold">Contact Us</div>
                    <div class="mt-3 text-center text-4xl font-bold">Make an Appointment</div> --}}
                    <div class="p-8">
                      <div class="flex gap-4">
                        <input type="text" name="driver_name" value="{{ $driver->driver_name }}" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Full Name *" />
                        <input type="email" name="driver_email" value="{{ $driver->driver_email }}" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Email *" />
                      </div>

                      {{-- <div class="my-6 flex gap-4">
                        <input type="Name" name="name" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Full Name *" />
                        <input type="email" name="email" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Email *" />
                      </div> --}}
                      
                      <div class="my-6 flex gap-4">
                        <input type="text" name="driver_phonenumber" value="{{ $driver->driver_phonenumber }}" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="eg. +27835001111 *" />

                        <select name="is_active" id="select" value="{{ $driver->is_active }}" class="block w-1/2 rounded-md border border-slate-300 bg-white px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
                          <option  value="" class="font-semibold text-slate-300">Please Select</option>
                          <option  value="1"class="font-semibold text-slate-300">Active</option>
                          <option  value="0"class="font-semibold text-slate-300">Not Active</option>
                        </select>
                      </div>
                        {{-- <div class="">
                            <textarea name="textarea" id="text" cols="30" rows="10" class="mb-10 h-40 w-full resize-none rounded-md border border-slate-300 p-5 font-semibold text-gray-300">Message</textarea>
                        </div> --}}
                      <div class="">
                        <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-2 text-sm font-semibold text-white">update</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</x-app-layout>
