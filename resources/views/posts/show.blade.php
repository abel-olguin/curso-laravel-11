@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
@endsection
