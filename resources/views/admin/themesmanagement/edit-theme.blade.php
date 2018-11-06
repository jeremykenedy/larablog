@extends('layouts.admin')

@section('template_title')
    {!! trans('themes.themeTitle', ['name' => $theme->name]) !!}
@endsection

@section('header_title')
    {!! trans('themes.header.edit') !!}
@endsection

@section('template_linked_css')
@endsection

@php
    $themeActive = [
        'checked' => '',
        'value' => 0,
        'true'  => '',
        'false' => 'checked'
    ];
    if($theme->status == 1) {
        $themeActive = [
            'checked' => 'checked',
            'value' => 1,
            'true'  => 'checked',
            'false' => ''
        ];
    }
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-right">
                <a href="{{ route('showtheme', $theme->id) }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="top" title="{{ trans('themes.backToThemeTt') }}">
                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                    {!! trans('themes.backToThemeBtn') !!}
                </a>
                <a href="{{ route('themes') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('themes.backToThemesTt') }}">
                    <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                    {!! trans('themes.backToThemesBtn') !!}
                </a>
            </div>
            <h4 class="card-title small">
                <strong>{{ trans('themes.editTitle') }}</strong>
                <br /> {{ $theme->name }}
            </h4>
        </div>
        <hr>
        <div class="container">
            @include('admin.partials.messages')
        </div>
        {!! Form::model($theme, ['route' => ['updatetheme', $theme->id], 'method' => 'PUT']) !!}
            {!! csrf_field() !!}


            <div class="card-body">
                <div class="form-group has-feedback row {{ $errors->has('status') ? ' has-error ' : '' }} @if($theme->id == 1) disabled @endif ">
                    {!! Form::label('status', trans('themes.statusLabel'), array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <label class="switch {{ $themeActive['checked'] }}" for="status">
                            <span class="active"><i class="fa fa-toggle-on fa-2x"></i> {{ trans('themes.statusEnabled') }}</span>
                            <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> {{ trans('themes.statusDisabled') }}</span>
                            <input type="radio" name="status" value="1" {{ $themeActive['true'] }}>
                            <input type="radio" name="status" value="0" {{ $themeActive['false'] }}>
                        </label>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                    {!! Form::label('name', trans('themes.nameLabel'), array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('name', $theme->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('themes.namePlaceholder'))) !!}
                            <div class="input-group-append">
                                <label for="name" class="input-group-text">
                                    <i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group has-feedback row {{ $errors->has('link') ? ' has-error ' : '' }}">
                    {!! Form::label('link', trans('themes.linkLabel'), array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('link', $theme->link, array('id' => 'link', 'class' => 'form-control', 'placeholder' => trans('themes.linkPlaceholder'))) !!}
                            <div class="input-group-append">
                                <label for="link" class="input-group-text">
                                    <i class="fa fa-fw fa-link fa-rotate-90" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('link'))
                            <span class="help-block">
                                <strong>{{ $errors->first('link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group has-feedback row {{ $errors->has('notes') ? ' has-error ' : '' }}">
                    {!! Form::label('notes', trans('themes.notesLabel') , array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::textarea('notes', old('notes'), array('id' => 'notes', 'class' => 'form-control', 'placeholder' => trans('themes.notesPlaceholder'))) !!}
                            <div class="input-group-append">
                                <label for="notes" class="input-group-text m-0">
                                    <i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('notes'))
                            <span class="help-block">
                                <strong>{{ $errors->first('notes') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>


            <hr>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6 offset-sm-6 pb-3">
                        {!! Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('themes.editSave'), array('class' => 'btn btn-success btn-block mb-0 mt-0 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    @include('admin.modals.save-modal')

@endsection

@push('scripts')
    @include('admin.scripts.toggle-status')
    @include('admin.scripts.save-modal-script')
@endpush
