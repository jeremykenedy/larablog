@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.posts.pages.create.title') }}
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.posts.pages.create.header') }}
@endsection

@push('head')
@endpush

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div class="badge badge-pill badge-warning text-white pull-right">
                        <small>
                            {!! trans('forms.create-post.badge') !!}
                        </small>
                    </div>
                    <h5 class="card-title">
                        {!! trans('forms.create-post.title') !!}
                    </h5>
                </div>

                @include('admin.partials.messages')
                @include('admin.partials.loading-spinner-1')

                {!! Form::open(['method' => 'POST', 'route' => 'storepost',  'class' => 'blog-post-form', 'id' => 'store_post_form', 'role' => 'form', 'enctype' => 'multipart/form-data', 'style' => 'display: none;' ]) !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                    <meta name="_token" content="{!! csrf_token() !!}" />

                    <div class="card-body">
                        @include('admin.post.partials.post-form')
                    </div>

                    <hr>

                    <div class="card-footer">
                        <div class="row ">
                            <div class="col-md-6 mb-4">
                                <span data-toggle="tooltip" data-placement="right" title="{!! trans('tooltips.post.save-new-post') !!}">
                                    {!! Form::button(trans('forms.edit-post.buttons.save-continue'), ['class' => 'btn btn-success btn-lg btn-block','type' => 'submit', 'name' => 'action', 'value' => 'continue']) !!}
                                </span>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    @include('admin.scripts.post-form-scripts')
@endpush
