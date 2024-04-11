@extends('layouts.auth')

@section('title', 'Page Title')

@section('content')
    {{$errors}}
    <div class="mx-auto flex h-screen items-center justify-center">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{_('Forgot password')}}
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('auth.forgot-password.send') }}" method="post">

                    @csrf


                    <x-forms.input label="Email" id="email" name="email" type="email" placeholder="Email"/>


                    <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                        {{_('Send recovery email')}}
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        {{_('Do you have an account?')}}
                        <a href="{{route('auth.index')}}"
                           class="font-medium text-primary-600 hover:dark:text-gray-300 dark:text-primary-500">
                            {{_('Sign in')}}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
