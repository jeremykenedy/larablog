<div class="row">
    <div class="col-md-8">

        <div class="form-group has-feedback row {{ $errors->has('title') ? ' has-error ' : '' }}">
            {!! Form::label('title', trans('forms.edit-post.labels.post-title'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('title', $title, array('id' => 'title', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-title'))) !!}
            </div>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('subtitle') ? ' has-error ' : '' }}">
            {!! Form::label('subtitle', trans('forms.edit-post.labels.post-subtitle'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('subtitle', $subtitle, array('id' => 'subtitle', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-subtitle'))) !!}
            </div>
            @if ($errors->has('subtitle'))
                <span class="help-block">
                    <strong>{{ $errors->first('subtitle') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('subtitle') ? ' has-error ' : '' }}">
            {!! Form::label('post_image', trans('forms.edit-post.labels.post-post_image'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                <div class="row">
                    <div class="col-md-9 mb-4 mb-md-0">
                        <input type="text" class="form-control" name="post_image" id="post_image" onchange="handle_image_change()" value="{{ $post_image }}">
                    </div>
                    <div class="col-12 col-md-3 pull-right">
                        <img src="{{ post_image($post_image) }}" class="img img_responsive" id="page-image-preview" alt="Post Image Thumbnail">
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
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-4">

        <div class="form-group has-feedback row {{ $errors->has('publish_date') ? ' has-error ' : '' }}">
            {!! Form::label('publish_date', trans('forms.edit-post.labels.post-publish_date'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('publish_date', $publish_date, array('id' => 'publish_date', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-publish_date'))) !!}
            </div>
            @if ($errors->has('publish_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('publish_date') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('publish_time') ? ' has-error ' : '' }}">
            {!! Form::label('publish_time', trans('forms.edit-post.labels.post-publish_time'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::text('publish_time', $publish_time, array('id' => 'publish_time', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-publish_time'))) !!}
            </div>
            @if ($errors->has('publish_time'))
                <span class="help-block">
                    <strong>{{ $errors->first('publish_time') }}</strong>
                </span>
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
                {!! Form::text('layout', $layout, array('id' => 'layout', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-layout'))) !!}
            </div>
            @if ($errors->has('layout'))
                <span class="help-block">
                    <strong>{{ $errors->first('layout') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback row {{ $errors->has('meta_description') ? ' has-error ' : '' }}">
            {!! Form::label('meta_description', trans('forms.edit-post.labels.post-meta_description'), ['class' => 'col-12 control-label']); !!}
            <div class="col-12">
                {!! Form::textarea('meta_description', $meta_description, array('id' => 'meta_description', 'class' => 'form-control', 'placeholder' => trans('forms.edit-post.labels.post-meta_description'))) !!}
            </div>
            @if ($errors->has('meta_description'))
                <span class="help-block">
                    <strong>{{ $errors->first('meta_description') }}</strong>
                </span>
            @endif
        </div>

    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        function handle_image_change() {
            $("#page-image-preview").attr("src", function () {
                var value = $("#post_image").val();
                if ( ! value) {
                    value = {!! json_encode(config('blog.post_image')) !!};
                    if (value == null) {
                        value = '';
                    }
                }
                if (value.substr(0, 4) != 'http' && value.substr(0, 1) != '/') {
                    value = {!! json_encode(config('blog.uploads.webpath')) !!} + '/' + value;
                }
                return value;
            });
        }
    </script>
@endpush
