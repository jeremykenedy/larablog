<div class="table-responsive themes-table">
    <table class="table table-striped table-sm data-table">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>{!! trans('themes.themesStatus') !!}</th>
                <th>{!! trans('themes.themesName') !!}</th>
                <th class="hidden-xs hidden-sm hidden-md">{!! trans('themes.themesLink') !!}</th>
                <th>{!! trans('themes.themesActions') !!}</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($themes as $key => $value)
                @php
                    $themeStatus = [
                        'name'  => trans('themes.statusDisabled'),
                        'class' => 'danger'
                    ];
                    if($value->status == 1) {
                        $themeStatus = [
                            'name'  => trans('themes.statusEnabled'),
                            'class' => 'success'
                        ];
                    }
                @endphp
                <tr>
                    {{-- <td>{!! $value->id !!}</td> --}}
                    <td>
                        <span class="badge badge-pill badge-{{ $themeStatus['class'] }}">
                            {!! $themeStatus['name'] !!}
                        </span>
                    </td>
                    <td>{!! $value->name !!}</td>
                    <td class="hidden-xs hidden-sm hidden-md">
                        <a href="{!! $value->link !!}" target="_blank" data-toggle="tooltip" title="Go to Link">
                            {!! $value->link !!}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-success btn-block" href="{{ route('showtheme', $value->id) }}" data-toggle="tooltip" title="{{ trans('themes.themesBtnShow') }}">
                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                            <span class="sr-only">{!! trans('themes.themesBtnShow') !!}</span>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-info btn-block" href="{{ route('edittheme', $value->id) }}" data-toggle="tooltip" title="{{ trans('themes.themesBtnEdit') }}">
                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            <span class="sr-only">{!! trans('themes.themesBtnEdit') !!}</span>
                        </a>
                    </td>
                    <td>
                        {!! Form::open(array('route' => ['destroytheme', $value->id], 'class' => 'delete-theme-form', 'data-toggle' => 'tooltip', 'title' => 'Delete Theme')) !!}
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="sr-only">Delete Theme</span>', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('themes.confirmDeleteHdr'), 'data-message' => trans('themes.confirmDelete'))) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.modals.delete-modal')

@push('scripts')
    @include('admin.scripts.delete-modal-script')
@endpush
