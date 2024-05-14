<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf" content="{{ csrf_token() }}">
    <title>{{$title ?? 'Post tile'}}</title>
    <meta name="description" value="{{$description ?? 'Description'}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="dark:text-gray-100 dark:bg-gray-500" x-data="{menuOpen: false}">
<x-layouts.navbar/>
<x-layouts.sidebar/>
<main class="container mx-auto my-5 dark:text-gray-100">
    <x-alert type="success"/>
    <x-alert type="error"/>
    <x-alert type="warning"/>

    {{ $slot }}
</main>

<x-layouts.footer/>

</body>
</html>
