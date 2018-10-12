<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', trans('titles.app')) }}</title>
        @if (trim($__env->yieldContent('template_description')))
            <meta name="description" content="@yield('template_description')">
        @endif
        <meta name="author" content="{{ config('blog.author') }}">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        {{-- Styles --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @yield('head')

    </head>
    <body>
        <div id="app">

            @include('blog.partials.nav')

            <main>
                @yield('content')
            </main>

           @include('blog.partials.footer')

        </div>

        {{-- Scripts --}}
        <script src="{{ mix('js/app.js') }}" defer></script>

        @yield('scripts')

    </body>
</html>
