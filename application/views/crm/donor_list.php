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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if ($this->session->has_userdata('msg')) {
                                        echo '<div class="alert alert-success">' . $this->session->userdata('msg') . '</div>';
                                        $this->session->unset_userdata('msg');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <br>
                                <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Date</th>


                                            <th>Assigned Employee</th>



                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>History</th> 
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($donor_list)) {
                                            foreach ($donor_list as $donor) {
                                                $employee = getRowById('webangel_admin', 'admin_id', $donor['user_id']);

                                        ?>
                                                <tr id="row<?= $donor['id'] ?>">
                                                    <td><?= $i ?> </td>
                                                    <td><?= convertDatedmy($donor['create_date']) ?></td>
                                                    <td><?= $employee[0]['admin_name'] ?></td>
                                                    <td><?= $donor['name'] ?></td>
                                                    <td><?= $donor['email'] ?></td>
                                                    <td><?= $donor['number'] ?></td>
                                                    <td><?= $donor['address'] ?></td>
                                                    <td> <span class="badge badge-<?= (($donor['status'] == 'NEW') ? 'info' : (($donor['status'] == 'Repeated Donor') ? 'success' : (($donor['status'] == 'Not Interested') ? 'danger' : (($donor['status'] == 'Followup') ? 'warning' : 'primary')))) ?>  text-uppercase">
                                                            <?= $donor['status'] ?>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <a class="badge badge-dark" href="<?= base_url('CrmDashboard/followup_list/' . $donor['id']) ?>">History </a>
                                                    </td>

                                                    <td><a class="badge badge-light" href="<?= base_url('CrmDashboard/update_donor/' . $donor['id']) ?>">Edit</a> </td>
                                                </tr>
                                        <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
    $(document).on('click', '#select_all', function() {
        $(".lead_checkbox").prop("checked", this.checked);
    });
    $(document).on('click', '.lead_checkbox', function() {
        if ($('.lead_checkbox:checked').length == $('.lead_checkbox').length) {
            $('#select_all').prop('checked', true);
        } else {
            $('#select_all').prop('checked', false);
        }

    });


    $('.employee').on('change', function() {
        var employee_id = $('.employee').val();
        alert(employee_id);
        var leads = [];
        $(".lead_checkbox:checked").each(function() {
            leads.push($(this).data('emp-id'));
            console.log(leads);
        });
        if (leads.length <= 0) {
            swal("Please select records.");
        } else {
            var rd = confirm("Are you Sure you want to Transfer Leads");
            if (rd) {
                $.ajax({
                    type: "POST",
                    url: "sift_leads",
                    cache: false,

                    data: {
                        leads_id: leads,
                        employee_id: employee_id
                    },
                    success: function(data) {
                        console.log(data);
                        alert("Leads are transferred");
                        location.reload();
                    }
                });

            }
        }

    });
    
</script>




</body>

</html>