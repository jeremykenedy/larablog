@extends('layouts.app')

@section('template_title'){{ trans('larablog.authors.title') }}@endsection
@section('template_description'){{ trans('larablog.authors.description') }}@endsection

@push('head')
@endpush

@section('content')

    @include('blog.partials.header', ['image' => $image, 'title' => trans('larablog.authors.title'), 'subtitle'  => trans('larablog.authors.subtitle') ])

    @include('blog.partials.messages')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-group mb-5">
                    @foreach ($authors as $author)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ url('/author/' . $author->author) }}">
                                {{ $author->author }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
