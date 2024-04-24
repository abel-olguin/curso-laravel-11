@extends('layouts.app')

@section('title', 'Page Title')

@push('scripts')
    @vite(['resources/js/public-editor.js'])
@endpush

@section('content')
    <div x-data="editor({{$post->description}})">
        <h1 class="text-2xl font-bold">{{$post->title}}</h1>
        <div class="mt-5" id="editor"></div>

        <div class="flex gap-3 items-center justify-evenly mt-5">
            @foreach($post->categories as $category)
                <a href="{{route('categories.show', $category)}}"
                   class="rounded-full bg-gray-700 hover:bg-gray-800 border border-cyan-800 px-2 py-1">
                    {{$category->name}}
                </a>
            @endforeach
        </div>
    </div>

@endsection
