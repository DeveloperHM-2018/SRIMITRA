<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{
    public function mail()
    {
        echo '<pre>';
        // $message = donormail('harshamaravi@gmail.com' . ' / ' . '9516354018',  '123');
        // echo $message;
        // $result = sendmail('ezr97367@xcoxc.com', 'Srimitra Registration', 'good');
        $result2 = sendmail('webangelbackup002@gmail.com', 'Srimitra Registration', 'good');
        // print_R($result);
        print_R($result2);
    }
    public function captcha()
    {
        $this->load->view('testing/capthca');
    }
    public function session()
    {
        // echo '<pre>';
        // regenerate_id();
        // print_r($_SESSION);
        // echo "Session ID:".session_id()."<br>";
        // echo "Remote Address: ".$_SERVER['REMOTE_ADDR']."<br>";
        // echo "User Agent: ".$this->input->user_agent()."<br>";

    }
    public function child()
    {
        $all_orphanage = $this->CommonModal->getAllRowsInOrder(
            'tbl_orphanage',
            'id',
            'desc'
        );

        if (!empty($all_orphanage)) {
            foreach ($all_orphanage as $cons) {
                $update = $this->CommonModal->updateRowById(
                    'tbl_orphanage',
                    'id',
                    $cons['id'],
                    array('password' => encryptId($cons['password']))
                );
                 
            }
        }
    }
    public function merchant()
    {
        $all_orphanage = $this->CommonModal->getAllRowsInOrder(
            'tbl_merchant_registration',
            'id',
            'desc'
        );

        if (!empty($all_orphanage)) {
            foreach ($all_orphanage as $cons) {
                $update = $this->CommonModal->updateRowById(
                    'tbl_merchant_registration',
                    'id',
                    $cons['id'],
                    array('password' => encryptId($cons['password']))
                );
                 
            }
        }
    }
    public function admin()
    {
        $all_orphanage = $this->CommonModal->getAllRowsInOrder(
            'webangel_admin',
            'admin_id',
            'desc'
        );

        if (!empty($all_orphanage)) {
            foreach ($all_orphanage as $cons) {
                $update = $this->CommonModal->updateRowById(
                    'webangel_admin',
                    'admin_id',
                    $cons['admin_id'],
                    array('admin_password' => encryptId($cons['admin_password']))
                );
            }
        }
    }
    public function oadmin()
    {
        $all_orphanage = $this->CommonModal->getAllRowsInOrder(
            'tbl_admin',
            'admin_id',
            'desc'
        );

        if (!empty($all_orphanage)) {
            foreach ($all_orphanage as $cons) {
                $update = $this->CommonModal->updateRowById(
                    'tbl_admin',
                    'admin_id',
                    $cons['admin_id'],
                    array('password' => encryptId($cons['password']))
                );
                 
            }
        }
    }
}
