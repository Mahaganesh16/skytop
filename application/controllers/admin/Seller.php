<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {


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
		$plans = $this->AdminDashboard_Model->getAllPlans();
		$this->load->view('admin/plan', ['adminDetails' => $adminDetails,'plans' => $plans]);
	}

	public function sellerByPlan($plan_id)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$sellers = $this->AdminDashboard_Model->getAllSellersByPlan($plan_id);
		$plans = $this->AdminDashboard_Model->getAllPlans();
		$this->load->view('admin/seller', ['adminDetails' => $adminDetails,'sellers' => $sellers, 'plans' => $plans]);
	}

	public function viewSeller($seller_id)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$sellerDet = $this->AdminDashboard_Model->getSellerDet($seller_id);
		$this->load->view('admin/sellerDetail', ['adminDetails' => $adminDetails,'sellerDet' => $sellerDet]);
	}

	public function updateSellerStatus()
	{
		$users = $this->input->post('users');
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$sellers = $this->AdminDashboard_Model->getAllSellers();
		$plan = $this->input->post('plans');
		$status = $this->input->post('status');
		//echo "<pre>";print_r($users);die();
		$updateData = array(
			'plan' => $plan,
			'status' => $status
		);
		//echo "<pre>";print_r($plan);
		if(!empty($users)){
			for ($i=0; $i < count($users); $i++) { 
				$updateStatusResult = $this->AdminDashboard_Model->updateSellerStatus($users[$i],$updateData);
			}
			if($updateStatusResult){
				$this->session->set_flashdata('success_message','Status Updated Successfully');
				return redirect('admin/Seller/sellerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'sellers' => $sellers]);
			}else{
				$this->session->set_flashdata('error_message','Something went to wrong. Try again later');
				return redirect('admin/Seller/sellerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'sellers' => $sellers]);
			}
		}else{
			$this->session->set_flashdata('error_message','Please select user first');
			return redirect('admin/Seller/sellerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'sellers' => $sellers]);
		}
	}


	public function deleteSeller($seller_id)
	{
		echo "Delete";
	}
}