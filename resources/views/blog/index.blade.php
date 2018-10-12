@extends('layouts.app')

@section('template_title'){!! trans('larablog.home.title') !!}@endsection
@section('template_description'){!! trans('larablog.home.description') !!}@endsection

@section('content')
    @include('blog.partials.header', ['image' => $post_image, 'title' => $title, 'subtitle'  => $subtitle ])
    @include('blog.partials.posts-roll', ['blogposts' => $posts])
    @include('blog.partials.posts-pager')
@endsection
