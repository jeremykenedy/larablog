<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        @if(config('blog.services.googleAnalyticsID'))
            @include('blog.partials.analytics')
        @endif
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

        {{-- Styles --}}
        <link href="{{ mix('css/admin.css') }}" rel="stylesheet">


        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        @stack('head')
    </head>
    <body class="auth-page">
        <div id="app">
            <main>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="content">
                    @yield('content')
                </div>
            </main>
        </div>

        {{-- Scripts --}}
        <script src="{{ mix('js/admin.js') }}" defer></script>

        @stack('scripts')

    </body>
</html>
