     <!doctype html>
<html class="no-js" lang="en">


<?php include('includes/head-link.php'); ?>

<body>
    <?php include('includes/header.php'); ?>

    <main>
         
     
        <section class="latest-cars-area latest-cars-three pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                      <div class="col-lg-6 shadow p-4">
                                
                                    <h3 class="widget-title">Enter <span> Mail id </span></h3>
                                    <p><?php
                                        if ($this->session->has_userdata('forget')) {
                                            echo $this->session->userdata('forget');
                                            $this->session->unset_userdata('forget');
                                        }
                                        ?>
                                    </p>
                                    <form action="" method="post"  >
                                        <div class="form-grp">
                                             
                                            <input type="email" class="form-control" name="email" placeholder="Email ID  " required>
                                        </div>
                                        <br>
                                        <button class="btn btn-block" type="submit">Get Password</button>
                                     
                                    </form>
                                    
                                
                            </div>
                </div>
                 
            </div>
        </section>
         


        <?php //include('includes/upfooter.php'); ?>

    </main>




    <?php include('includes/footer.php'); ?>
    <?php include('includes/footer-link.php'); ?>

</body>

</html>