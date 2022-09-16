<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
 
	public function index()
	{
		$this->load->view('get_started');
	}
	public function vendor()
	{
		$this->load->view('vendor');
	}
	public function orphanage()
	{
		$this->load->view('orphanage');
	}
	public function institute()
	{
		$this->load->view('institute');
	}
}
