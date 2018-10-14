@extends('layouts.admin')

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
                        @role('super.admin', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                Admin Access
                            </span>
                        @endrole

                        @role('admin', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                Admin Access
                            </span>
                        @endrole

                        @role('moderator', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                Moderator Access
                            </span>
                        @endrole

                        @role('writer', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                Writer Access
                            </span>
                        @endrole

                        @role('user', true)
                            <span class="badge badge-primary" style="margin-top:4px">
                                User Access
                            </span>
                        @endrole
                    </p>
                </div>
                <div class="card-footer ">
                    <hr>
                    <p class="stats text-muted">
                        <!-- <i class="fa fa-history"></i> -->
                        <!-- Updated 3 minutes ago -->
                        Please remember to star it. :)
                        <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=larablog&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 3px 0 -5px .5em;"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
