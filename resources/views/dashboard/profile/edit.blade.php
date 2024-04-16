@extends('layouts.dashboard')

@section('title', 'Page Title')

@section('content')

    <div class="mx-auto flex h-screen items-center justify-center" x-data="{showEditImage: false}">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    {{_('Profile')}}
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('dashboard.profile.update', $user) }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <x-forms.input label="Email" id="email" name="email" :value="$user->email ?? ''"/>

                    <x-forms.input label="Name" id="name" name="name" :value="$user->name ?? ''"/>
                    <x-forms.input label="Last name" id="last_name" name="last_name" :value="$user->name ?? ''"/>

                    <x-forms.input label="username" id="username" name="username" :value="$user->username ?? ''"/>

                    <a href="#" @click.prevent="showEditImage = true" class="block" x-show="!showEditImage">
                        <img src="{{$user->image}}" alt="{{$user->name}}">
                    </a>

                    <input type="file" name="image" :class="{hidden:!showEditImage}">

                    <button type="submit" class="w-full rounded shadow bg-cyan-500 hover:bg-cyan-600 py-2">
                        {{_('Save')}}
                    </button>

                </form>
            </div>
        </div>
    </div>

@endsection
