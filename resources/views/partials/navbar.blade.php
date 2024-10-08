<nav class="bg-gray-700 sticky top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <img src="{{ asset('img/dispersip_logo.png') }}" class="h-8" alt="Flowbite Logo" />
        <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul class="flex flex-col font-medium mt-4 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li >
                    <a href="{{ Route('home') }}" class="block p-3 md:p-2 text-white rounded hover:bg-gray-500  md:hover:bg-transparent md:border-0  md:hover:bg-black   {{ Route::is('home') ? ' bg-black' : 'text-white' }}">Home</a>
                </li>
                <li>
                    <a href="{{ Route('input') }}" class="block p-3 md:p-2 text-white rounded hover:bg-gray-500  md:hover:bg-transparent md:border-0  md:hover:bg-black   {{ Route::is('input')? ' bg-black' : 'text-white' }}">Input</a>
                </li>
                <li>
                    <a href="{{ Route('management') }}" class="block p-3 md:p-2 text-white rounded hover:bg-gray-500  md:hover:bg-transparent md:border-0  md:hover:bg-black   {{ Route::is('management')? ' bg-black' : 'text-white' }}">Managemen</a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="block p-3 md:p-2 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:hover:bg-black dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent {{ Route::is('logout') ? 'text-blue-900' : '' }}">Logout</button>
                    </form>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
