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

        {{-- Fonts --}}
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

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
    <body>
        <div id="app">
            <main>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="wrapper ">

                    @include('admin.partials.sidebar')

                    <div class="main-panel">

                        @include('admin.partials.navbar')

                        <div class="content">
                            @yield('content')
                        </div>

                        @include('admin.partials.footer')

                    </div>
                </div>
            </main>
        </div>

        {{-- Scripts --}}
        <script type="text/javascript">
            var CKEDITOR_BASEPATH = '/js/ckeditor/';
        </script>
        <script src="{{ mix('js/admin.js') }}"></script>
        @stack('scripts')
        @yield('template_scripts')

    </body>
</html>
