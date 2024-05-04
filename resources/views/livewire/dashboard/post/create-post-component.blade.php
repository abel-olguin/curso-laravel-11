@push('scripts')
    @vite(['resources/js/editor.js'])
@endpush

<div>
    <div class="min-h-screen ">
        <div class="mx-auto flex justify-center">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{__('Create new post')}}
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="post"
                          x-data="editor"
                          id="post-form"
                          @submit.prevent="beforeSend"
                    >
                        <x-forms.input wire:model="form.title" label="Title" id="title" name="form.title"/>

                        <x-forms.input wire:model="form.categories" label="Categories" id="categories"
                                       name="form.categories"
                        />

                        <input wire:model="form.description" type="hidden" name="form.description" id="description">

                        <div id="editor"></div>

                        @error('description')
                        <small class="text-red-700 text-xs">{{ $message }}</small>
                        @enderror

                        <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                            {{__('Save')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
