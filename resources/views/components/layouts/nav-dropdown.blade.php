@props([
    'title' => '',
    'image' => null
])
<div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse relative"
     x-data="{showDropdown:false}" @click.outside="showDropdown = false">
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

</div>
