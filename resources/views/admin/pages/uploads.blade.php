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

    {{-- @TODO: I will circle back to this mess --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/folder.png') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-filemanager/css/lfm.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/mfb.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.css">
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->

    <style type="text/css" media="screen">

        .fade {
          opacity: 0;
          -webkit-transition: opacity .15s linear;
               -o-transition: opacity .15s linear;
                  transition: opacity .15s linear;
        }
        .fade.in {
            opacity: 1;
        }
        .modal-open {
          overflow: hidden;
        }
        .modal {
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 1050;
          display: none;
          overflow: hidden;
          -webkit-overflow-scrolling: touch;
          outline: 0;
        }
        .modal.fade .modal-dialog {
          -webkit-transition: -webkit-transform .3s ease-out;
               -o-transition:      -o-transform .3s ease-out;
                  transition:         transform .3s ease-out;
          -webkit-transform: translate(0, -25%);
              -ms-transform: translate(0, -25%);
               -o-transform: translate(0, -25%);
                  transform: translate(0, -25%);
        }
        .modal.in .modal-dialog {
          -webkit-transform: translate(0, 0);
              -ms-transform: translate(0, 0);
               -o-transform: translate(0, 0);
                  transform: translate(0, 0);
        }
        .modal-open .modal {
          overflow-x: hidden;
          overflow-y: auto;
        }
        .modal-dialog {
          position: relative;
          width: auto;
          margin: 10px;
        }
        .modal-content {
          position: relative;
          background-color: #fff;
          -webkit-background-clip: padding-box;
                  background-clip: padding-box;
          border: 1px solid #999;
          border: 1px solid rgba(0, 0, 0, .2);
          border-radius: 6px;
          outline: 0;
          -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
                  box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
        }
        .modal-backdrop {
          position: fixed;
          top: 0;
          right: 0;
          bottom: 0;
          left: 0;
          z-index: 1040;
          background-color: #000;
        }
        .modal-backdrop.fade {
          filter: alpha(opacity=0);
          opacity: 0;
        }
        .modal-backdrop.in {
          filter: alpha(opacity=50);
          opacity: .5;
        }
        .modal-header {
          min-height: 16.42857143px;
          padding: 15px;
          border-bottom: 1px solid #e5e5e5;
        }
        .modal-header .close {
          margin-top: -2px;
        }
        .modal-title {
          margin: 0;
          line-height: 1.42857143;
        }
        .modal-body {
          position: relative;
          padding: 15px;
        }
        .modal-footer {
          padding: 15px;
          text-align: right;
          border-top: 1px solid #e5e5e5;
        }
        .modal-footer .btn + .btn {
          margin-bottom: 0;
          margin-left: 5px;
        }
        .modal-footer .btn-group .btn + .btn {
          margin-left: -1px;
        }
        .modal-footer .btn-block + .btn-block {
          margin-left: 0;
        }
        .modal-scrollbar-measure {
          position: absolute;
          top: -9999px;
          width: 50px;
          height: 50px;
          overflow: scroll;
        }
        @media (min-width: 768px) {
          .modal-dialog {
            width: 600px;
            margin: 30px auto;
          }
          .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
          }
          .modal-sm {
            width: 300px;
          }
        }
        @media (min-width: 992px) {
          .modal-lg {
            width: 900px;
          }
        }

        .center-block {
          display: block;
          margin-right: auto;
          margin-left: auto;
        }
        .pull-right {
          float: right !important;
        }
        .pull-left {
          float: left !important;
        }
        .hide {
          display: none !important;
        }
        .show {
          display: block !important;
        }
        .invisible {
          visibility: hidden;
        }
        .text-hide {
          font: 0/0 a;
          color: transparent;
          text-shadow: none;
          background-color: transparent;
          border: 0;
        }
        .hidden {
          display: none !important;
        }
        .affix {
          position: fixed;
        }
        @-ms-viewport {
          width: device-width;
        }
        .visible-xs,
        .visible-sm,
        .visible-md,
        .visible-lg {
          display: none !important;
        }
        .visible-xs-block,
        .visible-xs-inline,
        .visible-xs-inline-block,
        .visible-sm-block,
        .visible-sm-inline,
        .visible-sm-inline-block,
        .visible-md-block,
        .visible-md-inline,
        .visible-md-inline-block,
        .visible-lg-block,
        .visible-lg-inline,
        .visible-lg-inline-block {
          display: none !important;
        }
        @media (max-width: 767px) {
          .visible-xs {
            display: block !important;
          }
          table.visible-xs {
            display: table;
          }
          tr.visible-xs {
            display: table-row !important;
          }
          th.visible-xs,
          td.visible-xs {
            display: table-cell !important;
          }
        }
        @media (max-width: 767px) {
          .visible-xs-block {
            display: block !important;
          }
        }
        @media (max-width: 767px) {
          .visible-xs-inline {
            display: inline !important;
          }
        }
        @media (max-width: 767px) {
          .visible-xs-inline-block {
            display: inline-block !important;
          }
        }
        @media (min-width: 768px) and (max-width: 991px) {
          .visible-sm {
            display: block !important;
          }
          table.visible-sm {
            display: table;
          }
          tr.visible-sm {
            display: table-row !important;
          }
          th.visible-sm,
          td.visible-sm {
            display: table-cell !important;
          }
        }
        @media (min-width: 768px) and (max-width: 991px) {
          .visible-sm-block {
            display: block !important;
          }
        }
        @media (min-width: 768px) and (max-width: 991px) {
          .visible-sm-inline {
            display: inline !important;
          }
        }
        @media (min-width: 768px) and (max-width: 991px) {
          .visible-sm-inline-block {
            display: inline-block !important;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .visible-md {
            display: block !important;
          }
          table.visible-md {
            display: table;
          }
          tr.visible-md {
            display: table-row !important;
          }
          th.visible-md,
          td.visible-md {
            display: table-cell !important;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .visible-md-block {
            display: block !important;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .visible-md-inline {
            display: inline !important;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .visible-md-inline-block {
            display: inline-block !important;
          }
        }
        @media (min-width: 1200px) {
          .visible-lg {
            display: block !important;
          }
          table.visible-lg {
            display: table;
          }
          tr.visible-lg {
            display: table-row !important;
          }
          th.visible-lg,
          td.visible-lg {
            display: table-cell !important;
          }
        }
        @media (min-width: 1200px) {
          .visible-lg-block {
            display: block !important;
          }
        }
        @media (min-width: 1200px) {
          .visible-lg-inline {
            display: inline !important;
          }
        }
        @media (min-width: 1200px) {
          .visible-lg-inline-block {
            display: inline-block !important;
          }
        }
        @media (max-width: 767px) {
          .hidden-xs {
            display: none !important;
          }
        }
        @media (min-width: 768px) and (max-width: 991px) {
          .hidden-sm {
            display: none !important;
          }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
          .hidden-md {
            display: none !important;
          }
        }
        @media (min-width: 1200px) {
          .hidden-lg {
            display: none !important;
          }
        }
        .visible-print {
          display: none !important;
        }
        @media print {
          .visible-print {
            display: block !important;
          }
          table.visible-print {
            display: table;
          }
          tr.visible-print {
            display: table-row !important;
          }
          th.visible-print,
          td.visible-print {
            display: table-cell !important;
          }
        }
        .visible-print-block {
          display: none !important;
        }
        @media print {
          .visible-print-block {
            display: block !important;
          }
        }
        .visible-print-inline {
          display: none !important;
        }
        @media print {
          .visible-print-inline {
            display: inline !important;
          }
        }
        .visible-print-inline-block {
          display: none !important;
        }
        @media print {
          .visible-print-inline-block {
            display: inline-block !important;
          }
        }
        @media print {
          .hidden-print {
            display: none !important;
          }
        }

    </style>

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



<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aia-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{ trans('laravel-filemanager::lfm.title-upload') }}</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('unisharp.lfm.upload') }}" role='form' id='uploadForm' name='uploadForm' method='post' enctype='multipart/form-data' class="dropzone">
            <div class="form-group" id="attachment">

              <div class="controls text-center">
                <div class="input-group" style="width: 100%">
                  <a class="btn btn-primary" id="upload-button">{{ trans('laravel-filemanager::lfm.message-choose') }}</a>
                </div>
              </div>
            </div>
            <input type='hidden' name='working_dir' id='working_dir'>
            <input type='hidden' name='type' id='type' value='{{ request("type") }}'>
            <input type='hidden' name='_token' value='{{csrf_token()}}'>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('laravel-filemanager::lfm.btn-close') }}</button>
        </div>
      </div>
    </div>
</div>


<div id="lfm-loader">
    <img src="{{asset('vendor/laravel-filemanager/img/loader.svg')}}">
</div>

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
  <script>{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/script.js')) !!}</script>
  {{-- Use the line below instead of the above if you need to cache the script. --}}
  {{-- <script src="{{ asset('vendor/laravel-filemanager/js/script.js') }}"></script> --}}
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
