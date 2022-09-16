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
}
