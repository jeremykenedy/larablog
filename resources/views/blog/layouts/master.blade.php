<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_description }}">
    <meta name="author" content="{{ config('blog.author') }}">
    <title>{{ $title or config('blog.title') }}</title>
    <link rel="alternate" type="application/rss+xml" href="{{ url('rss') }}" title="RSS Feed {{ config('blog.title') }}">

    {{-- Styles --}}
    <link href="/assets/css/blog.css" rel="stylesheet">
    @yield('styles')

    {{-- HTML5 Shim and Respond.js for IE8 support --}}
    <!--[if lt IE 9]> 
      <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
      <script type="text/javascript" src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script> 
      <script type="text/javascript" src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script> 
      <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
    <![endif]--> 
    <!--[if gte IE 9]>
      <style type="text/css">.gradient {filter: none;}</style>
    <![endif]-->

  </head>
  <body>
    @include('blog.partials.page-nav')

    @yield('page-header')
    @yield('content')

    @include('blog.partials.page-footer')

    {{-- Scripts --}}
    <script type="text/javascript" src="/assets/js/blog.js"></script>
    @yield('scripts')
  </body>
</html>