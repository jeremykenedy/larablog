<ul class="nav navbar-nav">
  <li><a href="/">Go Home</a></li>
  @if (Auth::check())
  <li class="dropdown ">
    <a href="/admin/post" class="dropdown-toggle @if (Request::is('admin/post*')) active @endif" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li @if (Request::is('admin/post*')) class="active" @endif>
        <a href="/admin/post">Posts</a>
      </li>
      <li role="separator" class="divider"></li>
      <li @if (Request::is('admin/tag*')) class="active" @endif>
        <a href="/admin/tag">Tags</a>
      </li>
      <li role="separator" class="divider"></li>
      <li @if (Request::is('admin/upload*')) class="active" @endif>
        <a href="/admin/upload">Uploads</a>
      </li>
    </ul>
  </li>
  @endif
</ul>
<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>



