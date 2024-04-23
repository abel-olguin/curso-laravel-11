<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>


        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse relative gap-4">
            <x-layouts.nav-dropdown title=" English" :image="asset('images/us.svg')">
                <li>
                    <a href="?lang=en"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                       role="menuitem">
                        <div class="inline-flex items-center gap-4">
                            <img src="{{asset('images/us.svg')}}" alt="English" >
                            English
                        </div>
                    </a>
                </li>
                <li>
                    <a href="?lang=es"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                       role="menuitem">
                        <div class="inline-flex items-center gap-4">
                            <img src="{{asset('images/es.svg')}}" alt="Español">
                            Español
                        </div>
                    </a>
                </li>
            </x-layouts.nav-dropdown>
            @guest
                <a href="{{route('auth.index')}}"
                   class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                   aria-current="page">Login</a>
            @else
                <a href="{{route('dashboard.index')}}"
                   class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                   aria-current="page">Dashboard</a>
            @endguest

        </div>
    </div>
</nav>
