<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

	
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
		$this->load->view('admin/plan/plans', ['adminDetails' => $adminDetails,'plans' => $plans]);
	}

	public function addPlan()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$plans = $this->AdminDashboard_Model->getAllPlans();
		$this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
        $this->form_validation->set_rules('validity', 'validity', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Plan Amount', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
        	$plan_name = $this->input->post('plan_name');
        	$validity = $this->input->post('validity');
        	$validity1 = $this->input->post('validity1');
        	$description = $this->input->post('description');
        	$amount = $this->input->post('amount');
        	$status = $this->input->post('status');

        	$insertData = array(
        		'plan_name' => $plan_name,
        		'validity' => $validity."-".$validity1,
        		'description' => $description,
        		'amount' => $amount,
        		'status' => $status
        	);

        	$insertResult = $this->AdminDashboard_Model->insertPlan($insertData);
        	if($insertResult){
	        	$this->session->set_flashdata('success_message','Plan added successfully');
	        	return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
	        }else{
	        	$this->session->set_flashdata('error_message','Plan not added successfully');
	        	return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
	        }
        }else{
			$this->load->view('admin/plan/addPlan',['adminDetails' => $adminDetails]);
        }
	}

	public function editPlan($pid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$plans = $this->AdminDashboard_Model->getAllPlans();
		$planDet = $this->AdminDashboard_Model->getPlanDet($pid);
		$this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
        $this->form_validation->set_rules('validity', 'validity', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Plan Amount', 'required|numeric');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
        	$plan_name = $this->input->post('plan_name');
        	$validity = $this->input->post('validity');
        	$validity1 = $this->input->post('validity1');
        	$description = $this->input->post('description');
        	$amount = $this->input->post('amount');
        	$status = $this->input->post('status');

        	$updateData = array(
        		'plan_name' => $plan_name,
        		'validity' => $validity."-".$validity1,
        		'description' => $description,
        		'amount' => $amount,
        		'status' => $status
        	);

        	$updateResult = $this->AdminDashboard_Model->updatePlan($updateData, $pid);
        	if($updateResult){
	        	$this->session->set_flashdata('success_message','Plan updated successfully');
	        	return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
	        }else{
	        	$this->session->set_flashdata('error_message','Plan not updated successfully');
	        	return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
	        }
        }else{
			$this->load->view('admin/plan/editPlan',['adminDetails' => $adminDetails,'planDet' => $planDet]);
        }
	}

	public function deletePlan($pid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$plans = $this->AdminDashboard_Model->getAllPlans();
		$planDet = $this->AdminDashboard_Model->getPlanDet($pid);
		
		$deleteResult = $this->AdminDashboard_Model->deletePlan($pid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Plan Deleted Successfully');
			return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
		}else{
			$this->session->set_flashdata('error_message','Plan not deleted. Try again later');
			return redirect('admin/Plan',['adminDetails' => $adminDetails, 'plans' => $plans]);
		}
	}
}