<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('blog.title') }} Admin</title>
    <meta name="description" content="">
    <meta name="author" content="{{ config('blog.author') }}">

    <!--[if lt IE 9]> 
      <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
      <script type="text/javascript" src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script> 
      <script type="text/javascript" src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script> 
      <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
    <![endif]--> 
    <!--[if gte IE 9]>
      <style type="text/css">.gradient {filter: none;}</style>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/assets/css/admin.css">
    @yield('styles')

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin">{{ config('blog.title') }} Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
          @include('admin.partials.navbar')
        </div>
      </div>
    </nav>

    @yield('content')

    @yield('scripts')

    <script type="text/javascript" src="//cdn.ckeditor.com/4.5.2/standard/ckeditor.js"></script>
    <script src="/assets/js/admin.js"></script>
  </body>
</html>