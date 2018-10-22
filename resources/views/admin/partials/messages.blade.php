@if(session()->has('errors'))
    <div class="container-fluid">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove" aria-hidden="true"></i>
            </button>
            <h6>
                <i class="nc-icon nc-alert-circle-i mr-1" aria-hidden="true"></i>
                {!! trans('messages.errors.list-title') !!}
            </h6>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="container-fluid">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove" aria-hidden="true"></i>
            </button>
            <h6>
                <i class="nc-icon nc-alert-circle-i mr-1" aria-hidden="true"></i>
                {!! trans('messages.errors.single-title') !!}
            </h6>
            <p>
                {!! session('error') !!}
            </p>
        </div>
    </div>
@endif

@if(session()->has('success'))
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove" aria-hidden="true"></i>
            </button>
            <h6>
                <i class="nc-icon nc-check-2 mr-1" aria-hidden="true"></i>
                {!! trans('messages.success.single-title') !!}
            </h6>
            <p>
                {!! session('success') !!}
            </p>
        </div>
    </div>
@endif
