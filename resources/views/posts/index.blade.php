@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

    <x-posts.post-list :posts="$posts"/>

@endsection
