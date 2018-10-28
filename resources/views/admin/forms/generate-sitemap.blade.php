{!! Form::open(['method' => 'POST', 'route' => 'generate-sitemap',  'class' => 'blog-post-form', 'id' => 'generate_sitemap_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <meta name="_token" content="{!! csrf_token() !!}" />

    <div class="row mb-3">
        <div class="col-12 col-sm-3">
            {!! Form::number('limit', null, array('id' => 'limit', 'class' => 'form-control', 'placeholder' => trans('forms.sitemap.placeholders.limit'), 'required' => false, 'data-error' => ($errors->has('limit') ? $errors->first('limit') : ''))) !!}

        </div>

        <div class="col-12 col-sm-5">
            {!! Form::button(trans('forms.sitemap.buttons.generate'), ['class' => 'btn btn-block btn-success mt-sm-0','type' => 'submit', 'name' => 'submit']) !!}
        </div>

        <div class="col-12 col-sm-4">
            <a href="{{ url('sitemap.xml') }}" class="btn btn-block btn-info mt-sm-0">
                {!! trans('forms.sitemap.buttons.view') !!}
            </a>
        </div>
    </div>

{!! Form::close() !!}
