@extends('layouts.admin')

@section('template_title')
    Admin Dashboard
@endsection

@section('template_description')
@endsection

@php
    $levelAmount = 'level';
    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }
@endphp

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">
                        Hi {{ Auth::user()->name }}, Welcome to Lara(b)og2
                    </h5>
                    <p class="card-category">
                        Lara(b)log An opensource blog platform built on Laravel and Bootstrap 4.
                    </p>
                </div>
                <div class="card-body ">

                    <p>
                        You have
                        <strong>
                            @role('super.admin', true)
                                <span class="badge badge-primary" style="margin-top:4px">
                                    Super Admin Access
                                </span>
                            @endrole

                            @role('admin', true)
                                <span class="badge badge-warning" style="margin-top:4px">
                                    Admin Access
                                </span>
                            @endrole

                            @role('moderator', true)
                                <span class="badge badge-info" style="margin-top:4px">
                                    Moderator Access
                                </span>
                            @endrole

                            @role('writer', true)
                                <span class="badge badge-dark" style="margin-top:4px">
                                    Writer Access
                                </span>
                            @endrole

                            @role('user', true)
                                <span class="badge badge-default" style="margin-top:4px">
                                    User Access
                                </span>
                            @endrole
                        </strong>
                        Access
                    </p>


                    <p>
                        You have access to {{ $levelAmount }}:
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
                        You have permissions:
                        @permission('view.users')
                            <span class="badge badge-primary margin-half margin-left-0">
                                <!-- {{ trans('permsandroles.permissionView') }} -->
                                View Users
                            </span>
                        @endpermission
                        @permission('create.users')
                            <span class="badge badge-info margin-half margin-left-0">
                                <!-- {{ trans('permsandroles.permissionCreate') }} -->
                                Create Users
                            </span>
                        @endpermission
                        @permission('edit.users')
                            <span class="badge badge-warning text-white margin-half margin-left-0">
                                <!-- {{ trans('permsandroles.permissionEdit') }} -->
                                Edit Users
                            </span>
                        @endpermission
                        @permission('delete.users')
                            <span class="badge badge-danger margin-half margin-left-0">
                                <!-- {{ trans('permsandroles.permissionDelete') }} -->
                                Delete Users
                            </span>
                        @endpermission
                        @permission('perms.super.admin')
                            <span class="badge badge-success margin-half margin-left-0">
                                Super Admin
                            </span>
                        @endpermission
                        @permission('perms.admin')
                            <span class="badge badge-dark margin-half margin-left-0">
                                Admin
                            </span>
                        @endpermission
                        @permission('perms.moderator')
                            <span class="badge badge-secondary margin-half margin-left-0">
                                Moderator
                            </span>
                        @endpermission
                        @permission('perms.writer')
                            <span class="badge badge-danger margin-half margin-left-0">
                                Writer
                            </span>
                        @endpermission
                        @permission('perms.user')
                            <span class="badge badge-info margin-half margin-left-0">
                                User
                            </span>
                        @endpermission
                    </p>

                </div>
                <div class="card-footer ">
                    <hr>
                    <p class="stats text-muted">
                        <!-- <i class="fa fa-history"></i> -->
                        <!-- Updated 3 minutes ago -->
                        <em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>
                        <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=larablog&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 3px 0 -5px .5em;"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
