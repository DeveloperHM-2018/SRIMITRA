<?php
defined('BASEPATH') or exit('no direct access allowed');

class Orphanage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (sessionId('oid') == "") {
            redirect(base_url('orphanage_login'));
        }

        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order List";
        $id = $this->uri->segment(3);
        if ($id == '') {

            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('orphane_id' => sessionId('oid')), 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('user_id' => $id), 'id', 'desc');
        }

        $this->load->view('orphanage/view_orderPlced', $data);
    }

    public function  products_list()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';

        $data['title'] = "Products List";
        $data['products'] = $this->CommonModal->getAllRows('products');


        if (count($_POST) > 0) {

            $pprice = $this->input->post('pprice');
            $p_id = $this->input->post('p_id');

            for ($j = 0; $j < count($p_id); $j++) {
                $data = array('oid' => sessionId('oid'), 'p_id' =>  $p_id[$j], 'pprice' => $pprice[$j]);
                $m_id = $this->CommonModal->getRowByMoreId('tbl_merchant_pprice', array('oid' => sessionId('oid'), 'p_id' =>  $p_id[$j]));
                // print_R($m_id);
                if ($m_id != '') {

                    $update = $this->CommonModal->updateRowByMoreId('tbl_merchant_pprice', array('oid' => sessionId('oid'), 'p_id' =>  $p_id[$j]),  array('pprice' => $pprice[$j]));
                } else {
                    $mproduct = $this->CommonModal->insertRowReturnId('tbl_merchant_pprice', $data);
                }
                redirect(base_url() . 'Orphanage/products_list');
            }
        }

        $this->load->view('orphanage/product_list', $data);
    }



    public function statusupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $status));
        redirect(base_url('Orphanage/orderPlaced'));
    }
    public function orderPlaced()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order List";
        $id = $this->uri->segment(3);
        if ($id == '') {

            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('orphane_id' => sessionId('oid')), 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('user_id' => $id), 'id', 'desc');
        }

        $this->load->view('orphanage/view_orderPlced', $data);
    }
    public function donation()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Delivered Order List";
        $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => '1', 'chechout_status' => '5', 'orphane_id' => sessionId('oid')), 'id', 'desc');

        $this->load->view('orphanage/donation', $data);
    }
    public function confirmed_donation()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Delivered Order List";
        $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => '1', 'chechout_status' => '6', 'orphane_id' => sessionId('oid')), 'id', 'desc');

        $this->load->view('orphanage/donation', $data);
    }
    public function OrderPlacedDetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        $this->load->view('orphanage/OrderPlacedDetails', $data);
    }

    public function fetchorder()
    {
        $filter_status = $this->input->post('filter_status');
        if ($filter_status == '') {

            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('orphane_id' => sessionId('oid')), 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => $filter_status), 'id', 'desc');
        }
        $this->load->view('orphanage/orderlist', $data);
    }
}
