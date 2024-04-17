@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <div class="relative mt-5">
        <div class="grid gap-5">
            @foreach($posts as $post)
                <x-post-card :post="$post"/>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $posts->onEachSide(5)->links() }}
        </div>
    </div>

@endsection
