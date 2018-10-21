@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.posts.pages.index.title') }}
@endsection

@section('template_description')
    {{ trans('admin.posts.pages.index.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.posts.pages.index.header') }}
@endsection

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('posts.create') }}" class="btn btn-sm pull-right" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.post.create') !!}">
                        <i class="nc-icon nc-simple-add" aria-hidden="true"></i>
                        <span class="hidden-xs">
                            {{ trans('admin.buttons.create') }}
                        </span>
                    </a>
                    <h4 class="card-title">
                        {{ trans('admin.posts.table.title') }}
                    </h4>
                    <span class="badge badge-pill badge-primary">
                        {!! trans('admin.posts.pages.index.badge', ['per' => $posts->perPage(), 'total' => $posts->total()]) !!}
                    </span>
                </div>

                <hr>
                @include('admin.partials.messages')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="posts-table" class="table table-sm">
                            <thead class="text-primary">
                                <th>
                                    {{ trans('admin.posts.table.titles.id') }}
                                </th>
                                <th>
                                    {{ trans('admin.posts.table.titles.published') }}
                                </th>
                                <th>
                                    {{ trans('admin.posts.table.titles.title') }}
                                </th>
                                <th>
                                    {{ trans('admin.posts.table.titles.subtitle') }}
                                </th>
                                <th>
                                    {{ trans('admin.posts.table.titles.author') }}
                                </th>
                                <th data-sortable="false">
                                    {{ trans('admin.posts.table.titles.actions') }}
                                </th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->id }}
                                        </td>
                                        <td data-order="{{ $post->published_at->timestamp }}" class="data-style">
                                          {{ $post->published_at->format('M-j-y g:ia') }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ $post->subtitle }}
                                        </td>
                                        <td>
                                            <!-- <a href="{{ url('/admin/authors/' . $post->author) }}" > -->
                                                {{ $post->author }}
                                            <!-- </a> -->
                                        </td>
                                        <td>
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm btn-block btn-info" data-toggle="tooltip" data-placement="top" title="{!! trans('tooltips.post.edit') !!}">
                                                <i class="fa fa-edit fa-fw"></i>
                                                <span class="hidden-xs hidden-sm hidden-md">
                                                    {{ trans('admin.buttons.edit') }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/{{ $post->slug }}" class="btn btn-sm btn-block btn-warning" data-toggle="tooltip" data-placement="top" title="{!! trans('tooltips.post.view') !!}">
                                                <i class="fa fa-eye fa-fw"></i>
                                                <span class="hidden-xs hidden-sm hidden-md">
                                                    {{ trans('admin.buttons.view') }}
                                                </span>
                                            </a>
                                        </td>
                                        <td>
                                            <span data-toggle="tooltip" data-placement="top" title="{!! trans('tooltips.post.delete') !!}">
                                                <button type="button" class="btn btn-danger btn-sm btn-block delete-post-trigger" data-toggle="modal" data-target="#modal_delete" data-postid="{{ $post->id }}">
                                                    <i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>
                                                    <span class="hidden-xs hidden-sm hidden-md">
                                                        {{ trans('admin.buttons.delete') }}
                                                    </span>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix mb-2"></div>
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
</div>

@include('admin.modals.delete-post-modal-form', ['postId' => null])

@endsection

@push('scripts')
    <script type="text/javascript">
        $('.delete-post-trigger').click(function(event) {
            var postId = $(this).data("postid");
            $('#modal_delete').on('show.bs.modal', function (e) {
                document.delete_post_form.action = "{{ url('/') }}" + "/admin/posts/" + postId;
            });
        });
    </script>
@endpush
