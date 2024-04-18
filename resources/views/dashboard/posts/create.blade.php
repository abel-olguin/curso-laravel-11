@extends('layouts.dashboard')

@section('title', 'Page Title')

@section('content')

    <div class="mx-auto flex h-screen items-center justify-center">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{__('Create new post')}}
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('dashboard.posts.store') }}" method="post">
                    @csrf
                    @include('dashboard.posts.form')
                </form>
            </div>
        </div>
    </div>

@endsection
