<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/mandatory.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/core.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/build/scripts/vendor.js"></script>
<!-- <script type="text/javascript" src="<?= base_url() ?>assets/app/datatable/basic/base.js"></script> -->
<script type="text/javascript" src="<?= base_url() ?>assets/app/home.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/app/custom.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/app/editor/basic.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/app/form/select2.js"></script>

<script type="text/javascript" src="<?= base_url() ?>assets/app/datatable/extension/buttons.js"></script>
<script>
    
    $('.edit').click(function() {
        var dataid = $(this).data('id'); 
        var datatable = $(this).data('tab');
        $.ajax({
            method: "POST",
            url: "<?= base_url() ?>Ajax/geteditdata",
            data: {
                dataid: dataid,
                datatable:datatable
            },
            success: function(response) {
                console.log(response); 
            }
        });
    });

    window.setTimeout(function() {
         $(".alert").fadeTo(200, 0).slideUp(200, function() {
             $(this).remove();
         });
     }, 4000);



</script>