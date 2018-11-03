{!! Form::open(['method' => 'PATCH', 'route' => 'update-blog-theme',  'class' => '', 'id' => 'update_theme_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="POST">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <div class="form-group has-feedback row {{ $errors->has('currentTheme') ? ' has-error ' : '' }}">
        {!! Form::label('currentTheme', trans('themes.default.label'), ['class' => 'col-12 control-label']); !!}
        <div class="col-12">
            <select name="currentTheme" id="currentTheme" class="form-control">
                @foreach ($themes as $theme)
                    <option @if ($theme == $currentTheme) selected @endif value="{{ $theme->id }}">
                        {{ $theme->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('currentTheme'))
            <div class="row">
                <div class="col-12">
                    <span class="help-block">
                        <strong>{{ $errors->first('currentTheme') }}</strong>
                    </span>
                </div>
            </div>
        @endif
    </div>
{!! Form::close() !!}

@push('scripts')

<script type="text/javascript">

    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        document.getElementById('currentTheme').onchange = function(){
            var elem = (typeof this.selectedIndex === "undefined" ? window.event.srcElement : this);
            var value = elem.value || elem.options[elem.selectedIndex].value;
            processThemeChange(value);
        };

        function processThemeChange(themeId) {

            var notificaton = $.notify({
                icon: "nc-icon nc-refresh-69 spin",
                message: "{!! trans('themes.theme_updating') !!}"
            }, {
                allow_dismiss: false,
                type: 'primary',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                showProgressbar: true
            });

            notificaton.update('progress', 50);

            $.ajax({
                type:'POST',
                url: "{{ route('update-blog-theme') }}",
                data: $('#update_theme_form').serialize(),
                success: function (response) {
                    notificaton.update({
                        'icon': "nc-icon nc-check-2",
                        'type': 'success',
                        'message': response.message,
                        'progress': 100,
                    });
                },
                error: function (response, status, error) {
                    notificaton.update({
                        'icon': "nc-icon nc-simple-remove",
                        'type': 'danger',
                        'message': error,
                        'progress': 100,
                    });
                },
            });
        }
    });
</script>

@endpush
