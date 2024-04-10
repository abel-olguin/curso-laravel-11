@extends('layouts.auth')

@section('title', 'Page Title')

@section('content')
    {{$errors}}
    <div class="mx-auto flex h-screen items-center justify-center">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Registro
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('auth.register.store') }}" method="post">

                    @csrf

                    <x-forms.input label="Email" id="email" name="email" type="email" placeholder="Email"/>

                    <x-forms.input label="Nombre" id="name" name="name" placeholder="Ej. Pedro"/>

                    <x-forms.input label="Apellidos" id="last_name" name="last_name" placeholder="Ej. Perez Perez"/>

                    <x-forms.input label="Contraseña" id="password" name="password" type="password"
                                   placeholder="••••••••"/>

                    <x-forms.input label="Confirmar contraseña" id="password_confirmation" name="password_confirmation"
                                   type="password"
                                   placeholder="••••••••"/>

                    <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">Registrar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
