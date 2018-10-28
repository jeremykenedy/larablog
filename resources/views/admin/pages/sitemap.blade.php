@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.sitemap.title') }}
@endsection

@section('template_description')
@endsection

@section('header_title')
    {{ trans('admin.sitemap.header') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">
                    {!! trans('admin.sitemap.card-title') !!}
                </h5>
                <p class="card-category">
                    {!! trans('admin.sitemap.card-sub-title', ['count' => $sitemap->count()]) !!}
                </p>
            </div>
            <hr>
            <div class="card-body pt-0 mt-0">
                @include('admin.partials.messages')
                @include('admin.forms.generate-sitemap')
                <h5>
                    {!! trans('admin.sitemap.preview') !!}
                </h5>
                <div class="row">
                    <div class="col-12">
                        <div class="bg-dark p-1 rounded">
                            <code>
                                <pre lang="xml" class="text-light">
&lt;urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml"&gt;
@foreach($sitemap as $sitemapLine)
    &lt;url&gt;
        &lt;loc&gt;{!! $sitemapLine->loc !!} &lt;/loc&gt;
        &lt;lastmod&gt;{!! $sitemapLine->lastmod !!}&lt;/lastmod&gt;
        &lt;changefreq&gt;{!! $sitemapLine->changefreq !!} &lt;/changefreq&gt;
        &lt;priority&gt;{!! $sitemapLine->priority !!} &lt;/priority&gt;
    &lt;/url&gt;
@endforeach
&lt;/urlset&gt;
                               </pre>
                            </code>
                        </div>
                    </div>
                </div>
            </div>

            @if(trans('admin.sitemap.footer') && $modified)
                <hr>
                <div class="card-footer">
                    <p class="stats text-muted">
                        {!! trans('admin.sitemap.footer', ['date' => $modified]) !!}
                    </p>
                </div>
            @endif

        </div>
    </div>
</div>

@endsection
