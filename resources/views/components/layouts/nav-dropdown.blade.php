@props([
    'title' => '',
    'image' => null
])
<div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse relative" x-data="{showDropdown:false}">
    <button @click="showDropdown = !showDropdown" type="button" data-dropdown-toggle="language-dropdown-menu"
            class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
        @if($image)
            <img src="{{$image}}" alt="{{$title}}" class="h-5 w-5 rounded-full object-cover overflow-hidden mr-3">
        @endif
        {{$title}}
    </button>

    <!-- Dropdown -->
    <div x-show="showDropdown"
         class="z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 top-10 w-40"
         id="language-dropdown-menu"
         style="position: absolute; ">
        <ul class="py-2 font-medium" role="none">
            {{$slot}}
        </ul>
    </div>
    <button data-collapse-toggle="navbar-language" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-language" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
</div>
