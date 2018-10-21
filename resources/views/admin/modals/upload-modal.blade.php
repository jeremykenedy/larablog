<div class="modal fade" id="uploadModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="nc-icon nc-cloud-upload-94 mr-1 text-white"></i>
                    {{ trans('laravel-filemanager::lfm.title-upload') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">
                        {!! trans('admin.modals.save-post.close') !!}
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('unisharp.lfm.upload') }}" role='form' id='uploadForm' name='uploadForm' method='post' enctype='multipart/form-data' class="dropzone">
                    <div class="form-group mt-4" id="attachment">
                        <div class="controls text-center">
                            <div class="input-group" style="width: 100%">
                                <a class="btn btn-primary center-block" id="upload-button">
                                    {!! trans('laravel-filemanager::lfm.message-choose') !!}
                                </a>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' name='working_dir' id='working_dir'>
                    <input type='hidden' name='type' id='type' value='{{ request("type") }}'>
                    <input type='hidden' name='_token' value='{{csrf_token()}}'>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-fw fa-close" aria-hidden="true"></i>
                    {{ trans('laravel-filemanager::lfm.btn-close') }}
                </button>
            </div>
        </div>
    </div>
</div>
