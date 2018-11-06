@extends('layouts.admin')

@section('template_title')
    {{ trans('themes.showHeadTitle') . ' ' . $theme->name }}
@endsection

@section('header_title')
    {!! trans('themes.header.show') !!}
@endsection

@section('template_linked_css')
@endsection

@php
    $themeStatus = [
        'name'  => trans('themes.statusDisabled'),
        'class' => 'danger'
    ];
    if($theme->status == 1) {
        $themeStatus = [
            'name'  => trans('themes.statusEnabled'),
            'class' => 'success'
        ];
    }
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('themes') }}" class="btn btn-sm pull-right">
                <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                <span class="hidden-xs">
                    {!! trans('themes.showBackBtn') !!}
                </span>
            </a>
            <h4 class="card-title">
                {!! trans('themes.showTitle') !!}
            </h4>
        </div>
        <hr>
        <div class="container">
            @include('admin.partials.messages')
        </div>
        <div class="card-body">
            <h3 class="text-center margin-bottom-2 lead">
                {{ $theme->name }}
            </h3>
            <ul class="list-group list-group-responsive theme-details-list margin-bottom-3">
                <li class="list-group-item">
                    <strong>{{ trans('themes.showStatus') }}</strong>
                    <span class="badge badge-{{ $themeStatus['class'] }}">
                        {{ $themeStatus['name'] }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>Id</strong> <span>{{ $theme->id }}</span>
                </li>
                @if($theme->link != null)
                    <li class="list-group-item">
                        <strong>{{ trans('themes.showLink') }}</strong> <span> <a href="{{$theme->link}}" target="_blank" data-toggle="tooltip" title="Go to Link">{{$theme->link}}</a></span>
                    </li>
                @endif
                @if($theme->notes != null)
                    <li class="list-group-item">
                        <strong>{{ trans('themes.showNotes') }}</strong> <span>{{ $theme->notes }}</span>
                    </li>
                @endif
                <li class="list-group-item">
                    <strong>{{ trans('themes.showAdded') }}</strong> <span>{{ $theme->created_at->format('D, M dS, Y H:ma') }}</span>
                </li>
                <li class="list-group-item">
                    <strong>{{ trans('themes.showUpdated') }}</strong> <span>{{ $theme->updated_at->format('D, M dS, Y H:ma') }}</span>
                </li>
            </ul>
        </div>
        <hr>
        <div class="card-footer">
            <div class="row pb-2">
                <div class="col-sm-6 mb-2">
                    <a href="{{ route('edittheme', $theme->id) }}" class="btn btn-small btn-info btn-block">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Edit<span class="hidden-sm"> this</span><span class="hidden-sm"> Theme</span>
                    </a>
                </div>
                {!! Form::open(['route' => ['destroytheme', $theme->id], 'class' => 'col-sm-6 mb-2']) !!}
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> Delete<span class="hidden-sm"> this</span><span class="hidden-sm"> Theme</span>', array('class' => 'btn btn-danger btn-block btn-flat','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('themes.confirmDeleteHdr'), 'data-message' => trans('themes.confirmDelete'))) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@include('admin.modals.delete-modal')

@push('scripts')
    @include('admin.scripts.delete-modal-script')
@endpush
