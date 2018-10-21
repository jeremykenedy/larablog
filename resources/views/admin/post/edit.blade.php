@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.posts.pages.edit.title', ['id' => $id]) }}
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.posts.pages.edit.header') }}
@endsection

@push('head')
@endpush

@section('content')
<div class="content">
    <div class="row">
        <div class="col-12">

            <div class="card card-post"  id="post_card">
                <div class="card-header">
                    <div class="badge badge-pill badge-primary pull-right">
                        <small>
                            {!! trans('forms.edit-post.id-title', ['id' => $id]) !!}
                        </small>
                    </div>
                    <h5 class="card-title">
                        {!! trans('forms.edit-post.title') !!}
                    </h5>
                </div>

                <hr>
                @include('admin.partials.messages')
                @include('admin.partials.loading-spinner-1')

                {!! Form::open(['method' => 'PUT', 'route' => ['updatepost', $id],  'class' => 'blog-post-form', 'id' => 'edit_post_form', 'role' => 'form', 'enctype' => 'multipart/form-data', 'style' => 'display: none;' ]) !!}
                    {!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <meta name="_token" content="{!! csrf_token() !!}" />

                    <div class="card-body">
                        @include('admin.post.partials.post-form')
                    </div>

                    <hr>

                    <div class="card-footer">
                        <div class="row ">

                            <div class="col-md-4 mb-4">
                                {!! Form::button(trans('forms.edit-post.buttons.save-continue'), [
                                    'class' => 'btn btn-success btn-lg btn-block',
                                    'type' => 'button',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modal_save'
                                ]) !!}
                            </div>

                            <div class="col-md-4 mb-4">
                                <a href="{{ url('/' . $slug) }}" class="btn btn-info btn-lg btn-block">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    {{ trans('admin.buttons.view') }}
                                </a>
                            </div>

                            <div class="col-md-4 mb-4">
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>' . trans('admin.buttons.delete'), [
                                    'class' => 'btn btn-danger btn-lg btn-block',
                                    'type' => 'button',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#modal_delete'
                                ]) !!}
                            </div>

                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@include('admin.modals.delete-post-modal-form', ['postId' => $id])
@include('admin.modals.save-post-modal-form', ['postId' => $id])

@endsection

@push('scripts')
    @include('admin.scripts.post-form-scripts')
    @include('admin.scripts.save-post-modal')
@endpush
