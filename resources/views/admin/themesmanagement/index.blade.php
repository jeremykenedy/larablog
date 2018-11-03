@extends('layouts.admin')

@section('template_title')
    Showing Themes
@endsection

@section('template_linked_css')
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.themesmanagement.partials.default-theme-form')
        </div>
        {{--
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <p class="float-left mt-2">
                            {{ trans('themes.themesTitle') }} <strong>{{ count($themes) }}</strong> {{ trans('themes.themes') }}
                        </p>
                    </div>
                    <div class="col-3">
                        <a href="/themes/create" class="btn btn-outline-primary btn-sm pull-right mb-2 mr-3">
                            <i class="fa fa-fw fa-plus" aria-hidden="true"></i>
                            <span class="hidden-xs hidden-sm">
                                {{ trans('themes.btnAddTheme') }}
                            </span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @include('admin.themesmanagement.partials.theme-table-list')
                    </div>
                </div>
            </div>
        --}}
    </div>

    {{--
    @include('modals.modal-delete')
    --}}

@endsection

@push('scripts')

    {{--
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    --}}

@endpush
