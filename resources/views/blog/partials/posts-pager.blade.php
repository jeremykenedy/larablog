<div class="clearfix"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto mt-4 mb-4">
            <div class="row">
                @if ($reverse_direction)
                    <div class="col-12 col-sm-5 col-md-4">
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary btn-block" href="{!! $posts->nextPageUrl() !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                {!! trans('larablog.pagination.nextPost') !!}
                            </a>
                        @endif
                    </div>
                    <div class="col-12 col-sm-2 col-md-4">
                        <div class="text-center block mt-2 mb-2">
                            @if($posts->count() > 0)
                                {{ $posts->currentPage() }} of <a href="{{ $posts->url($posts->lastItem()) }}">{{ $posts->count() }}</a>
                            @else
                                {!! trans('larablog.pagination.noposts') !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4">
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary btn-block" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                {!! trans('larablog.pagination.prevPost') !!}
                                <i class="fa fa-long-arrow-right fa-lg"></i>
                            </a>
                        @endif
                    </div>
                @else
                    <div class="col-12 col-sm-5 col-md-4">
                        @if ($posts->currentPage() > 1)
                            <a class="btn btn-primary btn-block" href="{!! $posts->url($posts->currentPage() - 1) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                {!! trans('larablog.pagination.prevPost') !!}
                            </a>
                        @endif
                    </div>
                    <div class="col-12 col-sm-2 col-md-4">
                        <div class="text-center block mt-2 mb-2">
                            @if($posts->count() > 0)
                                {{ $posts->currentPage() }} of <a href="{{ $posts->url($posts->lastItem()) }}">{{ $posts->count() }}</a>
                            @else
                                {!! trans('larablog.pagination.noposts') !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4">
                        @if ($posts->hasMorePages())
                            <a class="btn btn-primary btn-block" href="{!! $posts->nextPageUrl() !!}">
                                {!! trans('larablog.pagination.nextPost') !!}
                                <i class="fa fa-long-arrow-right fa-lg"></i>
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
