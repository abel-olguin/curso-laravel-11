@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Posts de la categoria: {{$category->name}}</h1>
    <x-posts.post-list :posts="$posts"/>
@endsection
