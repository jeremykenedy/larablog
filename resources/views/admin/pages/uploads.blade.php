@extends('layouts.admin')

@section('template_title')
    {!! trans('admin.file_manager.index.title') !!}
@endsection

@section('template_description')
    {!! trans('admin.file_manager.index.title') !!}
@endsection

@section('header_title')
    {!! trans('admin.file_manager.index.header') !!}
@endsection

@push('head')
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bs3-modals.css') }}">
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title">
                    {!! trans('laravel-filemanager::lfm.title-panel') !!}
                </h5>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 hidden-xs">
                        <div id="tree"></div>
                    </div>
                    <div class="col-sm-10 col-xs-12" id="main">
                        <a class="navbar-brand clickable hide" id="to-previous">
                            <i class="fa fa-arrow-left"></i>
                            <span class="hidden-xs">
                                {{ trans('laravel-filemanager::lfm.nav-back') }}
                            </span>
                        </a>
                        <a class="navbar-brand visible-xs" href="#">
                            {{ trans('laravel-filemanager::lfm.title-panel') }}
                        </a>

                        <div class="collapsse navbar-collapse" id="nav-buttons">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a class="clickable" id="thumbnail-display">
                                      <i class="fa fa-th-large"></i>
                                      <span>{{ trans('laravel-filemanager::lfm.nav-thumbnails') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="clickable" id="list-display">
                                      <i class="fa fa-list"></i>
                                      <span>{{ trans('laravel-filemanager::lfm.nav-list') }}</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                      {{ trans('laravel-filemanager::lfm.nav-sort') }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" id="list-sort-alphabetic">
                                                <i class="fa fa-sort-alpha-asc"></i> {{ trans('laravel-filemanager::lfm.nav-sort-alphabetic') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="list-sort-time">
                                                <i class="fa fa-sort-amount-asc"></i> {{ trans('laravel-filemanager::lfm.nav-sort-time') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="visible-xssss" id="current_dir" style="padding: 5px 15px;background-color: #f8f8f8;color: #5e5e5e;"></div>
                        <div id="alerts"></div>
                        <div id="content"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul id="fab">
        <li>
            <a href="#"></a>
            <ul class="hide">
                <li>
                    <a href="#" id="add-folder" data-mfb-label="{{ trans('laravel-filemanager::lfm.nav-new') }}">
                        <i class="fa fa-folder"></i>
                    </a>
                </li>
                <li>
                    <a href="#" id="upload" data-mfb-label="{{ trans('laravel-filemanager::lfm.nav-upload') }}">
                        <i class="fa fa-upload"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

@include('admin.modals.upload-modal')
{{-- @include('admin.partials.loading-file-1') --}}

@endsection

@prepend('scripts')
@endprepend

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/cropper.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/jquery.form.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script>
        var route_prefix = "{{ url('/') }}";
        var lfm_route = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
        var lang = {!! json_encode(trans('laravel-filemanager::lfm')) !!};
    </script>

    <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script>
    <script>
        $.fn.fab = function () {
            var menu = this;
            menu.addClass('mfb-component--br mfb-zoomin').attr('data-mfb-toggle', 'hover');
            var wrapper = menu.children('li');
            wrapper.addClass('mfb-component__wrap');
            var parent_button = wrapper.children('a');
            parent_button.addClass('mfb-component__button--main')
                .append($('<i>').addClass('mfb-component__main-icon--resting fa fa-plus'))
                .append($('<i>').addClass('mfb-component__main-icon--active fa fa-times'));
            var children_list = wrapper.children('ul');
            children_list.find('a').addClass('mfb-component__button--child');
            children_list.find('i').addClass('mfb-component__child-icon');
            children_list.addClass('mfb-component__list').removeClass('hide');
        };
        $('#fab').fab({
            buttons: [
                {
                    icon: 'fa fa-folder',
                    label: "{{ trans('laravel-filemanager::lfm.nav-new') }}",
                    attrs: {id: 'add-folder'}
                },
                {
                    icon: 'fa fa-upload',
                    label: "{{ trans('laravel-filemanager::lfm.nav-upload') }}",
                    attrs: {id: 'upload'}
                }
            ]
        });

        Dropzone.options.uploadForm = {
            paramName: "upload[]", // The name that will be used to transfer the file
            uploadMultiple: false,
            parallelUploads: 5,
            clickable: '#upload-button',
            dictDefaultMessage: 'Or drop files here to upload',
            init: function() {
                var _this = this; // For the closure
                this.on('success', function(file, response) {
                    if (response == 'OK') {
                        refreshFoldersAndItems('OK');
                    } else {
                        this.defaultOptions.error(file, response.join('\n'));
                    }
                });
            },
            acceptedFiles: "{{ lcfirst(str_singular(request('type') ?: '')) == 'image' ? implode(',', config('lfm.valid_image_mimetypes')) : implode(',', config('lfm.valid_file_mimetypes')) }}",
            maxFilesize: ({{ lcfirst(str_singular(request('type') ?: '')) == 'image' ? config('lfm.max_image_size') : config('lfm.max_file_size') }} / 1000)
        }
    </script>

@endpush
