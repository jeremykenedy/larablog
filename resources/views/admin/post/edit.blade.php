@extends('layouts.admin')

@section('template_title')
@endsection

@section('template_description')
@endsection

@section('content')


    {{ $id }} <br /><br />
    {{ $title }} <br /><br />
    {{ $subtitle }} <br /><br />
    {{ $page_image }} <br /><br />
    {{ $content }} <br /><br />
    {{ $meta_description }} <br /><br />

    {{ $is_draft }} <br />

    {{ $publish_date }} <br />
    {{ $publish_time }} <br />
    {{ $layout }} <br />
    {{-- $tags --}}
    {{-- $allTags --}}

@endsection

@push('scripts')
@endpush
