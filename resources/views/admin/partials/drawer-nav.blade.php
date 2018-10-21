<div class="sidebar-wrapper">
    <ul class="nav">

        @if (Route::has('admin'))
            <li class="{{ Request::is('admin') ? 'active' : null }} ">
                <a href="{{ route('admin') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>
                        {!! trans('admin.drawer-nav.dashboard') !!}
                    </p>
                </a>
            </li>
        @endif

        @if (Route::has('admin.posts'))
            <li class="{{ Request::is('admin/posts') ? 'active' : null }} ">
                <a href="{{ route('admin.posts') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>
                        {!! trans('admin.drawer-nav.posts') !!}
                    </p>
                </a>
            </li>
        @endif

        @if (Route::has('admin/tags'))
            <li class="{{ Request::is('admin/tags') ? 'active' : null }} ">
                <a href="{{ route('admin/tags') }}">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>
                        {!! trans('admin.drawer-nav.tags') !!}
                    </p>
                </a>
            </li>
        @endif

        @if (Route::has('admin/files'))
            <li class="{{ Request::is('admin/files') ? 'active' : null }} ">
                <a href="{{ route('admin/files') }}">
                    <i class="nc-icon nc-box"></i>
                    <p>
                        {!! trans('admin.drawer-nav.file-manager') !!}
                    </p>
                </a>
            </li>
        @endif

        @if(Auth::check() && Auth::user()->hasPermission('perms.super.admin'))
            @if (Route::has('users'))
                <li class="{{ Request::is('users') ? 'active' : null }} ">
                    <a href="{{ route('users') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>
                            {!! trans('admin.drawer-nav.users') !!}
                        </p>
                    </a>
                </li>
            @endif

            @if (Route::has('admin/roles'))
                <li class="{{ Request::is('admin/roles') ? 'active' : null }} ">
                    <a href="{{ route('admin/roles') }}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>
                            {!! trans('admin.drawer-nav.roles') !!}
                        </p>
                    </a>
                </li>
            @endif

            @if (Route::has('laravelPhpInfo::phpinfo'))
                <li class="{{ Request::is('phpinfo') ? 'active' : null }} ">
                    <a href="{{ route('laravelPhpInfo::phpinfo') }}">
                        <i class="nc-icon nc-alert-circle-i"></i>
                        <p>
                            {!! trans('admin.drawer-nav.phpinfo') !!}
                        </p>
                    </a>
                </li>
            @endif

            @if (Route::has('activity'))
                <li class="{{ Request::is('activity') ? 'active' : null }} ">
                    <a href="{{ route('activity') }}">
                        <i class="nc-icon nc-tap-01"></i>
                        <p>
                            {!! trans('admin.drawer-nav.activity') !!}
                        </p>
                    </a>
                </li>
            @endif

            @if (Route::has('admin/settings'))
                <li class="{{ Request::is('admin/settings') ? 'active' : null }} ">
                    <a href="{{ route('admin/settings') }}">
                        <i class="nc-icon nc-single-02"></i>
                        <p>
                            {!! trans('admin.drawer-nav.settings') !!}
                        </p>
                    </a>
                </li>
            @endif
        @endif

    </ul>
</div>
