<script src="<?= base_url() ?>assets/js/vendor/jquery-3.5.0.min.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.odometer.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.accrue.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.appear.js"></script>
<script src="<?= base_url() ?>assets/js/jarallax.min.js"></script>
<script src="<?= base_url() ?>assets/js/slick.min.js"></script>
<script src="<?= base_url() ?>assets/js/ajax-form.js"></script>
<script src="<?= base_url() ?>assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/js/aos.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(200, 0).slideUp(200, function() {
            $(this).remove();
        });
    }, 4000);
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#mitralogin', function() {
            // console.log('asd');
            $('#myModal').modal('show');
            $('#savecart').hide();
        });
        $(document).on('click', '#requestlogin', function() {
            // console.log('asd');
            $('#myModal').modal('show');
            $('#savecart').show();
        });
        $(document).on('click', '.inc', function() {
            // $(".inc").click(function() {
            var id = $(this).data('timeid');
            var x = $("#amt" + id).val();
            $("#amt" + id).val(++x);
        });

        $(document).on('click', '.dec', function() {
            // $(".dec").click(function() {
            var id = $(this).data('timeid');
            var x = $("#amt" + id).val();
            $("#amt" + id).val(--x);
        });

        $("#regbutton").click(function() {
            $("#REGModal").modal('show');
            $('#myModal').modal('hide');

        });
        $("#regbutton2").click(function() {
            $("#REGModal").modal('show');
            $('#myModal').modal('hide');

        });

        $(document).on('click', '#loginbutton', function() {
            // $("#loginbutton").click(function() {
            $("#REGModal").modal('hide');
            $('#myModal').modal('show');

        });

        $(document).on('click', '.removeCarthm', function() {
            var pid = $(this).data('id');
            console.log(pid);
            $.ajax({
                method: "POST",
                url: "<?= base_url('Index/delete_item') ?>",
                data: {
                    pid: pid
                },
                success: function(response) {

                    $('.cartrow' + pid).hide();
                    alert('Item removed');
                    load_product();



                }
            });
        });

        $('.savecart').click(function() {
            var product_id = $(this).data('or_id');
            var cchid = $(this).data('cchid');
            var order_type = $(this).data('order_type');
            if (order_type == 0) {
                var quantity = $('#amt' + product_id).val();
            } else {
                var quantity = $('#amts' + product_id).val();
            }

            $.ajax({
                method: "POST",
                url: "<?= base_url('Index/addToCart') ?>",
                data: {
                    product_id: product_id,
                    qty: quantity,
                    order_type: order_type,
                    cchid: cchid
                },
                success: function(response) {
                    if (confirm('Continue to checkout ??')) {
                        window.location = "<?= base_url('Index/cart') ?>";
                    } else {
                        // window.location = "<?= base_url('Index/checkoutpay') ?>";
                        alert('Added to contribution list');
                    }

                }
            });

        });

        $(document).on('click', '.saveincart', function() {
            // $('.saveincart').click(function() {
            var rid = $(this).data('rid');
            var orid = $(this).data('rorpahneid');
            var orphane_request = $(this).data('or_id');
            var order_type = $(this).data('order_type');
            $.ajax({
                method: "POST",
                url: "<?= base_url('Index/addInToCart') ?>",
                data: {
                    rid: rid,
                    orid: orid,
                    ortid: orphane_request,
                    order_type: order_type
                },
                success: function(response) {
                    console.log(response);
                    window.location = "<?= base_url('Index/cart') ?>";
                }
            });
        });


        $(document).on('click', '.qty', function() {
            var rowid = $(this).data('rowid');
            var type = $(this).data('type');
            var qty = $('#qtysidecart' + rowid).val();
            $.ajax({
                method: "POST",
                url: "<?= base_url('Index/update_qty') ?>",
                data: {
                    rowid: rowid,
                    qty: qty
                },
                success: function(response) {
                    //  console.log(response);
                    load_product();
                }
            });
        });

        $(document).on('click', '#directorder', function() {
            // $('#directorder').click(function() {
            var user = '';
            var name = $('#direct_name').val();
            var number = $('#direct_number').val();
            var email = $('#direct_email').val();
            var rid = $('#order_request_id').val();
            var orid = $('#cchlist').val();
            if (name == '' || number == '' || email == '' || rid == '' || orid == '') {
                if (name == '') {
                    console.log('Name is reqiured');
                }
                if (number == '') {
                    console.log('Number is reqiured');
                }
                if (email == '') {
                    console.log('Email is reqiured');
                }
                if (rid == '') {
                    console.log('Select order to proceed');
                }
                if (orid == '') {
                    console.log('Select Child care home  for which you want to Contribute');
                }
            } else {
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Index/check_user') ?>",
                    data: {
                        name: name,
                        number: number,
                        email: email
                    },
                    success: function(response) {
                        user = response;
                    }
                });
                var order_type = '1';
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Index/addInToCart') ?>",
                    data: {
                        rid: rid,
                        orid: orid,
                        ortid: rid,
                        order_type: order_type
                    },
                    success: function(response) {
                        console.log(response);
                        window.location = "<?= base_url('Index/cart') ?>";
                    }
                });
            }
        }); 
        <?php
        if ($this->session->has_userdata('regmsg')) {
        ?> $('#REGModal').modal('show');
        <?php
            $this->session->unset_userdata('regmsg');
        } elseif ($this->session->has_userdata('loginmsg')) {
        ?> $('#myModal').modal('show');
        <?php
            $this->session->unset_userdata('loginmsg');
        } else {
        }
        if ($this->session->has_userdata('checkout')) {
        ?> $('#myModal').modal('show');
        <?php
            $this->session->unset_userdata('checkout');
        }
        ?>


        var err = [];

        $(document).on('keyup', '#company_contact', function() {
            // $('#company_contact').keyup(function() {

            var contact = $('#company_contact').val();

            if (!$('#company_contact').val()) {
                err.push('true');
                $('#mainphone').text('Company Contact is required');
            } else if (IsMobile(contact) == false) {
                err.push('true');
                $('#mainphone').text('Your Number is Invalid. Should contain 10 digit contact no.');
                // $('#cmp_main').text(contact);

            } else {
                err = [];
                $('#mainphone').text('');

            }
        });

        function IsMobile(contact) {

            contact = contact.replace(/\D/g, '');
            $('#company_contact').val(contact);

            var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
            if (!regex.test(contact)) {
                return false;
            } else {
                return true;
            }
        }

        $(document).on('submit', '#login_form2', function(e) {
            var frm = $('#login_form2');
            // frm.submit(function(e) {
            e.preventDefault(e);

            var formData = new FormData(this);

            $.ajax({
                async: true,
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: formData,
                cache: false,
                processData: false,
                contentType: false,

                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        alert("Login Successful");
                        location.href = "<?= base_url(uri_string()) ?>";
                    } else {
                        alert(data);
                    }
                },
                error: function(request, status, error) {
                    console.log("error")
                }
            });
        });
        $(document).on('submit', '#login_form', function(e) {
            var frm = $('#login_form');
            // frm.submit(function(e) {
            e.preventDefault(e);

            var formData = new FormData(this);

            $.ajax({
                async: true,
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: formData,
                cache: false,
                processData: false,
                contentType: false,

                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        alert("Login Successful");
                        location.href = "<?= base_url(uri_string()) ?>";
                    } else {
                        alert(data);
                    }
                },
                error: function(request, status, error) {
                    console.log("error")
                }
            });
        });

        var frms = $('#subscription');
        frms.submit(function(e) {
            e.preventDefault(e);

            var formData = new FormData(this);

            $.ajax({
                async: true,
                type: frms.attr('method'),
                url: frms.attr('action'),
                data: formData,
                cache: false,
                processData: false,
                contentType: false,

                success: function(data) {
                    if (data == 1) {
                        alert("Thank you for subscribing to our monthly newsletter.");
                        location.href = "<?= base_url(uri_string()) ?>";
                    } else {
                        alert(data);
                    }


                },
                error: function(request, status, error) {
                    console.log("error")
                }
            });
        });



    });

    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"> <td colspan = "5" > ' + group + ' < /td> < / tr > ');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });

    function filter_data_state() {
        var statelist = $('.statelist').val();
        $.ajax({
            url: "<?= base_url('Index/filterData_state') ?>",
            method: "POST",
            data: {
                statelist: statelist
            },
            beforeSend: function() {
                $("#filter_data").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
            },
            success: function(data) {
                $('#filter_data').html(data);
            }
        })
    }
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }); 
    function load_product() {
        $.ajax({
            url: '<?= base_url("Index/cart_items") ?>',
            method: 'POST',
            success: function(response) {
                $('#cart').html(response);

            }
        }); 
    }
</script>