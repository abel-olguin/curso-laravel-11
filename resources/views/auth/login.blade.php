@extends('layouts.auth')

@section('title', 'Page Title')

@section('content')
    <div class="mx-auto flex h-screen items-center justify-center">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{_('Login')}}
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('auth.login') }}" method="post">

                    @csrf


                    <x-forms.input label="Email" id="email" name="email" type="email" placeholder="Email"/>

                    <x-forms.input label="Password" id="password" name="password" type="password"
                                   placeholder="••••••••"/>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember"
                                       class="text-gray-500 dark:text-gray-300">{{_('Remember me')}}</label>
                            </div>
                        </div>
                        <a href="{{route('auth.forgot-password.index')}}"
                           class="text-sm font-medium text-primary-600 dark:text-primary-500 text-gray-500 dark:text-gray-400 hover:dark:text-gray-300">
                            {{_('Forgot password?')}}
                        </a>
                    </div>
                    <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                        {{_('Sign in')}}
                    </button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        {{_('Don’t have an account yet?')}}
                        <a href="{{route('auth.register.index')}}"
                           class="font-medium text-primary-600 hover:dark:text-gray-300 dark:text-primary-500">
                            {{_('Sign up')}}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
