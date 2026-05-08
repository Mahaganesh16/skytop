<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index($value='')
	{
		$this->load->model('customer/CustomerLogin_Model');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run()){
        	$email = $this->input->post('email');
        	$password = $this->input->post('password');
        	$checkLoginDetails = $this->CustomerLogin_Model->checkLoginDetails($email, $password);
        	if($checkLoginDetails > 0){
        		$this->session->set_userdata('customer_id',$checkLoginDetails);
        		return redirect('dashboard');     		
        	}else{
        		$this->session->set_flashdata('error_message', 'Please enter valid login details');
        		return redirect('login');
        	}
		}else{
			$this->load->view('customer/login');
		}
	}


}