@extends('layouts.app')

@section('template_title'){{ trans('larablog.author.title', ['author' => $author]) }}@endsection
@section('template_description'){{ trans('larablog.author.description', ['author' => $author]) }}@endsection

@push('head')
@endpush

@section('content')

    @include('blog.partials.header', ['image' => $image, 'title' => $author, 'subtitle'  => trans_choice('larablog.author.subtitle', $posts->count(),['postcount' => $posts->count()]) ])
    @include('blog.partials.posts-roll', ['blogposts' => $posts])

@endsection
