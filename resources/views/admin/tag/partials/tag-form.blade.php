{!! csrf_field() !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<meta name="_token" content="{!! csrf_token() !!}" />

<div class="row">
    <div class="col-md-8">
        <div class="form-group has-feedback row {{ $errors->has('tag') ? ' has-error ' : '' }}">
            {!! Form::label('tag', trans('forms.create-tag.labels.tag'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('tag', $tag, [
                    'id' => 'tag',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-tag.labels.tag')
                ]) !!}
            </div>
            @if ($errors->has('tag'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('tag') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('title') ? ' has-error ' : '' }}">
            {!! Form::label('title', trans('forms.create-tag.labels.title'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('title', $title, [
                    'id' => 'title',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-tag.labels.title')
                ]) !!}
            </div>
            @if ($errors->has('title'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('subtitle') ? ' has-error ' : '' }}">
            {!! Form::label('subtitle', trans('forms.create-tag.labels.subtitle'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('subtitle', $subtitle, [
                    'id' => 'subtitle',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.create-tag.labels.subtitle')
                ]) !!}
            </div>
            @if ($errors->has('subtitle'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('subtitle') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('layout') ? ' has-error ' : '' }}">
            {!! Form::label('layout', trans('forms.create-tag.labels.tag-layout'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="layout" id="layout" class="form-control">
                    @foreach ($postTemplates as $postTemplate)
                        <option @if ($postTemplate['path'] == $layout) selected @endif value="{{ $postTemplate['path'] }}">
                            {{ $postTemplate['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('layout'))
                <div class="row">
                    <div class="col-12">
                        <span class="help-block">
                            <strong>{{ $errors->first('layout') }}</strong>
                        </span>
                    </div>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('meta_description') ? ' has-error ' : '' }}">
            {!! Form::label('meta_description', trans('forms.create-tag.labels.meta_description'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::textarea('meta_description', $meta_description, array('id' => 'meta_description', 'class' => 'form-control', 'placeholder' => trans('forms.create-tag.labels.meta_description'))) !!}
            </div>
            @if ($errors->has('meta_description'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                </div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group has-feedback row {{ $errors->has('post_image') ? ' has-error ' : '' }}">
            {!! Form::label('post_image', trans('forms.create-tag.labels.tag-post_image'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <div class="row">
                    <div class="col-12 mb-1">
                        <img src="{{ post_image($post_image) }}" id="post_image_preview" class="img img_responsive" alt="Post Image Thumbnail" draggable="false">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-1">
                        <a id="post_image_trigger" data-input="post_image" data-preview="post_image_preview" class="btn btn-primary text-white btn-block">
                            {!! trans('forms.create-tag.buttons.choose-image') !!}
                        </a>
                    </div>
                    <div class="col-12 mt-2 mb-1">
                        <input type="text" id="post_image" class="form-control" name="post_image" placeholder="{{ trans('forms.create-tag.labels.tag-image-url') }}" value="{{ $post_image }}">
                    </div>
                </div>
                @if ($errors->has('post_image'))
                    <div class="row">
                        <div class="col-12">
                            <span class="help-block">
                                <strong>{{ $errors->first('post_image') }}</strong>
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('reverse_direction') ? ' has-error ' : '' }}">
            {!! Form::label('reverse_direction', trans('forms.create-tag.labels.reverse_direction'), ['class' => 'col-12 control-label']); !!}
            <div class="row">
                <div class="col-12 mb-1 ml-3">
                    <label class="radio-inline">
                        {!! Form::radio('reverse_direction', 0, !$reverse_direction) !!}
                        {!! trans('forms.create-tag.labels.sort-direction.normal') !!}
                    </label>
                    <br />
                    <label class="radio-inline">
                        {!! Form::radio('reverse_direction', 1, $reverse_direction) !!}
                        {!! trans('forms.create-tag.labels.sort-direction.reversed') !!}
                    </label>
                </div>
                @if ($errors->has('reverse_direction'))
                    <div class="row">
                        <div class="col-12 ml-3">
                            <span class="help-block">
                                <strong>{{ $errors->first('reverse_direction') }}</strong>
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
