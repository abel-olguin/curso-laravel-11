<div class="mx-auto flex h-screen items-center justify-center">
    <div
        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{__('Register')}}
            </h1>
            <form class="space-y-4 md:space-y-6" wire:submit="register" method="post">

                @csrf

                <x-forms.input wire:model="form.email" :label="__('Email')" id="email" name="form.email" type="email"
                               placeholder="Email"/>

                <x-forms.input wire:model="form.name" :label="__('Name')" id="name" name="form.name"
                               placeholder="Ej. Pedro"/>

                <x-forms.input wire:model="form.last_name" :label="__('Last name')" id="last_name" name="form.last_name"
                               placeholder="Ej. Perez Perez"/>

                <x-forms.input wire:model="form.password" :label="__('Password')" id="password" name="form.password"
                               type="password"
                               placeholder="••••••••"/>

                <x-forms.input wire:model="form.passwordConfirmation" :label="__('Password confirmation')"
                               id="passwordConfirmation"
                               name="form.passwordConfirmation"
                               type="password"
                               placeholder="••••••••"/>

                <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                    {{__('Sign up')}}
                </button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    {{__('Do you have an account?')}}
                    <a href="{{route('auth.index')}}" wire:navigation
                       class="font-medium text-primary-600 hover:dark:text-gray-300 dark:text-primary-500">
                        {{__('Sign in')}}
                    </a>
                </p>
            </form>
        </div>
    </div>
</div>
