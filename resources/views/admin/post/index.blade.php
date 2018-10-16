@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.posts.pages.index.title') }}
@endsection

@section('template_description')
@endsection

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            {{ trans('admin.posts.table.title') }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="posts-table" class="table table-sm">
                                <thead class="text-primary">
                                    <th>
                                        {{ trans('admin.posts.table.titles.published') }}
                                    </th>
                                    <th>
                                        {{ trans('admin.posts.table.titles.title') }}
                                    </th>
                                    <th>
                                        {{ trans('admin.posts.table.titles.subtitle') }}
                                    </th>
                                    <th data-sortable="false">
                                        {{ trans('admin.posts.table.titles.actions') }}
                                    </th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
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
                                                <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                    {{ trans('admin.buttons.edit') }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/{{ $post->slug }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-eye"></i>
                                                    {{ trans('admin.buttons.view') }}
                                                </a>
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

@endsection

@push('scripts')
@endpush
