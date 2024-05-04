<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('scripts')
</head>
<body class="dark:text-gray-100 dark:bg-gray-500">
<x-layouts.guest-navbar/>
<main class="container mx-auto py-5">
    <x-alert type="success"/>
    <x-alert type="error"/>
    <x-alert type="warning"/>
    {{ $slot }}

</main>
<x-layouts.footer/>
</body>
</html>
