@extends('layouts.admin')

@section('template_title')
@endsection

@section('template_description')
@endsection

@section('content')

    <table id="posts-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>
                    Published
                </th>
                <th>
                    Title
                </th>
                <th>
                    Subtitle
                </th>
                <th data-sortable="false">
                    Actions
                </th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td data-order="{{ $post->published_at->timestamp }}">
                      {{ $post->published_at->format('j-M-y g:ia') }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->subtitle }}
                    </td>
                    <td>
                        <a href="/admin/post/{{ $post->id }}/edit" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>
                        <a href="/{{ $post->slug }}" class="btn btn-xs btn-warning">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@push('scripts')
    <!--
    <script>
        $(function() {
            $("#posts-table").DataTable({
                order: [[0, "desc"]]
            });
        });
    </script>
    -->
@endpush
