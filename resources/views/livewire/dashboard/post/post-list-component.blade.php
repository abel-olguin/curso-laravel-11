<div>
    <div class="flex justify-between items-center">
        <a class="button-default" wire:navigate
           href="{{route('dashboard.posts.create')}}">{{__('Create new post')}}</a>


        <input class="rounded border bg-gray-800 px-2 py-1" type="text" name="search"
               wire:model.live.debounce.500ms="search" placeholder="Busqueda...">
    </div>

    {{--__('Create new post :name', ['name' => 'Hola mundo'])--}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <button wire:click="setSort('id')">
                        #
                    </button>
                </th>
                <th scope="col" class="px-6 py-3">
                    <button wire:click="setSort('title')">
                        Title
                    </button>
                </th>
                <th scope="col" class="px-6 py-3">
                    <button wire:click="setSort('description')">
                        Description
                    </button>
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->posts as $post)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$post->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$post->excerpt}}
                    </td>
                    <td>
                        <div class="flex gap-5">
                            <a href="{{route('dashboard.posts.edit', $post->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                </svg>
                            </a>

                            <button wire:click="delete({{$post->id}})" wire:confirm="Estas seguro?">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $this->posts->onEachSide(5)->links() }}
    </div>
</div>
