<div class="mx-auto flex min-h-screen items-center justify-center" x-data="{showEditImage: false}">
    <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{__('Profile')}}
            </h1>
            <form class="space-y-4 md:space-y-6" wire:submit="update">
                <x-forms.input wire:model="form.email" label="Email" id="email" name="form.email"/>
                <x-forms.input wire:model="form.name" label="Name" id="name" name="form.name"/>
                <x-forms.input wire:model="form.last_name" label="Last name" id="last_name" name="form.last_name"/>
                <x-forms.input wire:model="form.username" label="username" id="username" name="form.username"/>

                <a href="#" @click.prevent="showEditImage = true" class="block" x-show="!showEditImage">
                    <img src="{{$form->image}}" alt="{{$form->name}}">
                </a>

                <input wire:model="form.image" type="file" name="form.image" :class="{hidden:!showEditImage}">

                <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                    {{__('Save')}}
                </button>

            </form>
        </div>
    </div>
</div>
