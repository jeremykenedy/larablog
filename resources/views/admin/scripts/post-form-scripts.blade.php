<script type="text/javascript">
    $(function() {
        // Image Uploader
        $('#post_image_trigger').filemanager('image');

        // CKEditor RTE
        CKEDITOR.replace('content', CKEDITOR_OPTIONS);

        // Date Picker
        $("#publish_date").pickadate({
            format: "mmm-d-yyyy"
        });

        // Time Picker
        $("#publish_time").pickatime({
            format: "h:i A"
        });

        // Tags
        $("#tags").selectize({
            create: true
        });

        $('.loading').hide();
        $('.blog-post-form').fadeIn(100);
    });
</script>
