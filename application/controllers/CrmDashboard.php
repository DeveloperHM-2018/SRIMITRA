<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrmDashboard extends CI_Controller
{
    public $profile_data = array();
    public function __construct()
    {
        parent::__construct();
        if (sessionId('user_id') == "") {
            redirect("Adminlogin");
        }
        $this->profile_data = $this->CommonModal->getRowById('webangel_admin', 'admin_id', sessionId('user_id'));
        date_default_timezone_set("Asia/Kolkata");
    }
    public function index()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = ' Dashboard';
        $data['followup_today'] = $this->CommonModal->getRowByMoreId('donor_followup', array('followup_dt' => date('Y-m-d')));

        if (sessionId('user_type') == '1') {
            $data['followup_history'] = $this->CommonModal->getRowByIdInOrder('donor_followup', array('followup_dt' => date('Y-m-d')), 'paid', 'DESC');
            $data['donor_list'] = $this->CommonModal->getRowByIdInOrder('tbl_orphanage', array('date' => date('Y-m-d')), 'id', 'DESC');
        } else {
            $data['followup_history'] = $this->CommonModal->getRowByIdInOrder('donor_followup', array('emp_id' => sessionId('user_id'), 'followup_dt' => date('Y-m-d')), 'paid', 'DESC');

            $data['donor_list'] = $this->CommonModal->getRowByIdInOrder('tbl_orphanage', array('date' => date('Y-m-d'), 'user_id' => sessionId('user_id')), 'id', 'DESC');
        }


        $this->load->view('crm/crmdashboard', $data);
    }
    public function new_employee()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Add Employee ';
        $data['tag'] = 'new';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $employee_id = $this->CommonModal->insertRowReturnId('webangel_admin', $post);
            if ($employee_id) {
                userData('msg', '<div class="alert alert-success">employee added successfully</div>');
                redirect('CrmDashboard/employee_list');
            } else {
                userData('msg', '<div class="alert alert-danger">employee not added, Server error..</div>');
                $this->load->view('crm/new_employee', $data);
            }
        } else {
            $this->load->view('crm/new_employee', $data);
        }
    }
    public function employee_list()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Employee list ';
        $data['employee_list'] = $this->CommonModal->getRowById('webangel_admin', 'admin_type', '0');
        $this->load->view('crm/employee_list', $data);
    }
    public function update_employee($pid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Update Employee';
        $data['tag'] = 'edit';
        $data['employee_list'] = $this->CommonModal->getRowById('webangel_admin', 'admin_id', $pid);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $employee_id = $this->CommonModal->updateRowById('webangel_admin', 'admin_id', $pid, $post);
            if ($employee_id) {
                userData('msg', '<div class="alert alert-success">employee Updated successfully</div>');
                redirect('CrmDashboard/employee_list');
            } else {
                userData('msg', '<div class="alert alert-danger">employee not updated, Server error..</div>');
                $this->load->view('crm/new_employee', $data);
            }
        } else {
            $this->load->view('crm/new_employee', $data);
        }
    }


    public function new_donor()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Add donor ';

        $data['employee'] = getRowById('webangel_admin', 'admin_type', '0');

        $data['tag'] = 'new';
        if (count($_POST) > 0) {
            $post = $this->input->post();

            $post['user_type'] = sessionId('user_type');

            $donor_id = $this->CommonModal->insertRowReturnId('tbl_orphanage', $post);
            if ($donor_id) {
                $message_content = 'Thanks for contacting Srimitra.';
                sendOTP($post['number'], $message_content);
                sendWhatsapp($post['number'], $message_content);
                userData('msg', '<div class="alert alert-success">Donor added successfully</div>');
                redirect('CrmDashboard/donor_list');
            } else {
                userData('msg', '<div class="alert alert-danger">Donor not added, Server error..</div>');
                $this->load->view('crm/new_donor', $data);
            }
        } else {
            $this->load->view('crm/new_donor', $data);
        }
    }
    public function update_donor($pid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Update Donor';
        $data['tag'] = 'edit';
        $data['donor_list'] = $this->CommonModal->getRowById('tbl_orphanage', 'id', $pid);
        $data['employee'] = getRowById('webangel_admin', 'admin_type', '0');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $donor_id = $this->CommonModal->updateRowById('tbl_orphanage', 'id', $pid, $post);
            if ($donor_id) {
                userData('msg', '<div class="alert alert-success">donor Updated successfully</div>');
                redirect('CrmDashboard/donor_list');
            } else {
                userData('msg', '<div class="alert alert-success">donor Updated successfully</div>');
                redirect('CrmDashboard/donor_list');
            }
        } else {
            $this->load->view('crm/new_donor', $data);
        }
    }
    public function donors_list()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Donor list ';
        $data['donor_list'] = $this->CommonModal->getAllRowsInOrder('tbl_orphanage', 'id', 'DESC');
        $data['employee'] = getRowById('webangel_admin', 'admin_type', '0');

        $this->load->view('crm/admin_donor_list', $data);
    }

    public function donor_list()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Donor list ';
        if(sessionId('user_id') == 1){
            $data['donor_list'] = $this->CommonModal->getAllRows('tbl_orphanage');
        }else{
            $data['donor_list'] = $this->CommonModal->getRowByIdInOrder('tbl_orphanage',  array('user_id' => sessionId('user_id')), 'id', 'DESC');
        }
        
        $data['employee'] = getRowById('webangel_admin', 'admin_type', '0');

        $this->load->view('crm/donor_list', $data);
    }
    

    public function new_followup()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Add Followup ';
        $data['tag'] = 'new';

        $data['donor'] = $this->CommonModal->runQuery("SELECT * FROM `tbl_orphanage` WHERE `status` != 'Repeated' AND `status` != 'Complete'  AND `status` != 'Not Interested' ORDER by pid desc");

        if (count($_POST) > 0) {
            $post = $this->input->post();

            $pid  = $this->input->post('id');

            $followup_id = $this->CommonModal->insertRowReturnId('donor_followup', $post);
            $this->CommonModal->updateRowById('tbl_orphanage', 'id', $pid, array('status' => 'Complete'));


            if ($followup_id) {
                userData('msg', '<div class="alert alert-success">Status added successfully</div>');
                redirect('CrmDashboard/new_followup');
            } else {
                userData('msg', '<div class="alert alert-danger">Status not added, Server error..</div>');
                $this->load->view('crm/new_followup', $data);
            }
        } else {
            $this->load->view('crm/new_followup', $data);
        }
    }
    public function update_followup($pid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Update followup';
        $data['tag'] = 'edit';
        $data['followup'] = $this->CommonModal->getRowById('donor_followup', 'id', $pid);
        // print_r($data['followup']);
        if (count($_POST) > 0) {
            $post = $this->input->post();
            if ($_FILES['attachment']['name'] == '') {
                $post['attachment'] = $data['followup'][0]['attachment'];
            } else {
                $post['attachment'] = imageUpload('attachment', 'uploads/followup');
            }


            $followup = $this->CommonModal->updateRowById('donor_followup', 'id', $pid, $post);
            if ($followup) {
                userData('msg', '<div class="alert alert-success">followup Updated successfully</div>');
                redirect('CrmDashboard/followup_list');
            } else {
                userData('msg', '<div class="alert alert-danger">followup not updated, Server error..</div>');
                $this->load->view('crm/new_followup', $data);
            }
        } else {
            $this->load->view('crm/new_followup', $data);
        }
    }
    public function followup_list($pid = null)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Followup History ';

        if (sessionId('user_type') == '1') {
            $data['followup_history'] = $this->CommonModal->getAllRowsInOrder('donor_followup', 'paid', 'DESC');
        } else {
            $data['followup_history'] = $this->CommonModal->getRowByIdInOrder('donor_followup', array('emp_id' => sessionId('user_id')), 'paid', 'DESC');
        }


        $this->load->view('crm/followup_history', $data);
    }

    public function updateappdoned()
    {
        extract($_POST);
        // print_r($_POST);
        $update = $this->CommonModal->updateRowById('donor_followup', 'paid', $id, array('status' => $status));
        if ($update) {
            echo $status;
        } else {
            echo '2';
        }
    }
    public function whatsapp_msg()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Whatsapp msg ';
        if (count($_POST) > 0) {
            $msg = '';
            $post = $this->input->post();

            foreach ($post['donor_id'] as $contact) {
                if($post['mode'] == '1'){
                    $send = sendWhatsapp($contact, $post['message']);
                }elseif($post['mode'] == '2'){
                    $send = sendmail($contact, 'Srimitra India | Bring Smile to innocent faces', $post['message']);
                
                }elseif($post['mode'] == '1'){
                    // $send = sendOTP($contact, $post['message']);
                
                }
                 
                $send_responce = json_decode($send);
                
                // print_R($send_responce->status); 
                // print_R($status->status);
                if ($send_responce->status == 'success') {
                    $msg .=  $contact . ' - send | ';
                } else {
                    $msg .=  $contact . ' - unsend | ';
                }
            }
            // exit();
            userData('msg', $msg);
            redirect(base_url('CrmDashboard/whatsapp_msg'));
        } else {
        }
        $data['donor'] = $this->CommonModal->getAllRows('tbl_orphanage');
        $this->load->view('crm/send_whatsapp', $data);
    }
    public function change_password()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Change password';
        if (count($_POST) > 0) {
            extract($this->input->post());
            if ($old == $data['profile'][0]['admin_password']) {
                if ($new == $con) {
                    $employee_id = $this->CommonModal->updateRowById('webangel_admin', 'admin_id', $data['profile'][0]['admin_id'], array('admin_password' => $new));
                    if ($employee_id) {
                        userData('msg', '<div class="alert alert-success">Password changed successfully</div>');
                    } else {
                        userData('msg', '<div class="alert alert-danger">Server error..</div>');
                    }
                } else {
                    userData('msg', '<div class="alert alert-danger">New password and old password doesnt match</div>');
                }
            } else {
                userData('msg', '<div class="alert alert-danger">Wrong Old Password</div>');
            }
            redirect('CrmDashboard/change_password');
        } else {
            $this->load->view('crm/change_password', $data);
        }
    }
    
    public function templates()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'Sri Mitra CRM';
        $data['title'] = 'Add Templates ';
        $data['template'] = getAllRow('tbl_templates'); 

        $data['tag'] = 'new';
        if (count($_POST) > 0) {
            $post = $this->input->post();
 
            $donor_id = $this->CommonModal->insertRowReturnId('tbl_templates', $post);
            if ($donor_id) {
                 
                userData('msg', '<div class="alert alert-success">Template added successfully</div>');
                
            } else {
                userData('msg', '<div class="alert alert-danger">Template not added, Server error..</div>');
                 
            }
            redirect('CrmDashboard/templates');
        } else {
            $this->load->view('crm/template', $data);
        }
    }
    public function importdata()
    {
        $file = $_FILES['name']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0; //
        $msg = 'Saved List - <br>';
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

            $post = array();
            // echo '<br>';
            // $post['campaign_name'] = $filesop[0];
            // $post['form_name'] = $filesop[1];
            // $post['platform'] = $filesop[2];
            $post['name'] = $filesop[0];
            $post['number'] = $filesop[1];
            $post['email'] = $filesop[2];
            $post['address'] = $filesop[3];
            // $post['status'] = $filesop[7];
            // $post['refer'] = $filesop[8];

            $post['user_id'] =   $this->input->post('user_id');
            $post['user_type'] = sessionId('user_type');
            // print_r($post);
            if ($c <> 0) {
                if ($post['name'] != '') {                 /* SKIP THE FIRST ROW */
                    $this->CommonModal->insertRowReturnId('tbl_orphanage', $post);
                    $msg .= '<br>' . $post['name'];
                }
            }
            $c = $c + 1;
        }
        userData('msg', $msg);
        redirect('CrmDashboard/donor_list');
    }

    public function sift_leads()
    {
        $leads_id = $this->input->post('leads_id');
        $employee_id = $this->input->post('employee_id');

        foreach ($leads_id as $lead) {
            $this->CommonModal->updateRowByMoreId('tbl_orphanage', array('id' => $lead), array('user_id' =>  $employee_id));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_type');
        redirect(base_url());
    }
}
