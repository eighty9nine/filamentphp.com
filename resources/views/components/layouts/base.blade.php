@props([
    'darkMode' => false,
    'previewify' => null,
    'previewifyData' => [],
    'docSearch' => true,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <x-seo::meta />

        @if ($previewify)
            <meta property="og:image" content="https://previewify.app/generate/templates/{{ $previewify }}/meta?url={{ url()->current() }}">
            <meta name="twitter:image" content="https://previewify.app/generate/templates/{{ $previewify }}/meta?url={{ url()->current() }}">
            <meta name="previewify:image" content="{{ asset('/images/icon.png') }}">
            @foreach ($previewifyData as $key => $value)
                <meta name="previewify:{{ $key }}" content="{{ $value }}">
            @endforeach
        @endif

        <link rel="icon" type="image/png" href="{{ asset('/images/icon.png') }}" />

        <!-- Fonts -->
        @googlefonts

        <!-- Styles -->
        <style>[x-cloak] { display: none !important; }</style>
        @livewireStyles
        <x-comments::styles />
        @vite('resources/css/app.css')

        <!-- Scripts -->
        @livewireScripts
        <x-comments::scripts />
        @vite('resources/js/app.js')
        @stack('scripts')
    </head>

    <body class="antialiased font-vietnam bg-[#FFF9F5] text-[#0F033A]">
        @if ($docSearch)
            <div id="docsearch" class="hidden"></div>
        @endif

        {{ $slot }}
    </body>
</html>
