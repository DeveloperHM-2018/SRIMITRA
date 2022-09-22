<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (sessionId('admin_id') == "") {
      redirect(base_url('admin'));
    }
    date_default_timezone_set("Asia/Kolkata");
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['request'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_orphange_order',
      ['status' => '0'],
      'oid',
      'DESC'
    );

    $data['orphanage'] = $this->CommonModal->getNumRow('tbl_orphanage');
    $data['products'] = $this->CommonModal->getNumRow('products');
    $data['merchant'] = $this->CommonModal->getNumRow(
      'tbl_merchant_registration'
    );
    $data['user'] = $this->CommonModal->getNumRow('tbl_user');
    $data['donation'] = $this->CommonModal->runQuery(
      "SELECT * FROM `checkout` WHERE ( `status` = '1' AND `chechout_status` = '3') OR ( `status` = '1' AND `chechout_status` = '2') OR (`status` = '0')"
    );

    $data['unapproved_products'] = $this->CommonModal->getRowByMoreId(
      'merchant_products',
      [
        'approved' => '0',
      ]
    );

    $data['new'] = $this->CommonModal->getNumRows('tbl_orphange_order', [
      'status' => '0',
    ]);
    $data['completed'] = $this->CommonModal->getNumRows('tbl_orphange_order', [
      'status' => '3',
    ]);
    $data['total'] = $this->CommonModal->getNumRow('tbl_orphange_order');
    $this->load->view('admin/dashboard', $data);
  }

  public function editcontactdetils()
  {
    $table = "contactdetails";
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $datav = $this->input->post();
    $update = $this->CommonModal->updateRowByMoreId(
      $table,
      ['cid' => '1'],
      $datav
    );
    if ($update) {
      $this->session->set_flashdata('msg', 'Category Added successfully');
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Soemthing went wrong Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }

    redirect(base_url() . 'admin_Dashboard/contact_update');
  }

  public function contact_update()
  {
    $data['title'] = 'Home';
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['contactdetails'] = $this->CommonModal->getRowById(
      'contactdetails',
      'cid',
      '1'
    );

    $this->load->view('admin/contact', $data);
  }

  public function update_srimitra_price()
  {
    if (count($_POST) > 0) {
      $srimitra_price = $this->input->post('srimitra_price');
      $id = $this->input->post('mpid');

      $data = ['srimitra_price' => $srimitra_price, 'approved' => 1];

      $update = $this->CommonModal->updateRowById(
        'merchant_products',
        'id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata(
          'msg',
          'Srimitra price Updated successfully'
        );
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Srimitra price  Updated successfully'
        );
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect('admin_Dashboard/');
    }
  }
  public function update_status()
  {
    if (count($_POST) > 0) {
      $id = $this->input->post('mpid');

      $data = ['approved' => 2];

      $update = $this->CommonModal->updateRowById(
        'merchant_products',
        'id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Status Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Status  Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect('admin_Dashboard/');
    }
  }

  public function statusupdate()
  {
    $post = $this->input->post();
    $r = $this->CommonModal->insertRowReturnId(
      'checkout_payment_to_merchant',
      $post
    );
    redirect(base_url('admin_Dashboard/donation_view/' . $post['checkout_id']));
  }

  public function child_care_home()
  {
    $data['all_orphanage'] = $this->CommonModal->getAllRowsInOrder(
      'tbl_orphanage',
      'id',
      'desc'
    );
    // $data['mer'] = $this->CommonModal->getRowById('tbl_merchant_registration', 'id',  $data['all_orphanage'][0]['assign_merchant']);
    $data['title'] = 'Child Care Home';

    $BdID = $this->input->get('BdID');
    if ($BdID != '') {
      $data = $this->CommonModal->getRowById('tbl_orphanage', 'id', $BdID);
      unlink('uploads/orphange/' . $data[0]['govt_regis_cert']);
      unlink('uploads/orphange/' . $data[0]['adhar_trustee_back']);
      unlink('uploads/orphange/' . $data[0]['pan_trustee']);
      unlink('uploads/orphange/' . $data[0]['adhar_trustee']);
      unlink('uploads/orphange/' . $data[0]['tax_cert']);
      unlink('uploads/orphange/' . $data[0]['cancel_check']);

      $delete = $this->CommonModal->deleteRowById('tbl_orphanage', [
        'id' => $BdID,
      ]);
      redirect('admin_Dashboard/child_care_home/');
      exit();
    }
    if (count($_POST) > 0) {
      $assign_merchant = $this->input->post('assign_merchant');
      $id = $this->input->post('oid');

      $data = ['assign_merchant' => $assign_merchant];

      $update = $this->CommonModal->updateRowById(
        'tbl_orphanage',
        'id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Merchant Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Merchant Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect('admin_Dashboard/child_care_home/');
    }
    $this->load->view('admin/orphanage', $data);
  }
  public function add_child_care_home()
  {
    $data['title'] = 'Child Care Home';
    $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
    $data['demography'] = $this->CommonModal->getAllRows('tbl_demography');

    if (count($_POST) > 0) {
      $post_data = $this->input->post();

      $state = $this->CommonModal->getSingleRowById('tbl_state', [
        'state_id' => $this->input->post('state'),
      ]);
      $city = $this->CommonModal->getSingleRowById('tbl_cities', [
        'id' => $this->input->post('city'),
      ]);

      $post['state_name'] = $state['state_name'];
      $post['city_name'] = $city['name'];

      $password =
        substr($post_data['fullname'], 0, 3) .
        substr($post_data['number'], 0, 3);
      $pass = str_replace(' ', '', $password);
      $post['password'] = encryptId($pass);

      $post['name'] = $this->input->post('fullname');
      $post['number'] = $this->input->post('number');
      $post['email'] = $this->input->post('email');
      $post['category'] = $this->input->post('category');
      $post['state'] = $this->input->post('state');
      $post['city'] = $this->input->post('city');
      $post['pincode'] = $this->input->post('pincode');
      $post['address'] = $this->input->post('address');
      $post['geo_coding'] = $this->input->post('geo_coding');
      $post['trust_name'] = $this->input->post('trust_name');
      $post['trustee_name'] = $this->input->post('trustee_name');
      $post['tagline'] = $this->input->post('tagline');
      $post['bank'] = $this->input->post('bank');
      $post['acc_no'] = $this->input->post('acc_no');
      $post['ifsc'] = $this->input->post('ifsc');
      $post['bank_address'] = $this->input->post('bank_address');
      $post['description'] = $this->input->post('description');
      $post['profile'] = imageUpload('profile', 'uploads/orphange/profile/');
      $post['profile_video'] = videoUpload('profile_video', 'uploads/orphange/profile/');
      $post['profile_type'] = $this->input->post('profile_type');

      $insert = $this->CommonModal->insertRowReturnId('tbl_orphanage', $post);

      $countImg = count($_FILES['img']);
      $type = 0;
      for ($i = 0; $i <= $countImg; $i++) {
        $no = rand();

        if (!empty($_FILES["img"]["name"][$i])) {
          // $mime = mime_content_type($_FILES["img"]["tmp_name"][$i]);
          if (strstr($_FILES["img"]["type"][$i], "video/")) {
            $type = 1;
          } else if (strstr($_FILES["img"]["type"][$i], "image/")) {
            $type = 0;
          }

          $folder = "uploads/orphange/gallery/";
          move_uploaded_file(
            $_FILES["img"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["img"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["img"]["name"][$i];
          $this->CommonModal->insertRowReturnId('tbl_orphanage_gallery', [
            'orphanage_id' => $insert,
            'img' => $file_name1,
            'type' => $type,
          ]);
        }
      }
      $document_file = count($_FILES['document_file']);
      for ($i = 0; $i <= $document_file; $i++) {
        $no = rand();
        if (!empty($_FILES["document_file"]["name"][$i])) {
          $folder = "uploads/orphange/documents/";
          move_uploaded_file(
            $_FILES["document_file"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["document_file"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["document_file"]["name"][$i];
          $doc = $this->CommonModal->insertRowReturnId(
            'tbl_orphanage_documents',
            [
              'cch_id' => $insert,
              'document_link' => $file_name1,
              'document_title' => $_POST["document_title"][$i],
            ]
          );
        }
      }
      if ($insert) {
        $message = CCHmail($post['number'], $post['password']);
        sendmail(
          $post['email'],
          'Registered with Srimitra | Welcome Child care Home',
          $message
        );
        $this->session->set_flashdata(
          'msg',
          'Child Care Home Added successfully'
        );
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url() . 'admin_Dashboard/child_care_home');
    } else {
      $this->load->view('admin/addorphanage', $data);
    }
  }

  public function edit_child_care_home($id = true)
  {
    $id = decryptId($id);

    $data['title'] = 'Child Care Home';
    $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
    $data['orphane'] = $this->CommonModal->getRowById(
      'tbl_orphanage',
      'id',
      $id
    );
    $data['city'] = $this->CommonModal->getRowById(
      'tbl_cities',
      'id',
      $data['orphane'][0]['city']
    );
    $data['gallery'] = $this->CommonModal->getRowById(
      'tbl_orphanage_gallery',
      'orphanage_id',
      $id
    );
    $data['documents'] = $this->CommonModal->getRowById(
      'tbl_orphanage_documents',
      'cch_id',
      $id
    );

    if (count($_POST) > 0) {

      $post = $this->input->post();

      if ($_FILES['profile_temp']['name'] != '') {
        $post['profile']  = imageUpload('profile_temp', 'uploads/orphange/profile/');
        if ($data['orphane'][0]['profile'] != "") {
          unlink('uploads/orphange/profile/' . $data['orphane'][0]['profile']);
        }
      } else {
        $post['profile']  = $data['orphane'][0]['profile'];
      }

      if ($_FILES['profile_video_temp']['name'] != '') {
        $post['profile_video']  = videoUpload('profile_video_temp', 'uploads/orphange/profile/');
        if ($data['orphane'][0]['profile_video'] != "") {
          unlink('uploads/orphange/profile/' . $data['orphane'][0]['profile_video']);
        }
      } else {
        $post['profile_video']  = $data['orphane'][0]['profile_video'];
      }


      $update = $this->CommonModal->updateRowById(
        'tbl_orphanage',
        'id',
        $id,
        $post
      );

      if ($update) {
        $this->session->set_flashdata(
          'msg',
          'Child Care Home Edit successfully'
        );
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Child Care Home Edit successfully'
        );
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/child_care_home');
    } else {
      $this->load->view('admin/editorphanage', $data);
    }
  }

  public function update_gallery($id)
  {
    if (count($_FILES) > 0) {
      $countImg = count($_FILES['img']);
      $type = 0;
      for ($i = 0; $i <= $countImg; $i++) {
        $no = rand();

        if (!empty($_FILES["img"]["name"][$i])) {
          // $mime = mime_content_type($_FILES["img"]["tmp_name"][$i]);
          if (strstr($_FILES["img"]["type"][$i], "video/")) {
            $type = 1;
          } else if (strstr($_FILES["img"]["type"][$i], "image/")) {
            $type = 0;
          }

          $folder = "uploads/orphange/gallery/";
          move_uploaded_file(
            $_FILES["img"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["img"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["img"]["name"][$i];
          $this->CommonModal->insertRowReturnId('tbl_orphanage_gallery', [
            'orphanage_id' => $id,
            'img' => $file_name1,
            'type' => $type,
          ]);
        }
      }
    }
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function update_document($id)
  {
    if (count($_FILES) > 0) {
      $document_file = count($_FILES['document_file']);
      for ($i = 0; $i <= $document_file; $i++) {
        $no = rand();
        if (!empty($_FILES["document_file"]["name"][$i])) {
          $folder = "uploads/orphange/documents/";
          move_uploaded_file(
            $_FILES["document_file"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["document_file"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["document_file"]["name"][$i];
          $doc = $this->CommonModal->insertRowReturnId(
            'tbl_orphanage_documents',
            [
              'cch_id' => $id,
              'document_link' => $file_name1,
              'document_title' => $_POST["document_title"][$i],
            ]
          );
        }
      }
    }
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function update_document_merchant($id)
  {
    if (count($_FILES) > 0) {
      $document_file = count($_FILES['document_file']);
      for ($i = 0; $i <= $document_file; $i++) {
        $no = rand();
        if (!empty($_FILES["document_file"]["name"][$i])) {
          $folder = "uploads/orphange/documents/";
          move_uploaded_file(
            $_FILES["document_file"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["document_file"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["document_file"]["name"][$i];
          $doc = $this->CommonModal->insertRowReturnId(
            'tbl_merchant_documents',
            [
              'merchant_id' => $id,
              'document_link' => $file_name1,
              'document_title' => $_POST["document_title"][$i],
            ]
          );
        }
      }
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function child_care_home_details($id = true)
  {
    $id = decryptId($id);
    $data['mar'] = $this->CommonModal->getRowById('tbl_orphanage', 'id', $id);
    $data['city'] = $this->CommonModal->getRowById(
      'tbl_cities',
      'id',
      $data['mar'][0]['city']
    );
    $data['state'] = $this->CommonModal->getRowById(
      'tbl_state',
      'state_id',
      $data['mar'][0]['state']
    );
    $data['gallery'] = $this->CommonModal->getRowById(
      'tbl_orphanage_gallery',
      'orphanage_id',
      $data['mar'][0]['id']
    );
    $data['documents'] = $this->CommonModal->getRowById(
      'tbl_orphanage_documents',
      'cch_id',
      $data['mar'][0]['id']
    );
    $data['title'] = '' . $data['mar'][0]['name'] . ' Details';
    $this->load->view('admin/orphanage_details', $data);
  }
  public function child_care_home_merchant_update($id = true)
  {
    $id = decryptId($id);
    $data['mar'] = $this->CommonModal->getRowById('tbl_orphanage', 'id', $id);
    $data['city'] = $this->CommonModal->getRowById(
      'tbl_cities',
      'id',
      $data['mar'][0]['city']
    );
    $data['state'] = $this->CommonModal->getRowById(
      'tbl_state',
      'state_id',
      $data['mar'][0]['state']
    );
    $data['gallery'] = $this->CommonModal->getRowById(
      'tbl_orphanage_gallery',
      'orphanage_id',
      $data['mar'][0]['id']
    );
    $data['title'] = '' . $data['mar'][0]['name'] . ' Details';
    if (count($_POST) > 0) {
      $assign_merchant = $this->input->post('assign_merchant');
      $data = ['assign_merchant' => $assign_merchant];

      $update = $this->CommonModal->updateRowById(
        'tbl_orphanage',
        'id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Merchant Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Merchant Updated successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect('admin_Dashboard/child_care_home/');
    }
    $this->load->view('admin/cch_merchant_update', $data);
  }

  public function child_care_home_products_list($id = true)
  {
    $data['oid'] = decryptId($id);
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Products List';
    $data['products'] = $this->CommonModal->getRowById(
      'products',
      'is_delete',
      '0'
    );

    if (count($_POST) > 0) {
      // print_r($_POST);
      // exit();
      $qty = $this->input->post('qty');
      $p_id = $this->input->post('p_id');
      // print_r($data['oid']);
      for ($j = 0; $j < count($p_id); $j++) {
        $m_id = $this->CommonModal->getRowByMoreId('tbl_orphange_order', [
          'orphan_id' => decryptId($id),
          'p_id' => $p_id[$j],
        ]);
        echo $qty[$j];
        if ($m_id != '') {
          $update = $this->CommonModal->updateRowByMoreId(
            'tbl_orphange_order',
            ['orphan_id' => decryptId($id), 'p_id' => $p_id[$j]],
            ['qty' => $qty[$j]]
          );
        } else {
          $row = [
            'orphan_id' => decryptId($id),
            'p_id' => $p_id[$j],
            'qty' => $qty[$j],
          ];
          $update = $this->CommonModal->insertRowReturnId(
            'tbl_orphange_order',
            $row
          );
        }

        // redirect(base_url() . 'admin_Dashboard/orphanage_products_list/'.$id);
      }
    }
    $this->load->view('admin/orphanage_products_list', $data);
  }

  public function deleteorphaneimg($id)
  {
    $data = $this->CommonModal->getRowById('tbl_orphanage_gallery', 'gid', $id);
    if (file_exists("uploads/orphange/gallery/" . $data[0]['img'])) {
      unlink('uploads/orphange/gallery/' . $data[0]['img']);
    }
    $delete = $this->CommonModal->deleteRowById('tbl_orphanage_gallery', [
      'gid' => $id,
    ]);
    redirect('admin_Dashboard/child_care_home');
  }
  public function deleteorphanedocument($id)
  {
    $data = $this->CommonModal->getRowById('tbl_orphanage_documents', 'id', $id);
    if (file_exists("uploads/orphange/documents/" . $data[0]['document_link'])) {
      unlink('uploads/orphange/documents/' . $data[0]['document_link']);
    }
    $delete = $this->CommonModal->deleteRowById('tbl_orphanage_documents', [
      'id' => $id,
    ]);
    redirect($_SERVER['HTTP_REFERER']);
  }
  public function deletemerchantdocument($id)
  {
    $data = $this->CommonModal->getRowById('tbl_merchant_documents', 'id', $id);
    if (file_exists("uploads/orphange/documents/" . $data[0]['document_link'])) {
      unlink('uploads/orphange/documents/' . $data[0]['document_link']);
    }
    $delete = $this->CommonModal->deleteRowById('tbl_merchant_documents', [
      'id' => $id,
    ]);
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function merchant()
  {
    $data['all_merchant'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_merchant_registration',
      ['mstatus' => '0'],
      'id',
      'desc'
    );
    $data['last_merchant'] = $this->CommonModal->getAllRowsWithLimit(
      'tbl_merchant_registration',
      '1',
      'id'
    );

    $data['title'] = 'Merchant';

    $BdID = $this->input->get('BdID');

    if ($BdID != '') {
      $data = $this->CommonModal->getRowById(
        'tbl_merchant_registration',
        'id',
        $BdID
      );

      // unlink('uploads/merchant/' .  $data[0]['shop_act']);
      // unlink('uploads/merchant/' .  $data[0]['shop_pan']);
      // unlink('uploads/merchant/' .  $data[0]['shop_adhar']);
      // unlink('uploads/merchant/' .  $data[0]['shop_adhar_back']);
      // unlink('uploads/merchant/' .  $data[0]['shop_gst']);
      // unlink('uploads/merchant/' .  $data[0]['shop_img']);
      // unlink('uploads/merchant/' .  $data[0]['m_pan']);

      // unlink('uploads/merchant/' .  $data[0]['m_adhar']);
      // unlink('uploads/merchant/' .  $data[0]['m_aadhar_back']);
      // unlink('uploads/merchant/' .  $data[0]['m_photo']);

      $delete = $this->CommonModal->updateRowById(
        'tbl_merchant_registration',
        'id',
        $BdID,
        ['mstatus' => '1']
      );
      redirect('admin_Dashboard/merchant/');

      // exit;
    }

    $this->load->view('admin/merchant', $data);
  }
  public function merchant_details($id = true)
  {
    $id = decryptId($id);
    $data['mar'] = $this->CommonModal->getRowById(
      'tbl_merchant_registration',
      'id',
      $id
    );
    $data['city'] = $this->CommonModal->getRowById(
      'tbl_cities',
      'id',
      $data['mar'][0]['city']
    );
    $data['state'] = $this->CommonModal->getRowById(
      'tbl_state',
      'state_id',
      $data['mar'][0]['state']
    );
    $data['documents'] = $this->CommonModal->getRowById(
      'tbl_merchant_documents',
      'merchant_id',
      $id
    );
    $data['title'] = '' . $data['mar'][0]['shop_name'] . ' Details';
    $this->load->view('admin/merchant_details', $data);
  }

  public function merchant_add()
  {
    $data['title'] = 'Merchant';
    $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');

    if (count($_POST) > 0) {
      $post = $this->input->post();
      $post['m_photo'] = imageUpload('m_photo', 'uploads/merchant/');
      $password = substr($post['shop_name'], 0, 3) . substr($post['number'], 0, 3);
      $pass = str_replace(' ', '', $password);
      $post['password'] = encryptId($pass);
      $post_data = $post;
      unset($post_data['document_title']);
      $insert = $this->CommonModal->insertRowReturnId(
        'tbl_merchant_registration',
        $post_data
      );
      $document_file = count($_FILES['document_file']);
      for ($i = 0; $i <= $document_file; $i++) {
        $no = rand();
        if (!empty($_FILES["document_file"]["name"][$i])) {
          $folder = "uploads/merchant/documents/";
          move_uploaded_file(
            $_FILES["document_file"]["tmp_name"][$i],
            "$folder" . $no . $_FILES["document_file"]["name"][$i]
          );
          $file_name1 = $no . $_FILES["document_file"]["name"][$i];
          $doc = $this->CommonModal->insertRowReturnId(
            'tbl_merchant_documents',
            [
              'merchant_id' => $insert,
              'document_link' => $file_name1,
              'document_title' => $_POST["document_title"][$i],
            ]
          );
        }
      }
      if ($insert) {

        $session = $this->session->set_userdata([
          'login_mail_id' => $post['email'],
          'login_password' => $pass,
        ]);

        $this->session->set_flashdata('msg', 'Merchant  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url() . 'admin_Dashboard/merchant');
    } else {
      $this->load->view('admin/merchant_add', $data);
    }
  }

  public function mail_confirmation()
  {
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $message = donormail($post['number'], $post['password']);
      sendmail(
        $post['email'],
        'Registered with Srimitra | Welcome Merchant',
        $message
      );
      $this->session->set_flashdata('msg', 'Welcome mail sended to Merchant');
      $this->session->set_flashdata('msg_class', 'alert-success');
      $this->session->unset_userdata('login_mail_id');
      redirect('admin_Dashboard/merchant/');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Something went wrong Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
      $this->session->unset_userdata('login_mail_id');
    }
    redirect('admin_Dashboard/merchant/');
  }

  public function merchant_edit($id = true)
  {
    $data['title'] = 'Merchant';
    $id = decryptId($id);
    $data['state_list'] = $this->CommonModal->getAllRows('tbl_state');
    $data['march'] = $this->CommonModal->getRowById(
      'tbl_merchant_registration',
      'id',
      $id
    );
    $data['city'] = $this->CommonModal->getRowById(
      'tbl_cities',
      'id',
      $data['march'][0]['city']
    );
    $data['documents'] = $this->CommonModal->getRowById(
      'tbl_merchant_documents',
      'merchant_id',
      $id
    );

    if (count($_POST) > 0) {
      // print_r($_POST);

      $post = $this->input->post();
      $m_photo = $post['m_photo'];
      if ($_FILES['m_photo_temp']['name'] != '') {
        $img8 = imageUpload('m_photo_temp', 'uploads/merchant/');
        $post['m_photo'] = $img8;
        if ($m_photo != "") {
          unlink('uploads/merchant/' . $m_photo);
        }
      }

      $update = $this->CommonModal->updateRowById(
        'tbl_merchant_registration',
        'id',
        $id,
        $post
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Merchant  Edit successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Merchant  Edit successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/merchant');
    } else {
      $this->load->view('admin/merchant_edit', $data);
    }
  }

  public function user_registration()
  {
    $data['user'] = $this->CommonModal->getAllRowsInOrder(
      'tbl_user',
      'uid',
      'desc'
    );
    $data['title'] = 'User Registration';

    $BdID = $this->input->get('BdID');

    if ($BdID != '') {
      $data = $this->CommonModal->getRowById('tbl_user', 'uid', $BdID);
      unlink('uploads/user/' . $data[0]['img']);
      $delete = $this->CommonModal->deleteRowById('tbl_user', ['uid' => $BdID]);
      redirect('admin_Dashboard/user_registration/');
      exit();
    }

    $this->load->view('admin/user-registration', $data);
  }

  // public function user_add()
  // {

  //     $data['title'] = 'User';
  //     if (count($_POST) > 0) {
  //         print_r($_POST);

  //         $post = $this->input->post();
  //         $post['img'] = imageUpload('img', 'uploads/user/');

  //         $insert = $this->Dashboard_model->insertdata('tbl_user', $post);

  //         if ($insert) {
  //             $this->session->set_flashdata('msg', 'User  Added successfully');
  //             $this->session->set_flashdata('msg_class', 'alert-success');
  //         } else {
  //             $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
  //             $this->session->set_flashdata('msg_class', 'alert-danger');
  //         }
  //         redirect(base_url() . 'admin_Dashboard/user_registration');
  //     } else {
  //         $this->load->view('admin/user_add', $data);
  //     }
  // }

  public function user_edit($id = true)
  {
    $data['title'] = 'User';
    $id = decryptId($id);
    $data['user'] = $this->CommonModal->getRowById('tbl_user', 'uid ', $id);

    if (count($_POST) > 0) {
      print_r($_POST);

      $post = $this->input->post();
      $img = $post['img'];
      if ($_FILES['img_temp']['name'] != '') {
        $img = imageUpload('img_temp', 'uploads/user/');
        $post['img'] = $img;
        if ($img != "") {
          unlink('uploads/user/' . $img);
        }
      }

      $update = $this->CommonModal->updateRowById(
        'tbl_user',
        'uid ',
        $id,
        $post
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'User  Edit successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'User  Edit successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/user_registration');
    } else {
      $this->load->view('admin/user_edit', $data);
    }
  }

  public function getcity()
  {
    $state = $this->input->post('state');
    $data['city'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_cities',
      ['state_id' => $state],
      'name',
      'asc'
    );
    $this->load->view('admin/dropdown', $data);
  }

  public function getcontact()
  {
    $contact = $this->input->post('contact');
    $count = $this->CommonModal->getNumRows('tbl_merchant_registration', [
      'number' => $contact,
    ]);
    if ($count > 0) {
      echo 'Contact no. already registered';
    } else {
      echo ' ';
    }
  }

  public function disable()
  {
    $id = $this->uri->segment(3);
    $table = $this->uri->segment(4);
    $status = $this->uri->segment(5);

    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if ($table == 'category') {
      $this->CommonModal->updateRowById($table, 'category_id', $id, [
        'status' => $status,
      ]);
      redirect(base_url('admin_Dashboard/view_category'));
    }
    if ($table == 'sub_category') {
      $this->CommonModal->updateRowById($table, 'sub_category_id', $id, [
        'status' => $status,
      ]);
      redirect(base_url('admin_Dashboard/'));
    }
    if ($table == 'promocode') {
      $this->CommonModal->updateRowById($table, 'pid', $id, [
        'status' => $status,
      ]);
      redirect(base_url('admin_Dashboard/promocode'));
    }
    if ($table == 'products') {
      $this->CommonModal->updateRowById($table, 'product_id', $id, [
        'status' => $status,
      ]);
      redirect(base_url('admin_Dashboard/view_products'));
    }
  }
  public function approved()
  {
    $id = $this->uri->segment(3);
    $table = $this->uri->segment(4);
    $status = $this->uri->segment(5);
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if ($table == 'products') {
      $this->CommonModal->updateRowById($table, 'product_id', $id, [
        'approved' => $status,
      ]);
      redirect(base_url('admin_Dashboard/view_products'));
    }
  }
  public function view_category()
  {
    $table = "category";
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Product Category';
    $data['category'] = $this->Dashboard_model->fetchall($table);
    $data['subcategory'] = $this->Dashboard_model->fetchall('sub_category');
    $this->load->view('admin/view_category', $data);
  }
  public function view_unit()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Product Unit';
    $data['quantity'] = $this->CommonModal->getAllRows('tbl_quantity_type');
    $this->load->view('admin/view_unit', $data);
  }

  public function add_category()
  {
    $data['title'] = ' Product  Category';
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $this->load->view('admin/add_category', $data);
  }

  public function addcategory()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (isset($_POST['submit'])) {
      $cat_name = $this->input->post('cat_name');
      $file_name = imageUpload('image', 'uploads/category/');
      $table = "category";
      $data = ['cat_name' => $cat_name, 'image' => $file_name];
      if ($this->Dashboard_model->insertdata($table, $data)) {
        $this->session->set_flashdata('msg', 'Category Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Soemthing went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }

      redirect(base_url('admin_Dashboard/view_category'));
    } else {
      redirect(base_url('admin_Dashboard/add_category'));
    }
  }
  public function addunit()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if (
      $this->CommonModal->insertRow('tbl_quantity_type', $this->input->post())
    ) {
      $this->session->set_flashdata('msg', 'Unit added successfully');
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Soemthing went wrong Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }

    redirect(base_url('admin_Dashboard/view_unit'));
  }

  public function edit_category($category_id = true)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = ' Products Category';
    $data['categoryInfo'] = $this->Dashboard_model->get_category_Info(
      $category_id
    );
    $this->load->view('admin/edit_category', $data);
  }

  public function deletecategory($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $table = "category";

    $data = $this->CommonModal->getRowById('category', 'category_id', $id);

    if (file_exists("./uploads/category/' . $data[0]['image']")) {
      unlink('./uploads/category/' . $data[0]['image']);
    }

    if ($this->CommonModal->deleteRowById($table, ['category_id' => $id])) {
      $this->session->set_flashdata('msg', 'Category deleted successfully');
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Category not Delete Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }

    redirect('admin_Dashboard/view_category');
  }
  public function deletesub($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if ($this->CommonModal->deleteRowById('tbl_suscribers', ['id' => $id])) {
      $this->session->set_flashdata(
        'msg',
        'Subscriber name deleted successfully'
      );
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Subscriber name not Delete Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }
    redirect('admin_Dashboard/view_subscribed_user');
  }
  public function deletequantity_type($id)
  {
    if (
      $this->CommonModal->deleteRowById('tbl_quantity_type', [
        'quantity_type_id' => $id,
      ])
    ) {
      $this->session->set_flashdata('msg', 'Unit deleted successfully');
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Unit not Delete Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }

    redirect('admin_Dashboard/view_unit');
  }

  public function view_subcategory()
  {
    $table = "sub_category";
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Product Sub Category';
    $data['category'] = $this->Dashboard_model->fetchall('sub_category');
    $this->load->view('admin/view_subcategory', $data);
  }

  public function add_subcategory()
  {
    $data['title'] = 'Product Sub Category';
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['category'] = $this->CommonModal->getAllRows('category');
    $this->load->view('admin/add_subcategory', $data);
  }

  public function addsubcategory()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (isset($_POST['submit'])) {
      $cat_id = $this->input->post('cat_id');
      $subcat_name = $this->input->post('subcat_name');

      $file_name = imageUpload('image', 'uploads/subcategory/');

      $table = "sub_category";
      $data = [
        'cat_id' => $cat_id,
        'subcat_name' => $subcat_name,
        'image' => $file_name,
      ];
      if ($this->Dashboard_model->insertdata($table, $data)) {
        $this->session->set_flashdata('msg', 'Subcategory Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Soemthing went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url('admin_Dashboard/view_category'));
    } else {
      redirect(base_url('admin_Dashboard/view_category'));
    }
  }

  public function editcategory()
  {
    $table = "category";
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (isset($_POST['submit'])) {
      $id = $this->input->post('id');
      $cat_name = $this->input->post('cat_name');

      $no = rand();
      if ($_FILES["image"]["name"] == "") {
        $this->db->select("*");
        $this->db->where('category_id', $id);
        $query = $this->db->get($table);
        $result = $query->row();
        $file_name = $result->image;
      } else {
        $uploadfile = $_FILES["image"]["tmp_name"];
        $folder = "uploads/category/";
        move_uploaded_file(
          $_FILES["image"]["tmp_name"],
          "$folder" . $no . $_FILES["image"]["name"]
        );
        $file_name = $no . $_FILES["image"]["name"];
      }
      $data = ['cat_name' => $cat_name, 'image' => $file_name];

      $update = $this->CommonModal->updateRowById(
        $table,
        'category_id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Category Update successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Category Update successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }

      redirect(base_url() . 'admin_Dashboard/view_category');
    } else {
      redirect(base_url() . 'admin_Dashboard/edit_category');
    }
  }
  public function edit_subcategory($category_id = true)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Products Sub category';
    $data['categoryInfo'] = $this->CommonModal->getRowById(
      'sub_category',
      'sub_category_id',
      $category_id
    );
    $data['category'] = $this->CommonModal->getAllRows('category');
    $this->load->view('admin/edit_subcategory', $data);
  }

  public function editsubcategory()
  {
    $table = "sub_category";
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (isset($_POST['submit'])) {
      $id = $this->input->post('id');
      $cat_id = $this->input->post('cat_id');
      $subcat_name = $this->input->post('subcat_name');

      $no = rand();
      if ($_FILES["image"]["name"] == "") {
        $this->db->select("*");
        $this->db->where('sub_category_id', $id);
        $query = $this->db->get($table);
        $result = $query->row();
        $file_name = $result->image;
      } else {
        $uploadfile = $_FILES["image"]["tmp_name"];
        $folder = "uploads/subcategory/";
        move_uploaded_file(
          $_FILES["image"]["tmp_name"],
          "$folder" . $no . $_FILES["image"]["name"]
        );
        $file_name = $no . $_FILES["image"]["name"];
      }

      $data = ['subcat_name' => $subcat_name, 'image' => $file_name];

      $update = $this->CommonModal->updateRowById(
        $table,
        'sub_category_id',
        $id,
        $data
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Category Update successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata('msg', 'Category Update successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/view_category');
    } else {
      redirect(base_url() . 'admin_Dashboard/edit_subcategory');
    }
  }

  public function deletesubcategory($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $table = "sub_category";
    $data = $this->CommonModal->getRowById(
      'sub_category',
      'sub_category_id',
      $id
    );

    if (file_exists("./uploads/subcategory/' . $data[0]['image']")) {
      unlink('./uploads/subcategory/' . $data[0]['image']);
    }

    if ($this->CommonModal->deleteRowById($table, ['sub_category_id' => $id])) {
      $this->session->set_flashdata('msg', 'Subcategory deleted successfully');
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Category not Delete Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }
    redirect('admin_Dashboard/view_category');
  }

  public function view_products()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'Products';
    $data['products'] = $this->CommonModal->getRowByMoreId('products', [
      'approved' => '0',
      'is_delete' => '0',
    ]);

    $this->load->view('admin/view_products', $data);
  }

  public function not_approved_products()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'Products';
    $data['products'] = $this->CommonModal->getRowByMoreId('products', [
      'approved' => '1',
      'is_delete' => '0',
    ]);
    $data['unapproved_products'] = $this->CommonModal->getRowByMoreId(
      'merchant_products',
      [
        'approved' => '0',
      ]
    );

    $this->load->view('admin/not_approved_products', $data);
  }

  public function get_subcategory()
  {
    $category_id = $_POST['category_id'];
    $data = $this->CommonModal->getRowById(
      'sub_category',
      'cat_id',
      $category_id
    );
    echo '<option>Select Product Sub Category</option>';
    foreach ($data as $da) {
      echo '<option value="' .
        $da['sub_category_id'] .
        '">' .
        $da['subcat_name'] .
        '</option>';
    }
  }
  public function add_products()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Add Product';
    $table = "category";
    $data['category'] = $this->Dashboard_model->fetchall($table);
    $data['merchant'] = $this->CommonModal->getAllRows(
      'tbl_merchant_registration'
    );
    $this->load->view('admin/add_products', $data);
  }
  public function import_products()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Import Product';
    $table = "category";
    $data['category'] = $this->Dashboard_model->fetchall($table);
    $this->load->view('admin/import_products', $data);
  }

  public function importdata()
  {
    $file = $_FILES['img']['tmp_name'];
    $post['category_id'] = $this->input->post('category_id');
    $post['subcategory_id'] = $this->input->post('subcategory_id');
    // print_r($_POST);
    // print_r($_FILES);
    $handle = fopen($file, "r");
    $c = 0;
    $msg = 'Saved List - <br>';
    while (($filesop = fgetcsv($handle, 1000)) !== false) {
      $post = [];
      $post['category_id'] = $this->input->post('category_id');
      $post['subcategory_id'] = $this->input->post('subcategory_id');
      $post['pro_name'] = $filesop[0];
      $post['quantity'] = $filesop[1];
      $post['quantity_type'] = $filesop[2];
      $post['price'] = $filesop[3];
      $post['old_price'] = $filesop[4];

      if ($c != 0) {
        if ($post['pro_name'] != '') {
          // print_r($post);
          $this->CommonModal->insertRowReturnId('products', $post);
          $msg .= '<br>' . $post['pro_name'];
        }
      }
      $c = $c + 1;
    }

    $this->session->userdata('msg', $msg);
    redirect(base_url() . 'admin_Dashboard/view_products');
  }

  public function view_gallery()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'Gallery';
    $data['gallery'] = $this->CommonModal->getAllRows('gallery');

    $this->load->view('admin/view_gallery', $data);
  }

  public function add_gallery()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Add Gallery';
    $table = "gallery";
    $data['gallery'] = $this->Dashboard_model->fetchall($table);

    $this->load->view('admin/add_gallery', $data);
  }
  public function occasion()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = '  Occasion';
    $data['occassion'] = $this->CommonModal->getAllRows('tbl_occassion');
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $occasionId = $this->CommonModal->insertRowReturnId(
        'tbl_occassion',
        $post
      );
      if ($occasionId) {
        $this->session->set_flashdata('msg', 'Occasion  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url() . 'admin_Dashboard/occasion');
    }
    $this->load->view('admin/occasion', $data);
  }

  public function document()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Document name';
    $data['occassion'] = $this->CommonModal->getAllRows('tbl_documents');
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $documentId = $this->CommonModal->insertRowReturnId(
        'tbl_documents',
        $post
      );
      if ($documentId) {
        $this->session->set_flashdata('msg', 'Document  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url() . 'admin_Dashboard/document');
    }
    $this->load->view('admin/document', $data);
  }

  public function deleteoccasion($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $this->CommonModal->deleteRowById('tbl_occassion', ['occ_id' => $id]);
    redirect('admin_Dashboard/occasion');
  }
  public function deletedocument($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $this->CommonModal->deleteRowById('tbl_documents', ['id' => $id]);
    redirect('admin_Dashboard/document');
  }

  public function budget()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = '  budget';
    $data['budget'] = $this->CommonModal->getAllRows('tbl_budget');
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $budgetId = $this->CommonModal->insertRowReturnId('tbl_budget', $post);
      if ($budgetId) {
        $this->session->set_flashdata('msg', 'budget  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }
      redirect(base_url() . 'admin_Dashboard/budget');
    }
    $this->load->view('admin/budget', $data);
  }

  public function deletebudget($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $this->CommonModal->deleteRowById('tbl_budget', ['budget_id' => $id]);
    redirect('admin_Dashboard/budget');
  }
  public function addgallery()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $post['image'] = imageUpload('img', 'uploads/gallery/');
      $galleryId = $this->CommonModal->insertRowReturnId('gallery', $post);
      if ($galleryId) {
        $this->session->set_flashdata('msg', 'Gallery  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }

      redirect(base_url() . 'admin_Dashboard/view_gallery');
    } else {
      redirect(base_url() . 'admin_Dashboard/add_gallery');
    }
  }

  public function edit_gallery($gallery_id = true)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Edit Gallery';
    $data['gallery'] = $this->Dashboard_model->get_productss($gallery_id);
    $data['gallery'] = $this->Dashboard_model->fetchall('gallery');
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $img = $post['image'];
      if ($_FILES['image']['tittle'] != '') {
        $imge = imageUpload('image', 'uploads/gallery/');
        $post['image'] = $img;
        if ($img != "") {
          unlink('uploads/gallery/' . $img);
        }
      }
      $update = $this->Dashboard_model->update_products_data(
        'gallery',
        $post,
        $gallery_id
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Gallery Update Successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/view_gallery');
    } else {
      $this->load->view('admin/edit_gallery', $data);
    }
  }

  public function deletegallery($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $table = "gallery";
    $this->CommonModal->deleteRowById($table, ['id' => $id]);
    redirect('admin_Dashboard/view_gallery');
  }

  public function addproducts()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    if (count($_POST) > 0) {
      $post = $this->input->post();
      // // print_r($_FILES['img']);
      // echo '<pre>';
      // $count = count($_FILES['img']['name']);
      // for ($i = 0; $i < $count; $i++) {
      //     if (!empty($_FILES['img']['name'][$i])) {
      //         $_FILES['file']['name'] = $_FILES['img']['name'][$i];
      //         $_FILES['file']['type'] = $_FILES['img']['type'][$i];
      //         $_FILES['file']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
      //         $_FILES['file']['error'] = $_FILES['img']['error'][$i];
      //         $_FILES['file']['size'] = $_FILES['img']['size'][$i];

      //         $config['upload_path'] = 'uploads/products/';
      //         $config['file_name'] = $_FILES['img']['name'][$i];
      //         $this->load->library('upload', $config);
      //         print_r($this->upload);
      //         if ($this->upload->do_upload('file')) {
      //             print_r($this->upload->data());
      //             $uploadData = $this->upload->data();
      //             $filename = $uploadData['file_name'];
      //             $data['totalFiles'][] = $filename;
      //         }else{
      //             echo $this->upload->display_errors();
      //         }
      //     }
      // }
      // $post['img'] = implode(', ',$data['totalFiles']);
      // print_r($data['totalFiles']);
      $post['img'] = imageUpload('img', 'uploads/products/');
      $productId = $this->CommonModal->insertRowReturnId('products', $post);
      if ($productId) {
        $this->session->set_flashdata('msg', 'Product  Added successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      } else {
        $this->session->set_flashdata(
          'msg',
          'Something went wrong Please try again!!'
        );
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }

      redirect(base_url() . 'admin_Dashboard/view_products');
    } else {
      redirect(base_url() . 'admin_Dashboard/add_products');
    }
  }

  public function edit_products($product_id = true)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Edit Products';
    $data['productInfo'] = $this->Dashboard_model->get_productss($product_id);
    $data['category'] = $this->Dashboard_model->fetchall('category');
    if (count($_POST) > 0) {
      $post = $this->input->post();
      $img = $post['img'];
      if ($_FILES['img_temp']['name'] != '') {
        $imge = imageUpload('img_temp', 'uploads/products/');
        $post['img'] = $imge;
        if ($imge != "") {
          unlink('uploads/products/' . $img);
        }
      }
      $update = $this->Dashboard_model->update_products_data(
        'products',
        $post,
        $product_id
      );
      if ($update) {
        $this->session->set_flashdata('msg', 'Product Update Successfully');
        $this->session->set_flashdata('msg_class', 'alert-success');
      }
      redirect(base_url() . 'admin_Dashboard/view_products');
    } else {
      $this->load->view('admin/edit_products', $data);
    }
  }
  public function deleteproducts($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $table = "products";
    // $this->Dashboard_model->deleteproducts($table, $id);
    $this->CommonModal->updateRowById('products', 'product_id', $id, [
      'is_delete' => '1',
    ]);
    redirect('admin_Dashboard/view_products');
  }
  public function productOnSale()
  {
    $sale = $this->input->post('sale');
    $pid = $this->input->post('pid');
    $this->CommonModal->updateRowById('products', 'product_id', $pid, [
      'sale' => $sale,
      'is_delete' => '0',
    ]);
  }
  public function featuredProduct()
  {
    $featured = $this->input->post('featured');
    $pid = $this->input->post('pid');
    $this->CommonModal->updateRowById('products', 'product_id', $pid, [
      'featured' => $featured,
      'is_delete' => '0',
    ]);
  }
  public function child_care_home_order_list($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'CCH Order ';
    $decrypt_id = decryptId($id);
    $data['request'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_orphange_order',
      ['orphan_id' => $decrypt_id],
      'oid',
      'DESC'
    );
    $this->load->view('admin/request', $data);
  }
  public function edit_order_request($oid = null)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = "Update order request";
    $data['products'] = $this->CommonModal->getRowById(
      'products',
      'is_delete',
      '0'
    );
    $data['order'] = $this->CommonModal->getRowById(
      'tbl_orphange_order',
      'oid',
      decryptId($oid)
    );

    if (count($_POST) > 0) {
      $product = $this->input->post('product');
      $quantity = $this->input->post('quantity');
      $orderpro = $this->input->post('orderpro');
      $requestid = $this->input->post('requestid');

      $timestamp = time();
      // $requestid = $this->CommonModal->insertRowReturnId('tbl_orphange_order',  array('timestamp' => $timestamp, 'orphan_id' => sessionId('oid')));
      $msg = [];
      for ($j = 0; $j < count($product); $j++) {
        if ($product[$j] != '') {
          if ($orderpro[$j] != '') {
            $data = [
              'product' => $product[$j],
              'quantity' => abs($quantity[$j]),
            ];
            $request_product = $this->CommonModal->updateRowById(
              'tbl_orphange_order_product',
              'id',
              $orderpro[$j],
              $data
            );
          } else {
            $data = [
              'o_id' => $requestid,
              'product' => $product[$j],
              'quantity' => abs($quantity[$j]),
            ];
            $request_product = $this->CommonModal->insertRowReturnId(
              'tbl_orphange_order_product',
              $data
            );
          }

          if ($request_product != '') {
            array_push($msg, 'true');
          } else {
            array_push($msg, 'false');
          }
        }
      }
      if (array_search('false', $msg)) {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-danger">We are facing technical error ,in some part.</div>'
        );
      } else {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-success">Your request is successfully submit. We will contact you as soon as possible.</div>'
        );
      }
      redirect(base_url('admin_Dashboard/new_request'));
    }
    $this->load->view('admin/edit_order_request', $data);
  }
  public function reject_request()
  {
    if (count($_POST) > 0) {
      $reason = $this->input->post('reason');
      $oid = $this->input->post('oid');
      $requestid = $this->CommonModal->updateRowById(
        'tbl_orphange_order',
        'oid',
        $oid,
        ['reason' => $reason, 'status' => '2']
      );

      if ($requestid) {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-success">Request Rejected successfully</div>'
        );
      } else {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-danger">Try again later</div>'
        );
      }
      redirect(base_url('admin_Dashboard/rejected_request'));
    }
  }
  public function new_request()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'New Request';
    $data['request'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_orphange_order',
      ['status' => '0'],
      'oid',
      'DESC'
    );
    $this->load->view('admin/request', $data);
  }
  public function approved_request()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'New Request';
    $data['request'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_orphange_order',
      ['status' => '1'],
      'oid',
      'DESC'
    );
    $this->load->view('admin/request', $data);
  }
  public function rejected_request()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'New Request';
    $data['request'] = $this->CommonModal->getRowByIdInOrder(
      'tbl_orphange_order',
      ['status' => '2'],
      'oid',
      'DESC'
    );
    $this->load->view('admin/request', $data);
  }
  public function merchant_order_info($mid = null)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Merchant Order details';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['merchant_id' => decryptId($mid)],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function user_order_info($uid = null)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'User Order details';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['user_id' => decryptId($uid)],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function new_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'New / approved / Inprocess donations';
    // $data['donation'] = $this->CommonModal->getRowByOr('checkout',  array('status' => '1','chechout_status' => '3'),array('status' => '0'));
    $data['donation'] = $this->CommonModal->runQuery(
      "SELECT * FROM `checkout` WHERE `chechout_status` = '3' OR `chechout_status` = '1'  OR  `chechout_status` = '0' OR  `chechout_status` = '4'  ORDER BY `id` DESC"
    );

    $this->load->view('admin/donation', $data);
  }
  public function approved_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Approved donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '1'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function rejected_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Rejected donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '2'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function donation_view($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = ' Donation Details';
    $data['donation'] = $this->CommonModal->getSingleRowById('checkout', [
      'id' => $id,
    ]);
    $data['donation_product'] = $this->CommonModal->getSingleRowById(
      'checkout_product',
      [
        'checkoutid' => $id,
      ]
    );
    // $data['donation_product'] = $this->CommonModal->getSingleRowById('checkout_product', array('checkoutid' => $id));
    $this->load->view('admin/donation_view', $data);
  }
  public function onprogress_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'On progress donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '1', 'chechout_status' => '3'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function restocking_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'On progress donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '1', 'chechout_status' => '4'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function completed_by_merchant_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Completed donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '1', 'chechout_status' => '5'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function completed_donation()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Completed donation';
    $data['donation'] = $this->CommonModal->getRowByIdInOrder(
      'checkout',
      ['status' => '1', 'chechout_status' => '6'],
      'id',
      'DESC'
    );
    $this->load->view('admin/donation', $data);
  }
  public function uploadcertificate()
  {
    if (count($_POST) > 0) {
      $checkout_id = $this->input->post('checkout_id');
      $email = $this->input->post('email');

      if (!empty($_FILES["cert"]["name"])) {
        $folder = "uploads/orphange/gallery/";
        $certificate = imageUpload('cert', "uploads/certificate/");
        $r = $this->CommonModal->updateRowById('checkout', 'id', $checkout_id, [
          'certificate' => $certificate,
          'update_date' => time(),
        ]);
      }

      $message = taxBenefitMail();
      sendmail(
        $email,
        'Infromation about Tax Benefit Certificate | Srimitra',
        $message
      );

      redirect(base_url('admin_Dashboard/completed_donation'));
    }
  }
  public function addOnData()
  {
    $id = $this->input->get('id');
    if (isset($id)) {
      $data['data'] = $this->CommonModal->getSingleRowById(
        'tbl_add_on_data',
        "id = '" . decryptId($id) . "'"
      );
      $data['title'] = '' . $data['data']['title'];
      $this->load->view('admin/add_on_data_view', $data);
    } else {
      $data['title'] = 'View Data';
      $data['all_data'] = $this->CommonModal->getAllRows('tbl_add_on_data');
      $this->load->view('admin/add_on_data', $data);
    }
  }

  public function addOnDataAdd()
  {
    extract($this->input->post());
    $id = $this->input->get('id');
    $decrypt_id = decryptId($this->input->get('id'));
    $data = $this->CommonModal->getSingleRowById(
      'tbl_add_on_data',
      "id = '$decrypt_id'"
    );
    $data['title_data'] =
      set_value('title') == false ? @$data['title'] : set_value('title');
    $data['description'] =
      set_value('description') == false
      ? @$data['description']
      : set_value('description');
    if (isset($id)) {
      $data['title'] = 'Edit ' . $data['title'];
    } else {
      $data['title'] = 'Add Category';
    }

    if (count($_POST) > 0) {
      $post['title'] = trim($title);
      $post['description'] = trim($description);
      if (isset($id)) {
        $post['update_date'] = setDateTime();
        $update = $this->CommonModal->updateRowByIdWithOutXss(
          'tbl_add_on_data',
          "id = '$decrypt_id'",
          $post
        );
        if ($update) {
          flashData('errors', 'Data Update Successfully');
        } else {
          flashData('errors', 'Data Not Add');
        }
      }
      redirect('admin_Dashboard/addOnData');
    }
    $this->load->view('admin/add_on_data_add', $data);
  }
  public function view_subscribed_user()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Subscriber list';
    $data['suscribers'] = $this->CommonModal->getAllRows('tbl_suscribers');
    $this->load->view('admin/suscribers', $data);
  }

  public function add_request_template()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = ' Order request template';
    $data['cch'] = $this->CommonModal->getAllRows('tbl_orphanage');
    $data['product'] = $this->CommonModal->getRowByMoreId('merchant_products', array('approved' => '1', 'is_delete' => '0'));
    if (count($_POST) > 0) {
      $postdata['date'] = $this->input->post('date');
      $postdata['product_title'] = $this->input->post('product_title');
      $postdata['combo_price'] = $this->input->post('combo_price');
      $postdata['cover'] = imageUpload('cover', 'uploads/ordercover/');
      $postdata['cch_id_list'] = json_encode($this->input->post('cch'));
      $postdata['timestamp'] = time();
      $requestid = $this->CommonModal->insertRowReturnId(
        'order_request_template',
        $postdata
      );

      $product = $this->input->post('product');
      $quantity = $this->input->post('quantity');

      $msg = [];
      $product_arr = [];
      $cch_arr = [];

      for ($j = 0; $j < count($product); $j++) {
        if ($product[$j] != '') {
          $data = [
            'ort_id' => $requestid,
            'product' => $product[$j],
            'quantity' => $quantity[$j],
          ];
          $request_product = $this->CommonModal->insertRowReturnId(
            'order_request_template_product',
            $data
          );
          if ($request_product != '') {
            array_push($msg, 'true');
          } else {
            array_push($msg, 'false');
          }
        }
      }

      if (array_search('false', $msg)) {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-danger">We are facing technical error ,in some part.</div>'
        );
      } else {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-success">Your request is successfully submit. We will contact you as soon as possible.</div>'
        );
      }
      redirect(base_url('admin_Dashboard/view_request_template'));
    }
    $this->load->view('admin/add_request_template', $data);
  }
  public function view_request_template()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Order Request Template';
    $data['request'] = $this->CommonModal->getAllRows('order_request_template');
    $this->load->view('admin/request_template', $data);
  }
  public function edit_order_request_template($ortid = null)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = "Update order request";
    $data['product'] = $this->CommonModal->getRowByMoreId('merchant_products', array('approved' => '1', 'is_delete' => '0'));

    $data['order'] = $this->CommonModal->getRowById(
      'order_request_template',
      'ortid',
      decryptId($ortid)
    );
    $data['cch'] = $this->CommonModal->getAllRows('tbl_orphanage');
    if (count($_POST) > 0) {
      $postdata['date'] = $this->input->post('date');
      $postdata['product_title'] = $this->input->post('product_title');
      $postdata['combo_price'] = $this->input->post('combo_price');
      $postdata['cch_id_list'] = json_encode($this->input->post('cch'));
      if ($_FILES['cover']['name'] != '') {
        $img = imageUpload('cover', 'uploads/ordercover/');
        $postdata['cover'] = $img;
        if ($data['order']['cover'] != "") {
          unlink('uploads/ordercover/' . $data['order']['cover']);
        }
      }
      $requestid = $this->CommonModal->updateRowById(
        'order_request_template',
        'ortid',
        decryptId($ortid),
        $postdata
      );
      $msg = [];
      $product = $this->input->post('product');
      $quantity = $this->input->post('quantity');
      $orderpro = $this->input->post('orderpro');
      echo '<pre>';
      print_r($_POST);
      exit();
      for ($j = 0; $j < count($product); $j++) {
        if ($product[$j] != '') {
          if ($orderpro[$j] != '') {
            $data = ['product' => $product[$j], 'quantity' => $quantity[$j]];
            $request_product = $this->CommonModal->updateRowById(
              'order_request_template_product',
              'id',
              $orderpro[$j],
              $data
            );
          } else {
            $data = [
              'ort_id' => $requestid,
              'product' => $product[$j],
              'quantity' => $quantity[$j],
            ];
            $request_product = $this->CommonModal->insertRowReturnId(
              'order_request_template_product',
              $data
            );
          }

          if ($request_product != '') {
            array_push($msg, 'true');
          } else {
            array_push($msg, 'false');
          }
        }
      }
      if (array_search('false', $msg)) {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-danger">We are facing technical error ,in some part.</div>'
        );
      } else {
        $this->session->set_userdata(
          'msg',
          '<div class="alert alert-success">Your request is successfully submit. We will contact you as soon as possible.</div>'
        );
      }
      redirect(base_url('admin_Dashboard/view_request_template'));
    }
    $this->load->view('admin/edit_order_request_template', $data);
  }
  public function change_password()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = "Change password";
    if (count($_POST) > 0) {
      $oldpassword = $this->input->post('oldpassword');
      $password = $this->input->post('password');
      $confirmpassword = $this->input->post('confirmpassword');
      $profile = $this->CommonModal->getsingleRowById('tbl_admin', [
        'admin_id' => sessionId('admin_id'),
      ]);
      if ($profile['password'] == $oldpassword) {
        if ($password == $confirmpassword) {
          $update = $this->CommonModal->updateRowById(
            'tbl_admin',
            'admin_id',
            sessionId('admin_id'),
            ['password' => $password]
          );
          if ($update) {
            $this->session->set_flashdata(
              'msg',
              'Password Changed Successfully'
            );
            $this->session->set_flashdata('msg_class', 'alert-success');
          } else {
            $this->session->set_flashdata(
              'msg',
              'Password not changed , try again later'
            );
            $this->session->set_flashdata('msg_class', 'alert-danger');
          }
        } else {
          $this->session->set_flashdata(
            'msg',
            'Password and confirm password doesnt matched.'
          );
          $this->session->set_flashdata('msg_class', 'alert-danger');
        }
      } else {
        $this->session->set_flashdata('msg', 'Old password doesnt matched');
        $this->session->set_flashdata('msg_class', 'alert-danger');
      }

      redirect(base_url() . 'admin_Dashboard/change_password');
    } else {
      $this->load->view('admin/change_password', $data);
    }
  }
  public function view_contact()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'Contact Form data';
    $data['contact'] = $this->CommonModal->getAllrows('contact_query');

    $this->load->view('admin/view_contact', $data);
  }
  public function deletecontact($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if ($this->CommonModal->deleteRowById('contact_query', ['id' => $id])) {
      $this->session->set_flashdata(
        'msg',
        'Contact query deleted successfully'
      );
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Contact query is not Deleted Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }
    redirect('admin_Dashboard/view_contact');
  }
  public function view_enquiry()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'Enquiry Form data';
    $data['enquiry'] = $this->CommonModal->getAllrows('enquiry_form');

    $this->load->view('admin/view_enquiry', $data);
  }
  public function deleteenquiry($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if ($this->CommonModal->deleteRowById('enquiry_form', ['id' => $id])) {
      $this->session->set_flashdata(
        'msg',
        'Enquiry form query deleted successfully'
      );
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'Enquiry form query is not Deleted Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }
    redirect('admin_Dashboard/view_enquiry');
  }
  public function view_collabarate()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    $data['title'] = 'collabarate Form data';
    $data['enquiry'] = $this->CommonModal->getAllrows(
      'tbl_collaborate_with_us'
    );

    $this->load->view('admin/view_collabarate', $data);
  }
  public function deletecollabarate($id)
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';

    if (
      $this->CommonModal->deleteRowById('tbl_collaborate_with_us', [
        'cid' => $id,
      ])
    ) {
      $this->session->set_flashdata(
        'msg',
        'collabarate form query deleted successfully'
      );
      $this->session->set_flashdata('msg_class', 'alert-success');
    } else {
      $this->session->set_flashdata(
        'msg',
        'collabarate form query is not Deleted Please try again!!'
      );
      $this->session->set_flashdata('msg_class', 'alert-danger');
    }
    redirect('admin_Dashboard/view_collabarate');
  }
  public function celebrate_with_us()
  {
    $data['favicon'] = base_url() . 'assets/images/favicon.png';
    $data['title'] = 'Celebrate with us';
    $data['events'] = $this->CommonModal->getAllRowsInMultiOrder(
      'checkout_events',
      "'eve_id' 'DESC','status' 'DESC'"
    );

    $this->load->view('admin/celebrate_with_us', $data);
  }

  public function delcchdoc()
  {
    $BdID = $this->input->get('BdID');
    if ($BdID != '') {
      $data = $this->CommonModal->getRowById('tbl_orphanage', 'id', $BdID);

      unlink('uploads/orphange/' . $data[0]['cancel_check']);

      $delete = $this->CommonModal->deleteRowById('tbl_orphanage', [
        'id' => $BdID,
      ]);
      redirect('admin_Dashboard/child_care_home/');
      exit();
    }
  }
}
