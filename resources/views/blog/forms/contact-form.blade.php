@php
$submitClasses = 'col-sm-6 offset-sm-6 col-md-4 offset-md-8';
if(config('blog.services.reCaptchStatus')) {
    $submitClasses = 'col-md-5 col-lg-4';
}
@endphp

@include('blog.partials.messages')

{!! Form::open(['method' => 'POST', 'route' => 'contactSend',  'class' => 'contact-form', 'id' => 'contact_form', 'role' => 'form', 'enctype' => 'multipart/form-data' ]) !!}
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <meta name="_token" content="{!! csrf_token() !!}" />

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('firstname', trans('forms.contact.labels.firstname')); !!}
                    {!! Form::text('firstname', null, array('id' => 'firstname', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.firstname'), 'required' => false, 'data-error' => ($errors->has('firstname') ? $errors->first('firstname') : ''))) !!}
                    @if ($errors->has('firstname'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('lastname', trans('forms.contact.labels.lastname')); !!}
                    {!! Form::text('lastname', null, array('id' => 'lastname', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.lastname'), 'required' => false, 'data-error' => ($errors->has('lastname') ? $errors->first('lastname') : ''))) !!}
                    @if ($errors->has('lastname'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email', trans('forms.contact.labels.email')); !!}
                    {!! Form::email('email', null, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.email'), 'required' => false, 'data-error' => ($errors->has('email') ? $errors->first('email') : ''))) !!}
                    @if ($errors->has('email'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('email') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('phone', trans('forms.contact.labels.phone')); !!}
                    {!! Form::tel('phone', null, array('id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('forms.contact.placeholders.phone'), 'required' => false, 'data-error' => ($errors->has('phone') ? $errors->first('phone') : ''))) !!}
                    @if ($errors->has('phone'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('phone') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    {!! Form::label('message', trans('forms.contact.labels.message')); !!}
                    {!! Form::textarea('message', null, array('id' => 'message', 'class' => 'form-control', 'rows' => 4, 'placeholder' => trans('forms.contact.placeholders.message'), 'required' => false, 'data-error' => ($errors->has('message') ? $errors->first('message') : ''))) !!}
                    @if ($errors->has('message'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('message') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            @if(config('blog.services.reCaptchStatus'))
                <div class="col-12 col-md-7 col-lg-8 mb-2 mb-md-0">
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{ config('blog.services.reCaptchSite') }}"></div>
                    </div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block with-errors">
                            <small>
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </small>
                        </span>
                    @endif
                </div>
            @endif
            <div class="col-12 {{ $submitClasses }}">
                {!! Form::button(trans('forms.contact.buttons.send'), ['class' => 'btn btn-success btn-send btn-block','type' => 'submit', 'name' => 'action', 'value' => trans('forms.contact.buttons.send')]) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    {!! trans('forms.contact.messages.required') !!}
                </p>
            </div>
        </div>
    </div>
{!! Form::close() !!}

@push('scripts')
    @if(config('blog.services.reCaptchStatus'))
        <script src="{{ config('blog.services.reCaptchCDN') }}"></script>
    @endif
@endpush
