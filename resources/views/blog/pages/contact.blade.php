@extends('layouts.app')

@section('template_title'){{ $pageTitle }}@endsection
@section('template_description'){{ $pageDesc }}@endsection

@push('head')
@endpush

@section('content')

    @include('blog.partials.header', ['image' => $image, 'title' => $title, 'subtitle'  => $subtitle])

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
                @include('blog.forms.contact-form')
            </div>
        </div>
    </div>

@endsection
