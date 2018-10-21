<script type="text/javascript">
    $(function() {
        $('#modal_save').on('show.bs.modal', function (e) {
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        $('#modal_save').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });
    });
</script>
