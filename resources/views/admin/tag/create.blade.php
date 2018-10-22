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
                    {!! trans('forms.create-tag.title') !!}
                </h5>
            </div>
            <hr>
            {!! Form::open(['method' => 'POST', 'route' => 'storetag',  'class' => 'create-tag-form', 'id' => 'create_tag_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
                <div class="card-body">
                    <input type="hidden" name="_method" value="POST">
                    @include('admin.tag.partials.tag-form')
                </div>
                <hr>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <button type="submit" class="btn btn-primary btn-md btn-block mt-0">
                                {!! trans('forms.create-tag.buttons.add-new') !!}
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script type="text/javascript">
    $(function() {
        // Image Uploader
        $('#post_image_trigger').filemanager('image');
    });
</script>

@endpush
