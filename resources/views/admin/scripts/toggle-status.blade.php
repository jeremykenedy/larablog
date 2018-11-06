<script>
    $(function(){
        $('.switch').click(function(){
            $(this).toggleClass('checked');
            $('input[name="status"]').not(':checked').prop("checked", true);
        });
    });
</script>
