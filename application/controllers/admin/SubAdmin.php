<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubAdmin extends CI_Controller {
		
	
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
		$admins = $this->AdminDashboard_Model->getAllAdmins();
		$this->load->view('admin/subadmin/subadmins', ['adminDetails' => $adminDetails,'admins' => $admins]);
	}

	public function addSubAdmin()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$admins = $this->AdminDashboard_Model->getAllAdmins();

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admins.email]');
        $this->form_validation->set_rules('type', 'Admin Type', 'required');
        $this->form_validation->set_rules('name', 'Admin Name', 'required');
        $this->form_validation->set_rules('password','New Password','required|min_length[6]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('status', 'Admin Status', 'required');
        if ($this->form_validation->run()){

        	$email = $this->input->post('email');
        	$type = $this->input->post('type');
        	$name = $this->input->post('name');
        	$password = $this->input->post('password');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front_assets/images/profile/admins/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/SubAdmin',['adminDetails' => $adminDetails, 'admins'=> $admins]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = '';
	        }

	        $insertData = array(
	        	'name' => $name,
	        	'type' => $type,
	        	'email' => $email,
	        	'password' => md5($password),
	        	'image' => $image,
	        	'status' => $status
	        );

	        $insertResult = $this->AdminDashboard_Model->insertAdmin($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Admin added successfully');
	        	return redirect('admin/SubAdmin',['adminDetails' => $adminDetails, 'admins' => $admins]);
	        }else{
	        	$this->session->set_flashdata('error_message','Admin not added successfully');
	        	return redirect('admin/SubAdmin',['adminDetails' => $adminDetails, 'admins' => $admins]);
	        }
        }else{
        	$this->load->view('admin/subadmin/addSubAdmin', ['adminDetails' => $adminDetails,'admins' => $admins]);
        }		
	}

	public function deleteSubAdmin($aid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$admins = $this->AdminDashboard_Model->getAllAdmins();
		$subAdminDet = $this->AdminDashboard_Model->getAdminDetails($aid);

		if(!empty($subAdminDet->image)){	
			$path = "assets/front_assets/images/profile/admins/".$subAdminDet->image;
			if(file_exists($path)){
				unlink($path);
			}
		}

		$deleteResult = $this->AdminDashboard_Model->deleteSubAdmin($aid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Admin Deleted Successfully');
			return redirect('admin/SubAdmin',['adminDetails' => $adminDetails, 'categories' => $categories]);
		}else{
			$this->session->set_flashdata('error_message','Admin not deleted. Try Again Later');
			return redirect('admin/SubAdmin', ['adminDetails' => $adminDetails, 'categories' => $categories]);
		}
	}
}