<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function facebookleads()
    {
        $post = $this->input->post();
        $insert = $this->CommonModal->insertRowReturnId('patient_record', $post); 
	    $message_content='Thanks for contacting Smile Care Dental Clinic.
We will contact you soon.
If the patient has more problems, then please contact 9300117987 .
Thank you for joining Smile Care Dental Clinic.
Gratitude
Dr. Vipalv Joshi
SHPL';
        sendOTP($post['pcontact'], $message_content);
        sendWhatsapp($post['pcontact'], $message_content);
         
    }
     
}