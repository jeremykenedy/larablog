<header class="masthead" style="background-image: url('{{ $image }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>
                        {!! $title !!}
                    </h1>
                    <span class="subheading">
                        {!! $subtitle !!}
                        @isset($tag)
                            @php
                                $postCount = $posts->count();
                            @endphp
                            <div class="mt-4">
                                <strong>
                                    {!! trans_choice('larablog.tags.totals', $postCount,['count' => $postCount, 'tag' => $tag->tag]) !!}
                                </strong>
                            <div>
                        @endisset
                        @isset($authors)
                            @php
                                $authorCount = $authors->count();
                            @endphp
                            <div class="mt-4">
                                <strong>
                                    {!! trans_choice('larablog.authors.totals', $authorCount,['count' => $authorCount]) !!}
                                </strong>
                            <div>
                        @endisset
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
