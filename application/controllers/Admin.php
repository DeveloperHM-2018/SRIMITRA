<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $get['title'] = "Admin Login";
        $get['favicon'] = "assets/images/logo.png";
        if ($this->session->userdata('admin_id')) {
            redirect(base_url('admin_Dashboard'));
        } else {
            $this->load->view('admin/login', $get);
        }
    }

    public function adminlogin()
    {
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        if ($this->form_validation->run()) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data =  $this->CommonModal->getRowById('tbl_admin', 'username', $username);
            if ($data) {

                $id = $data[0]['admin_id'];
                $f_username = $data[0]['username'];
                $f_password = $data[0]['password'];
                if ($password != $f_password) {
                    flashData('login_error', 'Enter a valid Password.');
                } else {
                    $this->session->set_userdata(array('admin_id' => $id, 'username' => $username));
                    redirect('Admin_Dashboard');
                }
            } else {
                flashData('login_error', 'Enter a valid Username ');
            }
        }
        redirect(base_url('admin'));
    }

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('admin_id');
        redirect(base_url('admin'));
    }


    public function merchant_login()
    {
        $get['title'] = "Merchant Login";
        $get['favicon'] = "assets/images/logo.png";
        if ($this->session->userdata('marchid')) {
            redirect(base_url('Merchant'));
        } else {
            $this->load->view('merchant/login', $get);
        }
    }


    public function merchantlogin()
    {
        $this->form_validation->set_rules('number', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        if ($this->form_validation->run()) {
            $number = $_POST['number'];
            $password = $_POST['password'];
            $data =  $this->CommonModal->getRowById('tbl_merchant_registration', 'number', $number);
            if ($data) {

                $this->session->set_userdata(array('mid' => $data[0]['id'], 'shop_name' => $data[0]['shop_name'], 'number' => $data[0]['number'], 'm_name' => $data[0]['m_name']));

                if ($data[0]['mstatus'] != '1' )
                {
               
                $id = $data[0]['id'];
                $f_username = $data[0]['number'];
                $f_password = $data[0]['password'];

                if ($password != $f_password) {
                    flashData('login_error', 'Enter a valid Password.');
                } else {
                    $this->session->set_userdata(array('marchid' => $id, 'number' => $number));
                    redirect('Merchant/orderPlaced');
                }
                
                }
                
                else
                {
                    flashData('login_error', 'There is no longer any activity on your account');
                }
                
                
            } 
            
            
            
            
            
            else {
                flashData('login_error', 'Enter a valid number ');
            }
        } 
        redirect(base_url('merchant_login'));
    }

    public function mlogout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('marchid');
        redirect(base_url('merchant_login'));
    }


    public function childcare_homes_login()
    {
        $get['title'] = "Child care homes Login";
        $get['favicon'] = "assets/images/logo.png";
        if ($this->session->userdata('oid')) {
            redirect(base_url('Childcare_homes'));
        } else {
            $this->load->view('childcare_homes/login', $get);
        }
    }


    public function orphanagelogin()
    {
        $this->form_validation->set_rules('number', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        if ($this->form_validation->run()) {
            $number = $_POST['number'];
            $password = $_POST['password']; 
            $data =  $this->CommonModal->getRowById('tbl_orphanage', 'number', $number);
            if ($data) { 
                $this->session->set_userdata(array('orphaneid' => $data[0]['id'],  'number' => $data[0]['number'], 'name' => $data[0]['name'])); 
                $id = $data[0]['id'];
                $f_username = $data[0]['number'];
                $f_password = $data[0]['password']; 
                if ($password != $f_password) {
                    flashData('login_error', 'Enter a valid Password.');
                } else {
                    $this->session->set_userdata(array('oid' => $id, 'number' => $number));
                    redirect('Childcare_homes');
                }
            } else {
                flashData('login_error', 'Enter a valid number ');
            }
        }
        
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
        
        redirect('childcare_homes_login');
    }

    public function Orphane_logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('oid');
        redirect(base_url('childcare_homes'));
    }
}
