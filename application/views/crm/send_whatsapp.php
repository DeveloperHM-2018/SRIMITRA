<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="portlet">
                            <div class="portlet-header portlet-header-bordered">
                                <h3 class="portlet-title"><?= $title ?></h3>
                                <button id="checked" class="badge badge-primary">Check All</button>
                                <button id="unchecked" class="badge badge-danger ml-2">Uncheck All</button>
                            </div>
                            <div class="row">
                                <div class="col-md-12 p-2 ">
                                    <?php
                                    if ($this->session->has_userdata('msg')) {
                                        echo '<p class="badge badge-info badge-lg">'.$this->session->userdata('msg').'</p>';
                                        $this->session->unset_userdata('msg');
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="portlet-body">

                                <form method="post" action="">
                                    <div class="form-group">
                                        <br>
                                        <div>
                                            <label>Send </label> -
                                            <input type="radio" class="mode" name="mode" value="1" selected /> Whatsapp
                                            <input type="radio" class="mode" name="mode" value="2" /> Email
                                            <input type="radio" class="mode" name="mode" value="3" /> Text
                                        </div>
                                        <div>
                                            <label>Templates </label> -
                                            <div id="templ"></div>
                                            <hr>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">Message</span></div>
                                            <textarea class="form-control" name="message" rows="5" id="message"></textarea>
                                        </div>
                                        <br>
                                        <div class="input-group col-md-5">
                                            <div class="input-group-prepend"><span class="input-group-text">Filter by status</span></div>
                                            <select name="status" class="form-control"  id="status">
                                                <option value="All">All</option>
                                                <option value="NEW">New</option>
                                                <option value="Repeated Donor">Repeated Donor</option>
                                                <option value="Not Interested">Not Interested</option>
                                                <option value="Followup">Followup</option>
                                                <option value="Reference">Reference</option>
                                            </select> 
                                            <span id="getrecord" class="badge badge-info ml-1">Get record</span>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Select</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody id="records">
                                            
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>
<script>
    $('#checked').click(function() {

        $('.check').prop('checked', true);
    });
    $('#unchecked').click(function() {
        $('.check').prop('checked', false);
    });
    $('.mode').change(function() {
        var mode = $('input[name="mode"]:checked').val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('Ajax/get_template') ?>",
            data: {
                mode: mode
            },
            success: function(response) {
                $('#templ').html(response);
            }
        });
    });

    $(document).on('change', '.templates', function() {
        // $('.templates').change(function() {
        var tem = $('input[name="templates"]:checked').val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('Ajax/get_full_template') ?>",
            data: {
                tem: tem
            },
            success: function(response) {
                $('#message').val(response);
            }
        });
    });
    $(document).on('click', '#getrecord', function() {
        var status = $('#status').val();
        $.ajax({
            method: "POST",
            url: "<?= base_url('Ajax/get_donor_by_status') ?>",
            data: {
                status: status
            },
            success: function(response) {
                $('#records').html(response);
            }
        });
    });
    
</script>
</body>

</html>