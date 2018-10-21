<script type="text/javascript">
    $(function() {
        CKEDITOR.replace( 'content' );
        $("#publish_date").pickadate({
            format: "mmm-d-yyyy"
        });
        $("#publish_time").pickatime({
            format: "h:i A"
        });
        $("#tags").selectize({
            create: true
        });
        $('.loading').hide();
        $('.blog-post-form').fadeIn(100);
    });
</script>
