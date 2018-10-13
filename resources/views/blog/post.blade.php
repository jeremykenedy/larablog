@extends('layouts.app')

@section('template_title'){{ $post->title }}@endsection
@section('template_description'){{ $post->meta_description }}@endsection
@section('template_author'){{ $post->author }}@endsection

@section('content')

    <header class="masthead" style="background-image: url('{{ $post->page_image }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>
                            {{ $post->title }}
                        </h1>
                        <h2 class="subheading">
                            {{ $post->subtitle }}
                        </h2>
                        <span class="meta">
                            Posted by {{ $post->author }} on {{ $post->published_at }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $post->content_html !!}
                </div>
            </div>
        </div>
    </article>

    @if(config('blog.services.disqusKey'))
        @include('blog.partials.disqus')
    @endif

@endsection

@push('scripts')
    @if(config('blog.services.disqusKey'))
        @include('blog.partials.disqusjs')
    @endif
@endpush
