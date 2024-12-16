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
                <li>
                    <a href="{{ Route('home') }}" class="flex items-center  p-2 text-white transition duration-75 rounded-lg  group hover:bg-gray-200 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700  {{ Route::is('home') ? 'bg-gray-500' : 'text-white' }}">Home</a>
                </li>
                <li>
                    <a href="{{ Route('input') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-200 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700 {{ Route::is('input')? ' bg-gray-500' : 'text-white' }}">Input</a>
                </li>
                <li>
                    <a href="{{ Route('management') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-200 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700 {{ Route::is('management')? ' bg-gray-500' : 'text-white' }}">Managemen</a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                    <button type="submit" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-200 hover:text-gray-900 dark:text-white dark:hover:bg-gray-700 {{ Route::is('logout') ? 'bg-gray-500' : 'text-white' }}">Logout</button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>