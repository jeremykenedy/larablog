@extends('layouts.admin')

@section('template_title')
    {{ trans('admin.tags.pages.index.title') }}
@endsection

@section('template_description')
    {{ trans('admin.tags.pages.index.desc') }}
@endsection

@section('header_title')
    {{ trans('admin.tags.pages.index.header') }}
@endsection

@push('head')
@endpush

@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('createtag') }}" class="btn btn-sm pull-right" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.post.create') !!}">
                        <i class="nc-icon nc-simple-add" aria-hidden="true"></i>
                        <span class="hidden-xs">
                            {{ trans('admin.buttons.create-tag') }}
                        </span>
                    </a>
                    <h4 class="card-title">
                        {{ trans('admin.tags.table.title') }}
                    </h4>
                    <span class="badge badge-pill badge-primary pull-left">
                        {!! trans('admin.tags.pages.index.badge', ['per' => '', 'total' => $tags->count()]) !!}
                    </span>
                </div>

                @include('admin.partials.messages')

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tags_table" class="table table-sm">
                            <thead class="text-primary">
                                <th>
                                    {{ trans('admin.tags.table.titles.id') }}
                                </th>
                                <th>
                                    {{ trans('admin.tags.table.titles.tag') }}
                                </th>
                                <th>
                                    {{ trans('admin.tags.table.titles.title') }}
                                </th>
                                <th class="hidden-sm">
                                    {{ trans('admin.tags.table.titles.subtitle') }}
                                </th>
                                <th class="hidden-md">
                                    {{ trans('admin.tags.table.titles.post_image') }}
                                </th>
                                <th class="hidden-md">
                                    {{ trans('admin.tags.table.titles.layout') }}
                                </th>
                                <th class="hidden-md">
                                    {{ trans('admin.tags.table.titles.meta_description') }}
                                </th>
                                <th class="hidden-sm">
                                    {{ trans('admin.tags.table.titles.direction') }}
                                </th>
                                <th data-sortable="false">
                                    {{ trans('admin.tags.table.titles.actions') }}
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class="data-style">
                                            {{ $tag->id }}
                                        </td>
                                        <td>
                                            {{ $tag->tag }}
                                        </td>
                                        <td>
                                            {{ $tag->title }}
                                        </td>
                                        <td class="hidden-sm">
                                            {{ $tag->subtitle }}
                                        </td>
                                        <td class="hidden-md data-style">
                                            <img src="{{ $tag->post_image }}" alt="{{ $tag->title }} Image" class="img-thumbnail" draggable="false">
                                        </td>
                                        <td class="hidden-md data-style">
                                            <span class="badge badge-light">
                                                {{ $tag->layout }}
                                            </span>
                                        </td>
                                        <td class="hidden-md">
                                            {{ $tag->meta_description }}
                                        </td>
                                        <td class="hidden-sm data-style">
                                            @if ($tag->reverse_direction)
                                                <span class="badge badge-pill badge-info">
                                                    {{ trans('admin.tags.table.titles.directions.reverse') }}
                                                </span>
                                            @else
                                                <span class="badge badge-pill badge-primary">
                                                    {{ trans('admin.tags.table.titles.directions.normal') }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/admin/tag/{{ $tag->id }}/edit" class="btn btn-sm btn-info">
                                                <i class="fa fa-edit fa-fw" aria-hidden="true"></i>
                                                {!! trans('admin.buttons.edit-tag') !!}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix mb-2"></div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(function() {
            $("#tags_table").DataTable({});
        });
    </script>
@endpush
