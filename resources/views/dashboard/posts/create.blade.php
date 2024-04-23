@extends('layouts.dashboard')

@section('title', 'Page Title')

@push('scripts')
    @vite(['resources/js/editor.js'])
@endpush

@section('content')
    <div class="min-h-screen ">
        <div class="mx-auto flex justify-center">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{__('Create new post')}}
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('dashboard.posts.store') }}" method="post"
                          x-data="editor"
                          id="post-form"
                          @submit.prevent="beforeSend"
                    >
                        @csrf
                        @include('dashboard.posts.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
