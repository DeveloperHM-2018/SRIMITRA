<!doctype html>
<html class="no-js" lang="en">
<?php include('includes/head-link.php'); ?>
<body>
    <?php include('includes/header.php'); ?>
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content text-center">
                            <h3 class="f-white">
                                <?= ucfirst($profiledata['name']) ?>
                            </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active f-white" aria-current="page">Celebration with children</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="car-search-area car-search-style-two pt-60"
            style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg')">
            <div class="container">
                <div class="row flex-direction">
                    <div class="col-4">
                        <div class="car-search-wrap">
                            <div class="small-title mb-20">
                                <h4><i class="flaticon-searching"></i>FILTER<span> CELEBRATION?</span></h4>
                            </div>
                            <form action="#" class="car-search-form">
                                <div class="row align-items-end">
                                    <div class="col custom-col-12">
                                        <select name="name" class="selected" id="donation_status">
                                            <option value="">Select Status</option>
                                            <option value="0">New </option>
                                            <option value="1">Accepted </option> 
                                            <option value="2">Declined </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="author-profile-area gray-lite-bg pt-60 pb-60"
                            style="background-image: url('<?= base_url() ?>assets/img/pattern2.jpg')">
                            <div class="container">
                                
                                    
                                        <div id="filter_data" class="row "></div>
                                    
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- author-profile-area-end -->
        <?php //include('includes/upfooter.php'); 
        ?>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>
</body>
<script>
    $(document).ready(function () {
        filter_data();
        function filter_data() {
            $('#filter_data').html('<div id="loading" style="" ></div>');
            var action = 'fetch_data';
            var status = $('#donation_status').val();
            // console.log(status);
            $.ajax({
                url: "<?= base_url('Index/filtercelebrateData') ?>",
                method: "POST",
                data: {
                    status: status
                },
                success: function (data) {
                    // console.log(data);
                    $('#filter_data').html(data);
                }
            });
        }
        function get_filter(class_name) {
            var filter = [];
            $('.' + class_name + ':checked').each(function () {
                filter.push($(this).val());
            });
            return filter;
        }
        
        $(document).on('change', '#donation_status', function(){
        // $('#donation_status').change(function () {
              
            filter_data();
        });
    });
</script>