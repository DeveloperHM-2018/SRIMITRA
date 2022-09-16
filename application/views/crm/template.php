<?php include('includes/header.php'); ?>
<div class="holder">
    <?php include('includes/menu.php'); ?>
    <div class="wrapper">
        <?php include('includes/top-header.php'); ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 row">
                        <div class="col-md-4">
                            <div class="portlet">
                                <div class="portlet-header portlet-header-bordered">
                                    <h3 class="portlet-title">
                                        <?= $title ?>
                                    </h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if ($this->session->has_userdata('msg')) {
                                            echo $this->session->userdata('msg');
                                            $this->session->unset_userdata('msg');
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="portlet-body"><br>
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <div>
                                                <label>Mode - </label>

                                                <?php
                                                $mode = getAllRow('tbl_send_mode');
                                                foreach ($mode as $mode_row) {
                                                    echo '<input type="radio" name="send_mode" value="' . $mode_row['id'] . '" > ' . $mode_row['name'] . '  ';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Template</span></div><textarea class="form-control" name="template"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Template code</span></div><input type="text" class="form-control" name="template_code" value="" placeholder="">
                                            </div>
                                        </div>



                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                        <div class="portlet">
                            <div class="portlet-body"><br>
                                <table id="datatable-1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Date</th>
                                            <th>Mode</th>
                                            <th>Template</th>
                                            <th>Template Code</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        if (!empty($template)) {
                                            foreach ($template as $tem_row) {
                                                $mode = getRowById('tbl_send_mode', 'id', $tem_row['send_mode']);
                                        ?>
                                                <tr id="row<?= $tem_row['id'] ?>">
                                                    <td><?= $i ?> </td>
                                                    <td><?= convertDatedmy($tem_row['create_date']) ?></td>
                                                    <td><?= $mode[0]['name'] ?></td>
                                                    <td><?= $tem_row['template'] ?></td>
                                                    <td><?= $tem_row['template_code'] ?></td>

                                                    <td><a class="badge badge-light" href="#">Delete</a> </td>
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
        </div>
        <?php include('includes/web-footer.php'); ?>
    </div>
</div>
<?php include('includes/footer.php') ?>
<?php include('includes/footer-link.php'); ?>
</body>

</html>