@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.tags.pages.create.title') }}
@endsection

@section('template_description')
    {{ trans('admin.tags.pages.create.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.tags.pages.create.header') }}
@endsection

@push('head')
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    Create New Tag
                </h5>
            </div>
            <hr>
            <div class="card-body">

                <form class="form-horizontal" role="form" method="POST" action="/admin/tag">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-4">

                        <div class="row">
                            <div class="col-12">
                                <label for="tag" class="col-md-3 control-label">
                                    Tag
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input type="text" class="form-control" name="tag" id="tag" value="{{ $tag }}" autofocus>
                            </div>





<div class="form-group">
  <label for="title" class="col-md-3 control-label">
    Title
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="title"
           id="title" value="{{ $title }}">
  </div>
</div>

<div class="form-group">
  <label for="subtitle" class="col-md-3 control-label">
    Subtitle
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="subtitle"
           id="subtitle" value="{{ $subtitle }}">
  </div>
</div>

<div class="form-group">
  <label for="meta_description" class="col-md-3 control-label">
    Meta Description
  </label>
  <div class="col-md-8">
    <textarea class="form-control" id="meta_description"
              name="meta_description" rows="3">{{
      $meta_description
    }}</textarea>
  </div>
</div>

<div class="form-group">
  <label for="post_image" class="col-md-3 control-label">
    Page Image
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="post_image"
           id="post_image" value="{{ $post_image }}">
  </div>
</div>

<div class="form-group">
  <label for="layout" class="col-md-3 control-label">
    Layout
  </label>
  <div class="col-md-4">
    <input type="text" class="form-control" name="layout" id="layout"
           value="{{ $layout }}">
  </div>
</div>

<div class="form-group">
  <label for="reverse_direction" class="col-md-3 control-label">
    Direction
  </label>
  <div class="col-md-7">
    <label class="radio-inline">
      <input type="radio" name="reverse_direction"
             id="reverse_direction"
      @if (! $reverse_direction)
        checked="checked"
      @endif
      value="0"> Normal
    </label>
    <label class="radio-inline">
      <input type="radio" name="reverse_direction"
      @if ($reverse_direction)
        checked="checked"
      @endif
      value="1"> Reversed
    </label>
  </div>
</div>








                            <div class="col-sm-6 mb-3">
                                <button type="submit" class="btn btn-primary btn-md btn-block mt-0">
                                    <i class="fa fa-plus-circle"></i>
                                    Add New Tag
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
@endpush
