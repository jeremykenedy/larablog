@extends('layouts.admin')

@section('template_title')
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
                            Posts
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="posts-table" class="table table-sm">
                                <thead class="text-primary">
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
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td data-order="{{ $post->published_at->timestamp }}">
                                              {{ $post->published_at->format('M-j-y g:ia') }}
                                            </td>
                                            <td>
                                                {{ $post->title }}
                                            </td>
                                            <td>
                                                {{ $post->subtitle }}
                                            </td>
                                            <td>
                                                <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-xs btn-info">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
