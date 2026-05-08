<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Worker extends CI_Controller {


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
		$worker = $this->AdminDashboard_Model->getAllworker();

		$this->load->view('admin/worker/worker', ['adminDetails' => $adminDetails,'worker' => $worker]);
	}

	public function addWorker()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getParentCategories();
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('work', 'Work', 'required');
        if ($this->form_validation->run()){
  			 $config['mailtype'] = 'html';
        	$name = $this->input->post('name');
        	$mobile = $this->input->post('mobile');
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	$description = $this->input->post('description');
        	$work = $this->input->post('work');
        	$address = $this->input->post('address');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/images/worker_img/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Category',['adminDetails' => $adminDetails, 'categories'=> $categories]);	               	
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
	        	'mobile' => $mobile,
	        	'email' => $email,
	        	'password' => md5($password),
	        	'profile' => $image,
	        	'working_status' => 0,
	        	'work' => $work,
	        	'description' => $description,
	        	'address' => $address,
	        	'status' => $status
	        );
			 $html = '
	            <h2>ONE WAY TAXI</h2>
	        	<h2 align=center>Your Account Create Successfully</h2><hr><br>
				<p><strong>Name :'.$name.'</strong></p>	
				<p><strong>Email Id:'.$email.'</strong></p>
				<p><strong>Password :'.$password.'</strong></p>
			    	';
					 $subject = '---ONE WAY TAXI---';
					 $message = $html."\r\n";
					 $from_email = 'st.arunpandian@gmail.com'; 
			         //Load email library 
			         $this->load->library('email'); 			   
        			 $this->email->initialize($config);
			         $this->email->from($from_email, 'Jerry'); 
			         $this->email->to($email);			       
			         $this->email->subject($subject); 
			         $this->email->message($message); 
					 if($this->email->send()){
        				$insertResult = $this->AdminDashboard_Model->insertWorker($insertData);
				        if($insertResult){
				        	$this->session->set_flashdata('success_message','Worker added successfully');
				        	return redirect('admin/Worker',['adminDetails' => $adminDetails, 'categories'=> $categories]);
				        }else{
				        	$this->session->set_flashdata('error_message','Worker not added successfully');
				        	return redirect('admin/Worker',['adminDetails' => $adminDetails, 'categories'=> $categories]);
				        }
				    }else{
				    	$insertResult = $this->AdminDashboard_Model->insertWorker($insertData);
				    	$this->session->set_flashdata('error_message','Main not Send Please Try Again Later');
				        	return redirect('admin/Worker',['adminDetails' => $adminDetails, 'categories'=> $categories]);
				    }
	        }else{
	        	$this->load->view('admin/worker/addworker', ['adminDetails' => $adminDetails, 'categories'=> $categories]);
	        }		
		}

	public function viewWorker($Worker_id)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$WorkerDet = $this->AdminDashboard_Model->getWorkerDet($Worker_id);
		$this->load->view('admin/WorkerDetail', ['adminDetails' => $adminDetails,'WorkerDet' => $WorkerDet]);
	}

	public function updateWorkerStatus()
	{
		$users = $this->input->post('users');
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$Workers = $this->AdminDashboard_Model->getAllWorkers();
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
				$updateStatusResult = $this->AdminDashboard_Model->updateWorkerStatus($users[$i],$updateData);
			}
			if($updateStatusResult){
				$this->session->set_flashdata('success_message','Status Updated Successfully');
				return redirect('admin/Worker/WorkerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'Workers' => $Workers]);
			}else{
				$this->session->set_flashdata('error_message','Something went to wrong. Try again later');
				return redirect('admin/Worker/WorkerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'Workers' => $Workers]);
			}
		}else{
			$this->session->set_flashdata('error_message','Please select user first');
			return redirect('admin/Worker/WorkerByPlan/'.$plan, ['adminDetails' => $adminDetails, 'Workers' => $Workers]);
		}
	}


	public function deleteWorker($Worker_id)
	{
		echo "Delete";
	}
	public function editWorker($id)
	{ 

		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getParentCategories();
		$WorkerDet = $this->AdminDashboard_Model->getWorkerDet($id);

		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
    	$this->form_validation->set_rules('work', 'Work', 'required');

        if ($this->form_validation->run()){

        	$name = $this->input->post('name');
        	$mobile = $this->input->post('mobile');
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	$description = $this->input->post('description');
        	$work = $this->input->post('work');
        	$address = $this->input->post('address');
        	$working_status = $this->input->post('working_status');
        	$status = $this->input->post('status');


        	$config['upload_path']          = 'assets/images/worker_img/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Worker',['adminDetails' => $adminDetails, 'WorkerDet' => $WorkerDet]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = $WorkerDet->profile;
	        }

	        $updateData = array(
	        	'name' => $name,
	        	'mobile' => $mobile,
	        	'email' => $email,
	        	'password' => md5($password),
	        	'profile' => $image,
	        	'working_status' => $working_status,
	        	'work' => $work,
	        	'description' => $description,
	        	'address' => $address,
	        	'status' => $status
	        );

	        $updatedResult = $this->AdminDashboard_Model->updateWorker($updateData, $id);
	        if($updatedResult){
	        	$this->session->set_flashdata('success_message','Category updated successfully');
	        	return redirect('admin/Worker',['adminDetails' => $adminDetails]);
	        }else{
	        	$this->session->set_flashdata('error_message','Category not updated successfully');
	        	return redirect('admin/Worker',['adminDetails' => $adminDetails]);
	        }

        }else{
        	$this->load->view('admin/worker/editworker', ['adminDetails' => $adminDetails, 'WorkerDet' => $WorkerDet,'categories' => $categories]);
        }		
	}

}