@extends('layouts.admin')

@section('template_title')
    Admin Dashboard
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.dashboard.header') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('admin.dashboard.welcome-card-title', ['username' => Auth::user()->name]) !!}
                </h5>
                <p class="card-category">
                    {!! trans('admin.dashboard.welcome-card-sub-title') !!}
                </p>
            </div>
            <hr>
            <div class="card-body ">
                <p>
                    {{ trans('admin.dashboard.welcome-access') }}
                    <strong>
                        @role('super.admin', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.super-admin') !!}
                            </span>
                        @endrole

                        @role('admin', true)
                            <span class="badge badge-warning" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.admin') !!}
                            </span>
                        @endrole

                        @role('moderator', true)
                            <span class="badge badge-info" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.moderator') !!}
                            </span>
                        @endrole

                        @role('writer', true)
                            <span class="badge badge-dark" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.writer') !!}
                            </span>
                        @endrole

                        @role('user', true)
                            <span class="badge badge-default" style="margin-top:4px">
                                {!! trans('admin.access_levels.roles.user') !!}
                            </span>
                        @endrole
                    </strong>
                </p>

                <p>
                    {!! trans_choice('admin.dashboard.access-level-string', Auth::User()->level()) !!}

                    @level(5)
                        <span class="badge badge-primary margin-half">5</span>
                    @endlevel

                    @level(4)
                        <span class="badge badge-info margin-half">4</span>
                    @endlevel

                    @level(3)
                        <span class="badge badge-success margin-half">3</span>
                    @endlevel

                    @level(2)
                        <span class="badge badge-dark margin-half text-white">2</span>
                    @endlevel

                    @level(1)
                        <span class="badge badge-default margin-half text-white">1</span>
                    @endlevel
                </p>

                <p>
                    {!! trans('admin.dashboard.permissions-string') !!}

                    @permission('view.users')
                        <span class="badge badge-primary margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.view-users') !!}
                        </span>
                    @endpermission
                    @permission('create.users')
                        <span class="badge badge-info margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.create-users') !!}
                        </span>
                    @endpermission
                    @permission('edit.users')
                        <span class="badge badge-warning text-white margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.edit-users') !!}
                        </span>
                    @endpermission
                    @permission('delete.users')
                        <span class="badge badge-danger margin-half margin-left-0">
                            {!! trans('admin.access_levels.permissions.delete-users') !!}
                        </span>
                    @endpermission
                    @permission('perms.super.admin')
                        <span class="badge badge-success margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.super-admin') !!}
                        </span>
                    @endpermission
                    @permission('perms.admin')
                        <span class="badge badge-dark margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.admin') !!}
                        </span>
                    @endpermission
                    @permission('perms.moderator')
                        <span class="badge badge-secondary margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.moderator') !!}
                        </span>
                    @endpermission
                    @permission('perms.writer')
                        <span class="badge badge-danger margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.writer') !!}
                        </span>
                    @endpermission
                    @permission('perms.user')
                        <span class="badge badge-info margin-half margin-left-0">
                            {!! trans('admin.access_levels.roles.user') !!}
                        </span>
                    @endpermission
                </p>

            </div>
            <hr>
            <div class="card-footer">
                <p class="stats text-muted">
                    {!! trans('admin.dashboard.welcome-card-footer') !!}
                    <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=larablog&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 3px 0 -5px .5em;"></iframe>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
