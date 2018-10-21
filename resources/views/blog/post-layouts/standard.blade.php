@extends('layouts.app')

@section('template_title'){{ $post->title }}@endsection
@section('template_description'){{ $post->meta_description }}@endsection
@section('template_author'){{ $post->author }}@endsection

@section('content')

    @include('blog.partials.header-post', ['image' => $post->post_image, 'title' => $post->title, 'subtitle'  => $post->subtitle, 'meta' => trans('larablog.blogroll.postedBy', ['author' => $post->author, 'url' => url('/author/' . $post->author), 'date' => $post->published_at]) ])

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto mb-4">
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
