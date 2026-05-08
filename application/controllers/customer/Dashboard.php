<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
        {
                if(!empty($this->session->userdata('customer_id'))){
                        $this->load->model('customer/CustomerDashboard_Model');
                        $customer_id = $this->session->userdata('customer_id');
                        $adminDetails = $this->CustomerDashboard_Model->getAdminDetails($customer_id);
                        $this->load->view('customer/dashboard', ['adminDetails' => $adminDetails]);
                }else{
                        return redirect('admin/Login');
                }
        }


}