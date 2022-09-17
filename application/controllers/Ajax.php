<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    public function index()
    {
    }
    public function statusupdate()
    {
        extract($this->input->post());
        $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $status, 'update_date' => date("Y-m-d H:i:s")));
        redirect(base_url('admin_Dashboard/completed_by_merchant_donation'));
    }
    public function addToCart()
    {
        $product_id = $this->input->post('pid');
        $orphan_id = $this->input->post('oid');
        $qty = $this->input->post('qty');

        $product = $this->CommonModal->getRowById('products', 'product_id', $product_id);

        $data = array(
            'id'      => $product[0]['product_id'],
            'qty'     => $qty,
            'price'   => $product[0]['price'],
            'name'    => $product[0]['pro_name'],
            'orphane'    => $orphan_id,
            'image'    => $product[0]['img'],
        );

        $this->cart->insert($data);
    }
    public function requestStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $st = (($status == 'accept') ? 1 : 2);

        $row = $this->CommonModal->updateRowById('tbl_orphange_order', 'oid', $id, array('status' => $st));
        // print_R($row);
        if ($row) {
            if ($status == 'accept') {
                echo '0';
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }
    public function donationrequestStatus()
    {

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $st = (($status == 'accept') ? 1 : 2);
        $msg_pro = '<table>
                        <th>
                            <td> S.no.</td>
                            <td> Product </td>
                            <td> Qty</td> 
                        </th>';
        $donation = $this->CommonModal->getSingleRowById('checkout', array('id' => $id));
        if ($donation['order_type'] == 0) {
            if ($st == 1) {
                $donation_product = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
                if ($donation_product != '') {
                    foreach ($donation_product as $pro) {
                        $order = $this->CommonModal->getSingleRowById('tbl_orphange_order_product', array('o_id' => $donation['order_request_id'], 'product' => $pro['product_id']));
                        $data_deduction = $this->CommonModal->updateRowById('tbl_orphange_order_product', 'id', $order['id'], array('quantity' => ((int)$order['quantity'] - (int)$pro['product_quantity'])));

                        $productroiw = $this->CommonModal->getSingleRowById('products', array('product_id' => $pro['product_id']));
                        $ij = 1;

                        $msg_pro .= '<tr>
                                        <td>' . $ij . ' </td>
                                        <td> ' . $productroiw['product_name'] . ' </td>
                                        <td> ' . $productroiw['product_quantity'] . '</td>
                                    </tr>';
                    }
                }
            }
        }
        $msg_pro .= '</table>';
        $row = $this->CommonModal->updateRowById('checkout', 'id', $id, array('status' => $st, 'chechout_status' => $st, 'update_date' => date("Y-m-d H:i:s")));
        // print_R($row);
        if ($row) {
            if ($status == 'accept') {
                $cch = getSingleRowById('tbl_orphanage', array('id' => $donation['orphane_id']));
                $merchant = getSingleRowById('tbl_merchant_registration', array('id' => $donation['merchant_id']));
                $message = common_mail_temp('New Order from Srimitra', 'New order received 
                <br>Child care home - ' . $cch['name'] . '<br>Add. ' . $cch['address'] . '.', $msg_pro, 'Quick link - ' . base_url('Merchant/OrderPlacedDetails/' . $id) . ' ',);

                sendmail($merchant['email'], 'New order from Srimitra', $message);
                echo '0';
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }
    public function merchantdonationrequestStatus()
    {

        $id = $this->input->post('id');

        $status = $this->input->post('status');
        $st = (($status == 'deliver') ? 5 : (($status == 'accept') ? 3 : 4));

        $msg_pro = '<table>
                        <th>
                            <td> S.no.</td>
                            <td> Product </td>
                            <td> Qty</td> 
                        </th>';
        $donation = $this->CommonModal->getSingleRowById('checkout', array('id' => $id));
        if ($donation['order_type'] == 0) {
            if ($st == 1) {
                $donation_product = $this->CommonModal->getRowById('checkout_product', 'checkoutid', $id);
                if ($donation_product != '') {
                    foreach ($donation_product as $pro) {
                        $productroiw = $this->CommonModal->getSingleRowById('products', array('product_id' => $pro['product_id']));
                        $ij = 1;
                        $msg_pro .= '<tr>
                                        <td>' . $ij . ' </td>
                                        <td> ' . $productroiw['product_name'] . ' </td>
                                        <td> ' . $productroiw['product_quantity'] . '</td>
                                    </tr>';
                    }
                }
            }
        }
        $msg_pro .= '</table>';

        $row = $this->CommonModal->updateRowById('checkout', 'id', $id, array('chechout_status' => $st, 'update_date' => date("Y-m-d H:i:s")));
        // print_R($row);
        if ($row) {
            if ($status == 'deliver') {
                echo '3';
            } else if ($status == 'accept') {
                $cch = getSingleRowById('tbl_orphanage', array('id' => $donation['orphane_id']));
                $merchant = getSingleRowById('tbl_merchant_registration', array('id' => $donation['merchant_id']));
                $message = common_mail_temp('New Donation from Srimitra', 'New Donation  received 
                <br>Merchant - ' . $merchant['shop_name'] . '<br>.', $msg_pro, 'Quick link - ' . base_url('childcare_homes/OrderPlacedDetails/' . $id) . ' ',);

                sendmail($cch['email'], 'New Donation from Srimitra', $message);
                echo '0';
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }

    public function cchdonationrequestStatus()
    {

        $id = $this->input->post('id');

        $row = $this->CommonModal->updateRowById('checkout', 'id', $id, array('chechout_status' => '6', 'update_date' => date("Y-m-d H:i:s")));

        // print_R($row);
        if ($row) {
            echo '0';
        } else {
            echo '2';
        }
    }
    public function get_subcategory()
    {
        $category_id = $_POST['category_id'];
        $data = $this->CommonModal->getRowById('sub_category', 'cat_id', $category_id);
        echo '<option>Select Product Sub Category</option>';
        foreach ($data as $da) {
            echo '<option value="' . $da['sub_category_id'] . '">' . $da['subcat_name'] . '</option>';
        }
    }

    public function get_template()
    {
        $mode = $_POST['mode'];
        $data = $this->CommonModal->getRowById('tbl_templates', 'send_mode', $mode);

        foreach ($data as $da) {
            echo '<input type="radio" name="templates" value="' . $da['id'] . '" class="templates"/> ' . $da['template'] . ' <br/>';
        }
    }
    public function get_full_template()
    {
        $tem = $_POST['tem'];
        $data = $this->CommonModal->getRowById('tbl_templates', 'id', $tem);
        echo $data[0]['template'];
    }

    public function get_donor_by_status()
    {
        $status = $_POST['status'];
        if ($status == 'All') {
            $donor_data = $this->CommonModal->getAllRows('tbl_orphanage');
        } else {
            $donor_data = $this->CommonModal->getRowById('tbl_orphanage', 'status', $status);
        }

        $i = 1;
        if (!empty($donor_data)) {
            foreach ($donor_data as $donor) {
?>
                <tr id="row<?= $donor['id'] ?>">
                    <td><?= $i ?></td>
                    <td><?= convertDatedmy($donor['create_date']) ?></td>
                    <td>
                        <input type="checkbox" value="<?= $donor['number'] ?>" name="donor_id[]" class="check" checked />
                    </td>
                    <td><?= $donor['name'] ?></td>
                    <td><?= $donor['number'] ?></td>
                    <td><?= $donor['address'] ?></td>

                </tr>
<?php
                $i++;
            }
        }
    }
    public function getcity()
    {
        $state = $this->input->post('state');
        $data['city'] = $this->CommonModal->getRowByIdInOrder('tbl_cities', array('state_id' => $state), 'name', 'asc');
        $this->load->view('admin/dropdown', $data);
    }
 

    public function getcchcontact()
    {
        $contact = $this->input->post('contact');
        $count = $this->CommonModal->getNumRows('tbl_orphanage', array('number' => $contact));
        if ($count > 0) {
            echo 'Contact no. already registered';
        } else {
            echo ' ';
        }
    }
    public function get_cch()
    {
        $cch = $this->input->post('cch');
        $data = $this->CommonModal->getRowById('order_request_template', 'ortid', $cch);
        if ($data != '') {
            foreach ($data as $row) {
                $arr = json_decode($row['cch_id_list']);
                if ($arr != '') {
                    foreach ($arr as $cc) {
                        if ($cc != '') {
                            $cchdata = $this->CommonModal->getSingleRowById('tbl_orphanage', array('id' => $cc));
                            if ($cchdata != '') {
                                echo '<option value="' . $cchdata['id'] . '">' . $cchdata['name'] . '</option>';
                            }
                        }
                    }
                }
            }
        }
    }
    public function eventsrequestStatus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $st = (($status == 'accept') ? 1 : 2);

        $row = $this->CommonModal->updateRowById('checkout_events', 'eve_id', $id, array('status' => $st));

        if ($row) {
            if ($status == 'accept') {
                echo '0';
            } else {
                echo '1';
            }
        } else {
            echo '2';
        }
    }

    // CRM FUNCTION


    public function delete()
    {
        extract($_POST);
        $table = ' ';
        $idnm = ' ';
        if ($datatable == 'admin') {
            $table = 'webangel_admin';
            $idnm = 'admin_id';
        }
        if ($datatable == 'category') {
            $table = 'webangel_category';
            $idnm = 'cat_id';
        }
        if ($datatable == 'product') {
            $table = 'webangel_product';
            $idnm = 'product_id';
        }
        if ($datatable == 'quantity') {
            $table = 'webangel_quantity_type';
            $idnm = 'qty_id';
        }
        if ($datatable == 'service') {
            $table = 'webangel_service_type';
            $idnm = 'id';
        }
        if ($datatable == 'servicel') {
            $table = 'webangel_service_list';
            $idnm = 'id';
        }
        if ($datatable == 'pro_groupl') {
            $table = 'webangel_product_group';
            $idnm = 'id';
        }


        $update = $this->CommonModal->deleteRowById($table, array($idnm => $dataid));
        if ($update) {
            echo '1';
        } else {
            echo '0';
        }
    }
    public function block()
    {
        extract($_POST);
        if ($datatable == 'admin') {
            $table = 'webangel_admin';
            $idnm = 'admin_id';
            $status_col = 'admin-status';
        } else {
            $table = '';
            $idnm = '';
            $status_col = '';
        }
        $update = $this->CommonModal->updateRowById($table, $idnm, $dataid, array($status_col => $status));
        if ($update) {
            echo '1';
        } else {
            echo '0';
        }
    }
    public function searchproduct()
    {
        extract($_POST);
        $row = $this->CommonModal->getRowByIn('webangel_product_group', $getproduct, 'id', 'name', 'asc');
        $msg = '';
        $i = 1;
        if ($row) {
            foreach ($row as $data) {
                $row_data = $this->CommonModal->getRowById('webangel_product_group_items', 'pg_id', $data['id']);
                foreach ($row_data as $row_datapro) {
                    $row_data_product = $this->CommonModal->getRowById('webangel_product', 'product_id', $row_datapro['product_id']);
                    $msg .= '<tr>
                <td> ' . $i . ' </td>
                <td>' . $row_data_product[0]['product_name'] . ' </td>
                <td><input type="text" name="mrp" class="element quantity " data-id="' . $row_data_product[0]['product_id'] . '" id="mrp' . $row_data_product[0]['product_id'] . '" value="' . $row_data_product[0]['product_mrp'] . '" /></td>
                <td><input type="text" name="quantity" class="element quantity" data-id="' . $row_data_product[0]['product_id'] . '" id="quan' . $row_data_product[0]['product_id'] . '" value="' . $row_data_product[0]['product_quantity'] . '" /> </td>
                <td> <input type="text" name="total" value="' . ((int)$row_data_product[0]['product_mrp'] * (int)$row_data_product[0]['product_quantity']) . '" class="element total" data-id="' . $row_data_product[0]['product_id'] . '"/> </td>
                <td> Remove </td>
                </tr>';
                    $i++;
                }
            }
            echo $msg;
        } else {
            echo '0';
        }
    }

    public function geteditdata()
    {
        extract($_POST);
        $table = ' ';
        $idnm = ' ';
        if ($datatable == 'admin') {
            $table = 'webangel_admin';
            $idnm = 'admin_id';
        }
        if ($datatable == 'category') {
            $table = 'webangel_category';
            $idnm = 'cat_id';
        }
        if ($datatable == 'product') {
            $table = 'webangel_product';
            $idnm = 'product_id';
        }
        if ($datatable == 'quantity') {
            $table = 'webangel_quantity_type';
            $idnm = 'qty_id';
        }
        if ($datatable == 'service') {
            $table = 'webangel_service_type';
            $idnm = 'id';
        }
        if ($datatable == 'servicel') {
            $table = 'webangel_service_list';
            $idnm = 'id';
        }
        if ($datatable == 'pro_groupl') {
            $table = 'webangel_product_group';
            $idnm = 'id';
        }
        $update = $this->CommonModal->getRowById($table, $idnm, $dataid);
        print_r($update);
    }

    public function searchproduct_name()
    {
        extract($_POST);
        $row = $this->CommonModal->getRowById('webangel_product',  'product_id', $getproduct);
        if (!empty($row)) {

            $msg = '<tr class="fieldGroup">
                <td> ' . $row[0]['product_item_code'] . '<input type="hidden" name="dataid[]" class="element   "   value="' . $row[0]['product_id'] . '" /></td>
                <td>' . $row[0]['product_name'] . ' </td>
                <td><input type="text" name="unit[]" class="element   " data-id="' . $row[0]['product_id'] . '" id="mrp' . $row[0]['product_id'] . '" value="PCS" /></td>
                <td><input type="text" name="quantity[]" class="element  " data-id="' . $row[0]['product_id'] . '" id="quan' . $row[0]['product_id'] . '" value="1" /> </td>
                
                <td> <a href="javascript:void(0)" class="btn btn-danger remove"><span class="fa fa-trash" aria-hidden="true"> </span> </a>  </td>
                </tr>';

            echo $msg;
        } else {
            echo '0';
        }
    }
    public function get_merchant_report()
    {
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];
        if (($fromdate == '') && ($todate == '')) {
            $data['checkout'] = $this->CommonModal->getRowByMoreId('checkout', array('merchant_id' => sessionId('mid')));
        } else {
            $arr[] = "(`merchant_id`=" . sessionId('mid') . ")";
            if ($fromdate != '' && $todate != '') {
                $arr[] = "( date(`create_date_only`) BETWEEN '" . $fromdate . "' AND '" . $todate . "' )";
            } elseif ($fromdate != '') {
                $arr[] = "( date(`create_date_only`) <= '" . $fromdate . "' )";
            } elseif ($todate != '') {
                $arr[] = "( date(`create_date_only`) >= '" . $todate . "' )";
            }
            // print_R($arr);
            echo  implode(' AND ', $arr);
            $data['checkout'] = $this->CommonModal->getRowByMoreIdInOrder('checkout', implode(' AND ', $arr), 'id', 'DESC');
        }
        $this->load->view('ajax/get_records', $data);
    }
    public function login()
    {
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "tbl_user";
            $login_data = $this->CommonModal->getRowByMoreId($table, array('number' => $contact));
            // print_r($login_data); 
            if (!empty($login_data)) {
                echo '1';
            } else {
                echo '2';
            }
        }
    }
    public function loginsession()
    {
        if (count($_POST) > 0) {
            extract($this->input->post());
            $table = "tbl_user";
            $login_data = $this->CommonModal->getRowByMoreId($table, array('number' => $contact));
            if (!empty($login_data)) {
                $session = $this->session->set_userdata(array('login_user_id' => $login_data[0]['uid'], 'login_user_name' => $login_data[0]['name'], 'login_user_emailid' => $login_data[0]['email'], 'login_user_contact' => $login_data[0]['number']));
                $this->session->set_userdata(array('check_name' =>  $login_data[0]['name'], 'check_number' => $login_data[0]['number'], 'check_email' => $login_data[0]['email']));
            } else {
            }
        }
    }

    public function user_redirect()
    {
        if (count($this->cart->contents()) > 0) {
            redirect(base_url('Index/checkoutpay'));
        } else {
            redirect($this->agent->referrer());
        }
    }

    public function register()
    {
        $formdata = $this->input->post();
        // print_R($_POST); 
        if (strlen($formdata['number']) == 10) {
            $regdata = $this->CommonModal->getRowById('tbl_user', 'number', $formdata['number']);
            if (empty($regdata)) {
                // $regdataemail = $this->CommonModal->getRowById('tbl_user', 'email', $formdata['email']);
                // if (empty($regdataemail)) {
                    $formdata['password'] =   substr($formdata['name'], 0, 3) . substr($formdata['number'], 0, 3);
                    md5($formdata['password']);
                    $this->CommonModal->insertRowReturnId('tbl_user', $formdata);
                    $message = donormail($formdata['email'] . ' / ' . $formdata['number'],  $formdata['password']);
                    sendmail($formdata['email'], 'Srimitra Registration', $message);
                    $this->session->set_userdata('loginmsg', 'You have registered successfully. check mail ID to get your password.');
                    echo '1';
                    // redirect(base_url('Index/thankyou'));
                // } elseif (count($regdataemail) == 1) {
                //     $this->session->set_userdata('regmsg', 'Mail ID Already registered');
                //     echo '2';
                    // redirect(base_url('Index/thankyou'));
                // } else {
                //     $this->session->set_userdata('regmsg', 'Your account is been blocked with multiple  mail ID ' . $formdata['email']);
                //     echo '3';
                //     // redirect(base_url('Index/thankyou'));
                // }
            } elseif (count($regdata) == 1) {
                $this->session->set_userdata('regmsg', 'Contact no. Already registered');
                echo '4';
                // redirect(base_url('Index/thankyou'));
            } else {
                $this->session->set_userdata('regmsg', 'Your account is been blocked with with multiple contact no. ' . $formdata['contact']);
                echo '5';
                // redirect(base_url('Index/thankyou'));
            }
        } else {
            $this->session->set_userdata('regmsg', 'Invalid Contact no. Contact no. should be of 10 digit');
            echo '0';
            // redirect(base_url('Index/thankyou'));
        }
    }
    public function guest_login()
    {
        $this->session->set_userdata(array('login_user_id' => '0', 'login_user_name' => 'Guest', 'login_user_emailid' => ' ', 'login_user_contact' => ' '));
    }
}
