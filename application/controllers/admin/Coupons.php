<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupons extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(! $this->session->userdata('adid'))
		redirect('admin/Login');
	}

	public function index()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$coupons = $this->AdminDashboard_Model->getAllCoupons();
		$this->load->view('admin/coupon/coupons', ['adminDetails' => $adminDetails,'coupons' => $coupons]);
	}

	public function addCoupon()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$coupons = $this->AdminDashboard_Model->getAllCoupons();
		$this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
        $this->form_validation->set_rules('percentage', 'Coupon Percentage', 'required|numeric|callback__more_than[percentage]');
        $this->form_validation->set_rules('validity', 'Coupon Code validity', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){

        	$coupon_name = $this->input->post('coupon_name');
        	$coupon_code = $this->input->post('coupon_code');
        	$percentage = $this->input->post('percentage');
        	$validity = $this->input->post('validity');
        	$description = htmlspecialchars($this->input->post('description'));
        	$status = $this->input->post('status');
        	
	        $insertData = array(
	        	'addedby' => 'admin_'.$adid,
	        	'coupon_name' => $coupon_name,
	        	'coupon_code' => $coupon_code,
	        	'percentage' => $percentage,
	        	'validity' => $validity,
	        	'description' => $description,
	        	'status' => $status
	        );

	        $insertResult = $this->AdminDashboard_Model->insertCoupon($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Coupon added successfully');
	        	return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
	        }else{
	        	$this->session->set_flashdata('error_message','Coupon not added successfully');
	        	return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
	        }

        }else{
        	$this->load->view('admin/coupon/addCoupon', ['adminDetails' => $adminDetails, 'coupons' => $coupons]);
        }		
	}

	public function _more_than($percentage)
	{
	    if  (form_error('percentage')) {
	        return true;
	    }
	   	
	   	$max = 100;

	    if ($percentage > $max) {
	        $this->form_validation->set_message('_more_than', "The %s field must be less than or equal {$max}.");
	        return false;
	    }
	    
	    return true;
	}

	public function editCoupon($cid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$coupons = $this->AdminDashboard_Model->getAllCoupons();
		$couponDet = $this->AdminDashboard_Model->getCouponDet($cid);
		$this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
        $this->form_validation->set_rules('percentage', 'Coupon Percentage', 'required|numeric|callback__more_than[percentage]');
        $this->form_validation->set_rules('validity', 'Coupon Code validity', 'required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){

        	$coupon_name = $this->input->post('coupon_name');
        	$coupon_code = $this->input->post('coupon_code');
        	$percentage = $this->input->post('percentage');
        	$validity = $this->input->post('validity');
        	$description = htmlspecialchars($this->input->post('description'));
        	$status = $this->input->post('status');
        	
	        $updateData = array(
	        	'addedby' => 'admin_'.$adid,
	        	'coupon_name' => $coupon_name,
	        	'coupon_code' => $coupon_code,
	        	'percentage' => $percentage,
	        	'validity' => $validity,
	        	'description' => $description,
	        	'status' => $status
	        );

	        $updateResult = $this->AdminDashboard_Model->updateCoupon($updateData, $cid);
	        if($updateResult){
	        	$this->session->set_flashdata('success_message','Coupon updated successfully');
	        	return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
	        }else{
	        	$this->session->set_flashdata('error_message','Coupon not updated successfully');
	        	return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
	        }

        }else{
        	$this->load->view('admin/coupon/editCoupon', ['adminDetails' => $adminDetails, 'coupons' => $coupons, 'couponDet' => $couponDet]);
        }		
	}
	

	public function deleteCoupon($cid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$coupons = $this->AdminDashboard_Model->getAllCoupons();
		$couponDet = $this->AdminDashboard_Model->getCouponDet($cid);
		
		$deleteResult = $this->AdminDashboard_Model->deleteCoupon($cid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Coupon Deleted Successfully');
			return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
		}else{
			$this->session->set_flashdata('error_message','Coupon not deleted. Try again later');
			return redirect('admin/Coupons',['adminDetails' => $adminDetails, 'coupons' => $coupons]);
		}
	}
}