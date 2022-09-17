 <!doctype html>
 <html class="no-js" lang="en">


 <?php include('includes/head-link.php'); ?>
 <style>
     .main-img {
         width: 100%;
         height: 200px;
         object-fit: cover;
     }
 </style>
 <style>

 </style>

 <body>
     <?php include('includes/header.php'); ?>

     <main>
         <section class="breadcrumb-area breadcrumb-bg" style="padding: 0 !important;">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="breadcrumb-content text-center">
                             <h2>Child Care Homes</h2>
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="#" onclick="history.back()">Back</a></li>
                                     <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                     <li class="breadcrumb-item active cwhite" aria-current="page" style="color:white">Child Care Home</li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </section>

         <section class="inventory-list-area gray-lite-bg pt-60 pb-120" style="background-image: url('<?= base_url() ?>assets/img/backgroundimg.jpg')">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-xl-8 col-lg-7 col-md-9 " id="filter_data">

                     </div>
                     <div class="col-xl-4 col-lg-5 col-md-9">
                         <aside class="inventory-sidebar">
                             <div class="widget inventory-widget">
                                 <div class="inv-widget-title mb-25">
                                     <h5 class="title">Find Child home care</h5>
                                 </div>
                                 <form action="<?= base_url('child_care_homes') ?>" method="get" class="sidebar-find-car">
                                     <div class="form-grp search-box">
                                         <input type="text" name="search" id="search" class="inp-form" placeholder="Search CHILD CARE HOMES HERE" value="<?= $search ?>" />
                                         <button><i class="fas fa-search"></i></button>
                                     </div>
                                     <button class="btn" id="now">SEARCH NOW</button>
                                 </form>
                             </div>
                             <div class="widget inventory-widget">
                                 <?php include('enquiry_form.php'); ?>
                             </div>

                         </aside>
                     </div>
                 </div>
             </div>
         </section>

     </main>




     <?php include('includes/footer.php'); ?>
     <?php include('includes/footer-link.php'); ?>
     <script>
         $(document).ready(function() {
             var search = $('#search').val();
             filter_data();


             function filter_data() {
                 var action = 'fetch_data';

                 var search = $('#search').val();

                 $.ajax({
                     url: "<?= base_url('Index/filterData') ?>",
                     method: "POST",
                     // dataType: "JSON",
                     data: {
                         action: action,

                         search: search

                     },
                     beforeSend: function() {
                         $("#filter_data").text("").html("Loading.. <i class='fa fa-spin fa-spinner'></i>").attr('disabled', true);
                     },
                     success: function(data) {
                         $('#filter_data').html(data);
                     }
                 })
             }

             function get_filter(class_name) {
                 var filter = [];
                 $('.' + class_name + ':checked').each(function() {
                     filter.push($(this).val());
                 });
                 return filter;
             }
         });
     </script>

 </body>

 </html>