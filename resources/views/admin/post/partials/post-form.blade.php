<div class="row">
    <div class="col-md-8">

        <div class="form-group has-feedback row {{ $errors->has('title') ? ' has-error ' : '' }}">
            {!! Form::label('title', trans('forms.edit-post.labels.post-title'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('title', $title, array('id' => 'title', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-title'))) !!}
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
            {!! Form::label('subtitle', trans('forms.edit-post.labels.post-subtitle'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('subtitle', $subtitle, array('id' => 'subtitle', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-subtitle'))) !!}
            </div>
            @if ($errors->has('subtitle'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('subtitle') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
            {!! Form::label('slug', trans('forms.edit-post.labels.post-slug'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('slug', $slug, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-slug'))) !!}
            </div>
            @if ($errors->has('slug'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('post_image') ? ' has-error ' : '' }}">
            {!! Form::label('post_image', trans('forms.edit-post.labels.post-post_image'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <div class="row">
                    <div class="col-md-9 mb-4 mb-md-0">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <a id="post_image_trigger" data-input="post_image" data-preview="post_image_preview" class="btn btn-primary text-white btn-block">
                                    {!! trans('forms.edit-post.buttons.choose-image') !!}
                                </a>
                            </div>
                            <div class="col-12 mt-2 mb-1">
                                <input type="text" id="post_image" class="form-control" name="post_image" placeholder="{{ trans('forms.edit-post.labels.post-image-url') }}" value="{{ $post_image }}">
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
                    <div class="col-12 col-md-3 pull-right mb-3 mt-md-2">
                        <img src="{{ post_image($post_image) }}" id="post_image_preview" class="img img_responsive" alt="Post Image Thumbnail" draggable="false">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('content') ? ' has-error ' : '' }}">
            {!! Form::label('content', trans('forms.edit-post.labels.post-content'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::textarea('content', $content, array('id' => 'content', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-content'))) !!}
            </div>
            @if ($errors->has('content'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                </div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-4">

        <div class="form-group has-feedback row {{ $errors->has('publish_date') ? ' has-error ' : '' }}">
            {!! Form::label('publish_date', trans('forms.edit-post.labels.post-publish_date'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('publish_date', $publish_date, [
                    'id' => 'publish_date',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.edit-post.labels.post-publish_date'),
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => trans('tooltips.post.select-pub-date')
                ]) !!}
            </div>
            @if ($errors->has('publish_date'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('publish_date') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('publish_time') ? ' has-error ' : '' }}">
            {!! Form::label('publish_time', trans('forms.edit-post.labels.post-publish_time'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('publish_time', $publish_time, [
                    'id' => 'publish_time',
                    'class' => 'form-control',
                    'placeholder' => trans('forms.edit-post.labels.post-publish_time'),
                    'data-toggle' => 'tooltip',
                    'data-placement' => 'top',
                    'title' => trans('tooltips.post.select-pub-time')
                ]) !!}
            </div>
            @if ($errors->has('publish_time'))
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('publish_time') }}</strong>
                    </span>
                </div>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('is_draft') ? ' has-error ' : '' }}">
            <div class="col-md-8 col-md-offset-3">
                <div class="checkbox">
                    <input type="checkbox" name="is_draft" id="is_draft" {{ checked($is_draft) }}>
                    {!! Form::label('is_draft', trans('forms.edit-post.labels.post-is_draft'), ['class' => 'control-label']); !!}
                </div>
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('author') ? ' has-error ' : '' }}">
            {!! Form::label('author', trans('forms.edit-post.labels.post-author'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="author" id="author" class="form-control">
                    @foreach ($allAvailableAuthors as $availableAuthor)
                        <option @if ($availableAuthor == $author) selected @endif value="{{ $availableAuthor }}">
                            {{ $availableAuthor }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('tags') ? ' has-error ' : '' }}">
            {!! Form::label('tags', trans('forms.edit-post.labels.post-tags'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($allTags as $tag)
                        <option @if (in_array($tag, $tags)) selected @endif value="{{ $tag }}">
                            {{ $tag }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('layout') ? ' has-error ' : '' }}">
            {!! Form::label('layout', trans('forms.edit-post.labels.post-layout'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <select name="layout" id="layout" class="form-control">
                    @foreach ($postTemplates as $postTemplate)
                        <option @if ($postTemplate['path'] == $layout) selected @endif value="{{ $postTemplate['path'] }}">
                            {{ $postTemplate['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group has-feedback row {{ $errors->has('meta_description') ? ' has-error ' : '' }}">
            {!! Form::label('meta_description', trans('forms.edit-post.labels.post-meta_description'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::textarea('meta_description', $meta_description, array('id' => 'meta_description', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-meta_description'))) !!}
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
</div>

@push('scripts')
@endpush
