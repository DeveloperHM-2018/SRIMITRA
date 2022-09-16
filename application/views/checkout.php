<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" name="payuForm" action="https://test.payu.in/_payment" id="form">

        <input name="key" type="hidden" value="<?php echo $mid ?>" />
        <input name="txnid" type="hidden"  value="<?php echo $txnid ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>

        <input name="amount" type="hidden" value="<?php echo $grandtotal; ?>" />

        <input name="productinfo" type="hidden" value="<?php echo $productinfo;?>">

        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
        <input name="udf1" type="hidden" value="">
        <input name="udf2" type="hidden" value="">
        <input name="udf3" type="hidden" value="">
        <input name="udf4" type="hidden" value="">
        <input name="udf5" type="hidden" value="">

        <input name="firstname" id="firstname" type="hidden" value="<?php  echo $fname; ?>"/>

        <input name="email" id="email"  type="hidden"  value='<?php echo $email;?>'>

        <!-- <input name="phone"   type="hidden"  value="<?php echo $phoneno; ?>"> -->
        <input name="surl" type="hidden" value="<?php echo base_url('Index/payment_success'); ?>" size="64" />
        <input name="furl" type="hidden" value="<?php echo base_url('Index/payment_failure'); ?>" size="64" />
        <input name="curl" type="hidden" value="<?php echo base_url('Index/payment_failure'); ?>" />

       
        <input type="submit" name="submit_form" value="Click Here for Payment" class="btn btn-info btn-block" >
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"></script>
    <script>
        $('#form').submit();
    </script>

</body>
</html>