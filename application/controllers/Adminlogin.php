<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminlogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (sessionId('user_id') != "") {
			redirect("CrmDashboard");
		}
	}
	public function index()
	{
		$data['title'] = 'Admin login  ';
		$data['projectTitle'] = 'Srimitra CRM';
		$this->load->view('crm/admin_login', $data);
	}
	public function sms()
	{
		$message_content = 'Thanks for Connecting Srimitra CRM.
We will contact you soon.
';
		sendWhatsapp('919039005753', $message_content);
	}
	public function validatelogin()
	{

		if (count($_POST) > 0) {
			$admin_email = $this->input->post('admin_email');
			$admin_password = $this->input->post('admin_password');
			$user_id = $this->CommonModal->getRowById('webangel_admin', 'admin_email', $admin_email);

			if ($user_id) {
				if ($user_id[0]['admin_password'] == $admin_password) {
					$this->session->set_userdata('user_id', $user_id[0]['admin_id']);
					$this->session->set_userdata('user_type', $user_id[0]['admin_type']);
					redirect('CrmDashboard');
				} else {

					flashData('msg', '<div class="alert alert-danger">Invalid Password</div>');
				}
			} else {

				flashData('msg', '<div class="alert alert-danger">Invalid username</div>');
			}
			redirect(base_url('Adminlogin'));
		} else {

			flashData('msg', '<div class="alert alert-danger">Server Error</div>');
			redirect(base_url('Adminlogin'));
		}
	}
}
