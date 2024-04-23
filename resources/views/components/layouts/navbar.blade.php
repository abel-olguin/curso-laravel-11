<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>

       <div class="flex">
           <x-layouts.nav-dropdown :title="auth()->user()->name" :image="auth()->user()->image">
               <li>
                   <a href="{{route('dashboard.profile.edit')}}"
                      class="dropdown-item"
                      role="menuitem">Profile</a>
               </li>
               <li>
                   <form action="{{route('auth.logout')}}" method="post" class="w-full">
                       @csrf
                       <button type="submit"
                               class="dropdown-item w-full text-left">
                           Logout
                       </button>
                   </form>
               </li>

           </x-layouts.nav-dropdown>

           <button
               class="text-white font-medium px-5 py-2.5"
               type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
               aria-controls="drawer-navigation" @click="menuOpen = !menuOpen">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="w-6 h-6">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
               </svg>
           </button>
       </div>

    </div>
</nav>
