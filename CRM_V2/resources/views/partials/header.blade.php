<header class="bg-stone-800 border-b border-gray-600">

@guest
    
    <nav class="font-mono h-26 flex items-center justify-between px-4">
        
         <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Nexora"
                class="h-20 w-auto m-8"
            />
        </a>

        <div class="flex flex-row-reverse ml-100 mt-16 mr-4">
            <a class="text-lime-200 hover:text-lime-300 pr-10" href="{{ route('login') }}">Login</a>
            <a class="text-lime-200 hover:text-lime-300 pr-12" href="{{ route('register') }}">Register</a>
        </div>
    </nav>

@else

    <nav class="font-mono h-26 flex items-center justify-between px-4">
        
        <a href="{{ route('home') }}" class="flex items-center">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Nexora"
                class="h-20 w-auto m-8"
            />
        </a>

        <div class="flex flex-row ml-100 mt-16 mr-4">
            <a class="text-lime-200 hover:text-lime-300 pr-10" href="{{ route('crm.dashboard') }}">Dashboard</a>
            <a class="text-lime-200 hover:text-lime-300 pr-12" href="{{ route('clients.index') }}">Clients</a>
            <a class="text-lime-200 hover:text-lime-300 pr-12" href="{{ route('activities.index') }}">Activities</a>
            <a class="text-lime-200 hover:text-lime-300 pr-12" href="{{ route('profile') }}">Profile</a>
        </div>

        <div class="ml-100 mt-16 mr-4">
            <form method="POST" action="{{ route('logout') }}">
            @csrf
                 <button class="text-blue-300 hover:text-blue-400" type="submit">
                    Logout
                </button>
            </form>
        </div>

    </nav>

@endguest

</header>