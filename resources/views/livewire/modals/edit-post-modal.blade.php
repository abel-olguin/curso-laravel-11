@push('scripts')
    @vite(['resources/js/update-editor.js'])
@endpush

<div x-cloak x-show="$wire.show" class="fixed inset-0 bg-black/50 flex justify-center items-center">
    <div class="p-2 w-full md:w-1/2">
        <div class="mx-auto flex justify-center">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{__('Edit post')}} #{{$post->id}}
                    </h1>
                    <form class="space-y-4 md:space-y-6" x-data="updateEditor({{$form->description}})"
                          id="post-form"
                          method="post" @submit.prevent="beforeSend">
                        <x-forms.input wire:model="form.title" label="Title" id="title" name="form.title"/>


                        <x-forms.input wire:model="form.categories" label="Categories" id="categories"
                                       name="form.categories"
                        />

                        <input wire:model="form.description" type="hidden" name="form.description" id="description">

                        <div id="update-editor"></div>
                        @error('description')
                        <small class="text-red-700 text-xs">{{ $message }}</small>
                        @enderror

                        <div class="flex justify-between gap-5">
                            <button wire:click="$parent.hideEditModal" type="button"
                                    class="w-full rounded shadow bg-gray-500 hover:bg-gray-600 py-2">
                                Cancel
                            </button>
                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="bg-gray-500"
                                    wire:loading.class.remove="bg-cyan-500"
                                    class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                                <span wire:loading.class="hidden">{{__('Save')}}</span>
                                <span wire:loading>{{__('Cargando...')}}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
