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
