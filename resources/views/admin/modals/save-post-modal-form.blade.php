<div class="modal fade modal-success" id="modal_save" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="fa fa-check fa-fw mr-1 text-white"></i>
                    {!! trans('admin.modals.save-post.title') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">
                        {!! trans('admin.modals.save-post.close') !!}
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    {!! trans('admin.modals.save-post.message') !!}
                </p>
            </div>
            <div class="modal-footer">
                {!! Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i> ' . trans('admin.modals.save-post.cancel'), [
                    'class' => 'btn btn-secondary pull-left',
                    'type' => 'button',
                    'data-dismiss' => 'modal'
                ]) !!}

                {!! Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('admin.modals.save-post.confirm'), [
                    'class' => 'btn btn-success pull-right',
                    'type'  => 'submit',
                    'name'  => 'action',
                    'value' => 'continue',
                    'id'    => 'confirm'
                ]) !!}
            </div>
        </div>
    </div>
</div>
