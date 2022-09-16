<?php
defined('BASEPATH') or exit('no direct access allowed');

class Childcare_homes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (sessionId('oid') == "") {
            redirect(base_url('childcare_homes_login'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {

        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Child Care Home | Dashboard";
        $id = $this->uri->segment(3);

        $data['all'] = $this->CommonModal->getNumRows('checkout', array('orphane_id' => sessionId('oid')));

        $data['new'] = $this->CommonModal->getNumRows('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '0'));
        $data['accepted'] = $this->CommonModal->getNumRows('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '1'));
        $data['rejected'] = $this->CommonModal->getNumRows('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '2'));
        $data['order_acc'] = $this->CommonModal->getNumRows('checkout', array('orphane_id' => sessionId('oid'), 'status' => '1'));
        $data['completed'] = $this->CommonModal->getNumRows('checkout', array('orphane_id' => sessionId('oid'), 'chechout_status' => '6'));
        $data['rashu'] = $this->CommonModal->getNumRows('checkout', array('orphane_id' => sessionId('oid'), 'chechout_status' => '3'));
        $data['order'] = $this->CommonModal->getRowByIdInOrder('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '0'), 'oid', 'DESC');
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $data['request'] = $this->CommonModal->getAllRows('order_request_template');
        $data['checkout'] = $this->CommonModal->getRowByOr('checkout', "(`orphane_id`=".sessionId('oid')." AND `chechout_status` IN ('3','4','5') )", "(`orphane_id`=".sessionId('oid')." AND `chechout_status` IN ('6') AND `certificate` IS NULL)");
        $this->load->view('childcare_homes/home', $data);
    }
    public function view_products()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Products";
        $data['products'] = $this->CommonModal->getRowByMoreId('products', array('approved' => '0'));
        $this->load->view('childcare_homes/view_products', $data);
    }
    public function new_order_request()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Add order request"; 
        
        $data['me'] = $this->CommonModal->getSingleRowById('tbl_orphanage', array('id'=> sessionId('oid')));
        
        if($data['me']['assign_merchant'] != ''){
        $data['products'] = $this->CommonModal->getRowByMoreId('merchant_products',array('merchant_id'=>$data['me']['assign_merchant'],'approved'=>'1','is_delete' => '0'));
        }else{
            $data['products'] = '';
        }
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        if (count($_POST) > 0) {
            $product = $this->input->post('product');
            $quantity = $this->input->post('quantity');
            $timestamp = time();
            $requestid = $this->CommonModal->insertRowReturnId('tbl_orphange_order',  array('timestamp' => $timestamp, 'orphan_id' => sessionId('oid')));
            $msg = array();
            for ($j = 0; $j < count($product); $j++) {
                if ($product[$j] != '') {
                    $data = array('cch_id' => sessionId('oid'), 'o_id' => $requestid, 'timestamp' =>  $timestamp, 'product' => $product[$j], 'quantity' => $quantity[$j], 'total_qty' => $quantity[$j]);
                    $request_product = $this->CommonModal->insertRowReturnId('tbl_orphange_order_product',  $data);
                    if ($request_product != '') {
                        array_push($msg, 'true');
                    } else {
                        array_push($msg, 'false');
                    }
                }
            }
            if (array_search('false', $msg)) {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,in some part.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Your request is successfully submit. We will contact you as soon as possible.</div>');
            }
            redirect(base_url('Childcare_homes/order_request'));
        }
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $this->load->view('childcare_homes/new_order_request', $data);
    }

    public function edit_order_request($oid = null)
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Update order request";
        $data['me'] = $this->CommonModal->getSingleRowById('tbl_orphanage', array('id'=> sessionId('oid')));
        
        $data['products'] = $this->CommonModal->getRowByMoreId('merchant_products',array('merchant_id'=>$data['me']['assign_merchant'],'approved'=>'1','is_delete' => '0'));
        $data['order'] = $this->CommonModal->getRowById('tbl_orphange_order', 'oid', decryptId($oid));

        if (count($_POST) > 0) {
            $product = $this->input->post('product');
            $quantity = $this->input->post('quantity');
            $orderpro = $this->input->post('orderpro');
            $requestid = $this->input->post('requestid');

            $timestamp = time();
            // $requestid = $this->CommonModal->insertRowReturnId('tbl_orphange_order',  array('timestamp' => $timestamp, 'orphan_id' => sessionId('oid')));
            $msg = array();
            for ($j = 0; $j < count($product); $j++) {
                if ($product[$j] != '') {

                    if ($orderpro[$j] != '') {
                        $data = array('product' => $product[$j], 'quantity' => $quantity[$j]);
                        $request_product = $this->CommonModal->updateRowById('tbl_orphange_order_product', 'id', $orderpro[$j], $data);
                    } else {
                        $data = array('cch_id' => sessionId('oid'), 'o_id' => $requestid, 'product' => $product[$j], 'quantity' => $quantity[$j], 'total_qty' => $quantity[$j]);
                        $request_product = $this->CommonModal->insertRowReturnId('tbl_orphange_order_product',  $data);
                    }

                    if ($request_product != '') {
                        array_push($msg, 'true');
                    } else {
                        array_push($msg, 'false');
                    }
                }
            }
            if (array_search('false', $msg)) {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,in some part.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Your request is successfully submit. We will contact you as soon as possible.</div>');
            }
            redirect(base_url('Childcare_homes/order_request'));
        }
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $this->load->view('childcare_homes/edit_order_request', $data);
    }
    public function importdata()
    {
        $file = $_FILES['pname']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0; //
        $msg = 'Saved List - <br>';
        $timestamp = time();
        $requestid = $this->CommonModal->insertRowReturnId('tbl_orphange_order',  array('timestamp' => $timestamp, 'orphan_id' => sessionId('oid')));
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {


            // $post = array();
            // // echo '<br>';
            // $post['product'] = $filesop[0];
            // $post['form_name'] = $filesop[1];
            // $post['platform'] = $filesop[2];
            // $post['pname'] = $filesop[3];
            // $post['pcontact'] = $filesop[4];
            // $post['quantity'] = $filesop[5];
            // $post['status'] = $filesop[6];

            if ($c <> 0 || $c <> 1) {
                if (($filesop[5] != '') && ($filesop[5] != '') && ($filesop[5] != '0') && ($filesop[5] != 'Qty')) {
                    print_r($filesop[0] . ' -- ' . $filesop[5] . '<br>');
                    $data = array('cch_id' => sessionId('oid'), 'o_id' => $requestid, 'timestamp' =>  $timestamp, 'product' => $filesop[0], 'quantity' => $filesop[5]);
                    $request_product = $this->CommonModal->insertRowReturnId('tbl_orphange_order_product',  $data);
                    $msg .= '<br>' . $filesop[3];
                }
            }
            $c = $c + 1;
        }
        // userData('msg', $msg);
        redirect(base_url('Childcare_homes/order_request'));
    }

    public function order_request()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "New Order List";
        $addfilter = [];


        $data['order'] = $this->CommonModal->getRowByMoreId('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '0'));
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $data['status'] = '0';
        $this->load->view('childcare_homes/order_request', $data);
    }
    public function accepted_order_request()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Accepted by admin";
        $data['order'] = $this->CommonModal->getRowByIdInOrder('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '1'), 'oid', 'DESC');
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $data['status'] = '1';
        $this->load->view('childcare_homes/order_request', $data);
    }
    public function rejected_order_request()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Rejected by admin";
        $data['order'] = $this->CommonModal->getRowByIdInOrder('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '2'), 'oid', 'DESC');
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $data['status'] = '2';
        $this->load->view('childcare_homes/order_request', $data);
    }

    public function completed_order_request()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Completed by admin";
        $data['order'] = $this->CommonModal->getRowByIdInOrder('tbl_orphange_order', array('orphan_id' => sessionId('oid'), 'status' => '3'), 'oid', 'DESC');
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        $data['status'] = '3';
        $this->load->view('childcare_homes/order_request', $data);
    }

    public function OrderPlacedDetails()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        $this->load->view('childcare_homes/OrderPlacedDetails', $data);
    }

    public function OrderPlacedDetails_temp()
    {
        $id = $this->uri->segment(3);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Order placed Details";
        $data['checkout'] = $this->CommonModal->getRowById('checkout', 'id', $id);
        $data['checkoutProduct'] = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
        if (count($_POST) > 0) {
            $mail_data = $this->input->post();
            sendmail($mail_data['email'], 'Registered with Srimitra | Welcome Child care Home', $mail_data['message']);
            redirect(base_url('Childcare_homes/OrderPlacedDetails/' . $id));
        }
        $this->load->view('childcare_homes/OrderPlacedDetails_temp', $data);
    }

    public function donation()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Donation Accepted by Merchant";
        // $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', "`orphane_id` = " . sessionId('oid') . " AND (`chechout_status` = '3' OR `chechout_status` = '4' OR `chechout_status` = '5' OR `chechout_status` = '6')", 'id', 'desc');
        $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => '1', 'chechout_status' => '3', 'orphane_id' => sessionId('oid')), 'id', 'desc');

        $this->load->view('childcare_homes/donation', $data);
    }
    public function delivered_donation()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Donation Delivered by Merchant";
        $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => '1', 'chechout_status' => '5', 'orphane_id' => sessionId('oid')), 'id', 'desc');

        $this->load->view('childcare_homes/donation', $data);
    }

    public function confirmed_donation()
    {
        $table = "checkout";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Upload Tax Benefit certificate";
        $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => '1', 'chechout_status' => '6', 'orphane_id' => sessionId('oid')), 'id', 'desc');

        $this->load->view('childcare_homes/donation', $data);
    }
    public function uploadcertificate()
    {
        if (count($_POST) > 0) {
            $checkout_id = $this->input->post('checkout_id');
            if (!empty($_FILES["cert"]["name"])) {
                $folder = "uploads/orphange/gallery/";
                $certificate = imageUpload('cert', "uploads/certificate/");
                $r = $this->CommonModal->updateRowById('checkout', 'id', $checkout_id, array('certificate' => $certificate, 'update_date' => time()));
            }
            redirect(base_url('Childcare_homes/confirmed_donation'));
        }
    }
    public function child_care_home()
    {
        $data['all_orphanage'] = $this->CommonModal->getRowById('tbl_orphanage', 'head_cch_id', sessionId('oid'));
        // $data['mer'] = $this->CommonModal->getRowById('tbl_merchant_registration', 'id',  $data['all_orphanage'][0]['assign_merchant']);


        $data['title'] = 'Child Care Home';

        $BdID = $this->input->get('BdID');


        if ($BdID != '') {
            $data = $this->CommonModal->getRowById('tbl_orphanage', 'id', $BdID);


            unlink('uploads/orphange/' .  $data[0]['govt_regis_cert']);
            unlink('uploads/orphange/' .  $data[0]['adhar_trustee_back']);
            unlink('uploads/orphange/' .  $data[0]['pan_trustee']);
            unlink('uploads/orphange/' .  $data[0]['adhar_trustee']);
            unlink('uploads/orphange/' .  $data[0]['tax_cert']);
            unlink('uploads/orphange/' .  $data[0]['cancel_check']);

            $delete = $this->CommonModal->deleteRowById('tbl_orphanage', array('id' => $BdID));
            redirect('Childcare_homes/child_care_home/');

            exit;
        }

        if (count($_POST) > 0) {

            $assign_merchant = $this->input->post('assign_merchant');
            $id = $this->input->post('oid');

            $data = array('assign_merchant' => $assign_merchant);

            $update = $this->CommonModal->updateRowById('tbl_orphanage', 'id', $id, $data);
            if ($update) {
                $this->session->set_flashdata('msg', 'Merchant Updated successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Merchant Updated successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect('Childcare_homes/child_care_home/');
        }

        $this->load->view('childcare_homes/orphanage', $data);
    }
    public function add_child_care_home()
    {


        $data['title'] = 'Child Care Home';
        $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');

        if (count($_POST) > 0) {


            // print_r($_POST);

            $post = $this->input->post();
            $post['govt_regis_cert'] = imageUpload('govt_regis_cert', 'uploads/orphange/');
            $post['adhar_trustee_back'] = imageUpload('adhar_trustee_back', 'uploads/orphange/');
            $post['pan_trustee'] = imageUpload('pan_trustee', 'uploads/orphange/');
            $post['adhar_trustee'] = imageUpload('adhar_trustee', 'uploads/orphange/');
            $post['tax_cert'] = imageUpload('tax_cert', 'uploads/orphange/');
            $post['cancel_check'] = imageUpload('cancel_check', 'uploads/orphange/');



            $post['password'] =   substr($post['name'], 0, 3) . substr($post['number'], 0, 3);

            $post['head_cch_id'] = sessionId('oid');

            $insert = $this->Dashboard_model->insertdata('tbl_orphanage', $post);
            //  exit();

            $countImg = count($_FILES['img']);
            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["img"]["name"][$i])) {
                    $folder = "uploads/orphange/gallery/";
                    move_uploaded_file($_FILES["img"]["tmp_name"][$i], "$folder" . $no . $_FILES["img"]["name"][$i]);
                    $file_name1 = $no . $_FILES["img"]["name"][$i];
                    $this->CommonModal->insertRowReturnId('tbl_orphanage_gallery', array('orphanage_id' => $insert, 'img' => $file_name1));
                }
            }

            if ($insert) {
                $message = 'Dear ' . $post['name'] . ',<br><br>
                            You have been successfully registered with Srimitra India.<br>
                            To login with us <a href="https://www.webangeltech.com/srimitra/childcare_homes_login">click here</a><br><br>
                            Use these credentials to continue login:<br>
                            Login id : ' . $post['number'] . '  <br>
                            Login password : ' . $post['password'] . '
                            <br><br>
                            Regards,<br>
                            SrimitraIndia';
                sendmail($post['email'], 'Registered with Srimitra | Welcome Child care Home', $message);
                $this->session->set_flashdata('msg', 'Child Care Home Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'Childcare_homes/child_care_home');
        } else {
            $this->load->view('childcare_homes/addorphanage', $data);
        }
    }


    public function edit_child_care_home($id = true)
    {
        $id = decryptId($id);

        $data['title'] = 'Child Care Home';
        $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
        $data['orphane'] = $this->CommonModal->getRowById('tbl_orphanage', 'id', $id);
        $data['city'] = $this->CommonModal->getRowById('tbl_cities', 'id', $data['orphane'][0]['city']);

        if (count($_POST) > 0) {
            print_r($_POST);

            $post = $this->input->post();
            $govt_regis_cert = $post['govt_regis_cert'];
            if ($_FILES['govt_regis_cert_temp']['name'] != '') {
                $img = imageUpload('govt_regis_cert_temp', 'uploads/orphange/');
                $post['govt_regis_cert'] = $img;
                if ($govt_regis_cert != "") {
                    unlink('uploads/orphange/' . $govt_regis_cert);
                }
            }


            $adhar_trustee_back = $post['adhar_trustee_back'];
            if ($_FILES['adhar_trustee_back_temp']['name'] != '') {
                $img2 = imageUpload('adhar_trustee_back_temp', 'uploads/orphange/');
                $post['adhar_trustee_back'] = $img2;
                if ($adhar_trustee_back != "") {
                    unlink('uploads/orphange/' . $adhar_trustee_back);
                }
            }

            $pan_trustee = $post['pan_trustee'];
            if ($_FILES['pan_trustee_temp']['name'] != '') {
                $img3 = imageUpload('pan_trustee_temp', 'uploads/orphange/');
                $post['pan_trustee'] = $img3;
                if ($pan_trustee != "") {
                    unlink('uploads/orphange/' . $pan_trustee);
                }
            }

            $adhar_trustee = $post['adhar_trustee'];
            if ($_FILES['adhar_trustee_temp']['name'] != '') {
                $img4 = imageUpload('adhar_trustee_temp', 'uploads/orphange/');
                $post['adhar_trustee'] = $img4;
                if ($adhar_trustee != "") {
                    unlink('uploads/orphange/' . $adhar_trustee);
                }
            }
            $tax_cert = $post['tax_cert'];
            if ($_FILES['tax_cert_temp']['name'] != '') {
                $img5 = imageUpload('tax_cert_temp', 'uploads/orphange/');
                $post['tax_cert'] = $img5;
                if ($tax_cert != "") {
                    unlink('uploads/orphange/' . $tax_cert);
                }
            }



            $cancel_check = $post['cancel_check'];
            if ($_FILES['cancel_check_temp']['name'] != '') {
                $img6 = imageUpload('cancel_check_temp', 'uploads/orphange/');
                $post['cancel_check'] = $img6;
                if ($cancel_check != "") {
                    unlink('uploads/orphange/' . $cancel_check);
                }
            }


            $update = $this->CommonModal->updateRowById('tbl_orphanage', 'id', $id, $post);

            $countImg = count($_FILES['img']);
            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["img"]["name"][$i])) {
                    $folder = "uploads/orphange/gallery/";
                    move_uploaded_file($_FILES["img"]["tmp_name"][$i], "$folder" . $no . $_FILES["img"]["name"][$i]);
                    $file_name1 = $no . $_FILES["img"]["name"][$i];
                    $this->CommonModal->insertRowReturnId('tbl_orphanage_gallery', array('orphanage_id' =>  $id, 'img' => $file_name1));
                }
            }

            if ($update) {
                $this->session->set_flashdata('msg', 'Child Care Home Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Child Care Home Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            }
            redirect(base_url() . 'Childcare_homes/child_care_home');
        } else {
            $this->load->view('childcare_homes/editorphanage', $data);
        }
    }


    public function child_care_home_details($id = true)

    {
        $id = decryptId($id);

        $data['mar'] = $this->CommonModal->getRowById('tbl_orphanage', 'id', $id);
        $data['city'] = $this->CommonModal->getRowById('tbl_cities', 'id', $data['mar'][0]['city']);
        $data['state'] = $this->CommonModal->getRowById('tbl_state', 'state_id', $data['mar'][0]['state']);
        $data['gallery'] = $this->CommonModal->getRowById('tbl_orphanage_gallery', 'orphanage_id', $data['mar'][0]['id']);
        $data['title'] = $data['mar'][0]['name'] . ' Details';
        $this->load->view('childcare_homes/orphanage_details', $data);
    }


    public function  child_care_home_products_list($id = true)
    {
        $data['oid'] = decryptId($id);
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Products List";
        $data['products'] = $this->CommonModal->getAllRows('products');

        if (count($_POST) > 0) {
            // print_r($_POST);
            // exit();
            $qty = $this->input->post('qty');
            $p_id = $this->input->post('p_id');
            // print_r($data['oid']);
            for ($j = 0; $j < count($p_id); $j++) {
                $m_id = $this->CommonModal->getRowByMoreId('tbl_orphange_order', array('orphan_id' => decryptId($id), 'p_id' =>  $p_id[$j]));
                echo $qty[$j];
                if ($m_id != '') {
                    $update = $this->CommonModal->updateRowByMoreId('tbl_orphange_order', array('orphan_id' => decryptId($id), 'p_id' =>  $p_id[$j]), array('qty' => $qty[$j]));
                } else {
                    $row = array('orphan_id' => decryptId($id), 'p_id' =>  $p_id[$j], 'qty' => $qty[$j]);
                    $update = $this->CommonModal->insertRowReturnId('tbl_orphange_order', $row);
                }

                // redirect(base_url() . 'Childcare_homes/orphanage_products_list/'.$id);
            }
        }
        $this->load->view('childcare_homes/orphanage_products_list', $data);
    }
    public function change_password()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Change password";
        if (count($_POST) > 0) {
            $oldpassword = $this->input->post('oldpassword');
            $password = $this->input->post('password');
            $confirmpassword = $this->input->post('confirmpassword');
            $profile = $this->CommonModal->getsingleRowById('tbl_orphanage', array('id' => sessionId('oid')));
            if ($profile['password'] == $oldpassword) {
                if ($password == $confirmpassword) {
                    $update = $this->CommonModal->updateRowById('tbl_orphanage', 'id', sessionId('oid'), array('password' => $password));
                    if ($update) {
                        $this->session->set_flashdata('msg', 'Password Changed Successfully');
                        $this->session->set_flashdata('msg_class', 'alert-success');
                    } else {
                        $this->session->set_flashdata('msg', 'Password not changed , try again later');
                        $this->session->set_flashdata('msg_class', 'alert-danger');
                    }
                } else {
                    $this->session->set_flashdata('msg', 'Password and confirm password doesnt matched.');
                    $this->session->set_flashdata('msg_class', 'alert-danger');
                }
            } else {
                $this->session->set_flashdata('msg', 'Old password doesnt matched');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }

            redirect(base_url() . 'Childcare_homes/change_password');
        } else {
            $this->load->view('childcare_homes/change_password', $data);
        }
    }
    public function report_donation()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['donation'] = $this->CommonModal->runQuery("SELECT * FROM `checkout` WHERE `orphane_id` = '" . sessionId('oid') . "' AND MONTH(`create_date_only`)  = MONTH(CURRENT_DATE())  ORDER BY `id` DESC");
        $data['title'] = "Donation report";

        $this->load->view('childcare_homes/report_donation', $data);
    }
    public function donation_report()
    {
        $post = $this->input->post();
        $data['donation'] = $this->CommonModal->runQuery("SELECT * FROM `checkout` WHERE `orphane_id` = '" . sessionId('oid') . "' AND DATE(`create_date_only`)  BETWEEN '" . $post['fromdate'] . "' AND '" . $post['todate'] . "' ORDER BY `id` DESC");
        $this->load->view('childcare_homes/report_donation_rowdata', $data);
    }

    public function report_donor()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['donor'] = $this->CommonModal->runQuery("SELECT * FROM `checkout` WHERE `orphane_id` = '" . sessionId('oid') . "' AND MONTH(`create_date_only`)  = MONTH(CURRENT_DATE())  ORDER BY `id` DESC");
        $data['title'] = "donor report";

        $this->load->view('childcare_homes/report_donor', $data);
    }
    public function donor_report()
    {
        $post = $this->input->post();
        $data['donor'] = $this->CommonModal->runQuery("SELECT * FROM `checkout` WHERE `orphane_id` = '" . sessionId('oid') . "' AND DATE(`create_date_only`)  BETWEEN '" . $post['fromdate'] . "' AND '" . $post['todate'] . "' ORDER BY `id` DESC");
        $this->load->view('childcare_homes/report_donor_rowdata', $data);
    }

    public function report_product()
    {
        $post = $this->input->post();
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = "Product Report";
        $data['products'] = $this->CommonModal->runQuery("SELECT COUNT(`product`) AS `pro`,`product`,`quantity`,`timestamp` FROM `tbl_orphange_order_product` WHERE `cch_id` = '" . sessionId('oid') . "' GROUP BY `product` ORDER BY `pro` DESC ");
        $this->load->view('childcare_homes/report_product', $data);
    }

    public function report_product_row()
    {
        $post = $this->input->post();
        $data['products'] = $this->CommonModal->runQuery("SELECT COUNT(`product`) AS `pro`,`product`,`quantity`,`timestamp` FROM `tbl_orphange_order_product` WHERE `cch_id` = '" . sessionId('oid') . "'   AND DATE(`create_date`)  BETWEEN '" . $post['fromdate'] . "' AND '" . $post['todate'] . "' GROUP BY `product` ORDER BY `pro` DESC");
        $this->load->view('childcare_homes/report_product_row', $data);
    }
    public function celebrate_with_us()
    {
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['title'] = 'Celebrate with us';
        $data['events'] = $this->CommonModal->getRowByMoreId('checkout_events', array('cch_id' => sessionId('oid'), 'status' => '1'));

        $this->load->view('childcare_homes/celebrate_with_us', $data);
    }
}
