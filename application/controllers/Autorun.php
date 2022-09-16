<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autorun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function Index()
    {
        $donation = $this->CommonModal->getAllRows('tbl_orphange_order');
        if ($donation != '') {
            $r = [];
            foreach ($donation as $don) {
                $donation_product = $this->CommonModal->getRowById('tbl_orphange_order_product', 'o_id', $don['oid']);
                if ($donation_product != '') {
                    foreach ($donation_product as $pro) {
                        if($pro['quantity'] == 0){
                            $r[]="false";
                        }else{
                            $r[]="true";
                        }
                    }
                }
                if(in_array("true", $r)){
                
                }else{
                    $data_deduction = $this->CommonModal->updateRowById('tbl_orphange_order', 'oid', $don['oid'], array('status' => '3'));
                }
            }
            
        }
    }
}
