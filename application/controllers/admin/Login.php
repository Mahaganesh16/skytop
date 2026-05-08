<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        if(empty($this->session->userdata('adid'))){
    		$this->load->model('admin/AdminLogin_Model');
    		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()){
            	$email = $this->input->post('email');
            	$password = $this->input->post('password');
            	$checkLoginDetails = $this->AdminLogin_Model->checkLoginDetails($email, $password);
            	// echo $checkLoginDetails;die();
            	if($checkLoginDetails > 0){
            		$this->session->set_userdata('adid',$checkLoginDetails);
            		return redirect('admin/Dashboard');     		
            	}else{
            		$this->session->set_flashdata('error_message', 'Please enter valid login details');
            		return redirect('admin/Login');
            	}

            }else{
    			$this->load->view('admin/login');
            }
        }else{
            return redirect('admin/Dashboard');
        }
	}

	public function email_check($email)
    {
        $this->load->model('admin/AdminLogin_Model');
        $checkEmail = $this->AdminLogin_Model->checkEmail($email);
        if($checkEmail > 0){
        	return true;
        }else{
        	$this->form_validation->set_flashdata('email_check', 'The {field} is not admin');
        	return false;
        }
    }

    function logout()
	{
	    $this->session->unset_userdata('adid');
		$this->session->sess_destroy();
		return redirect('admin/login');
	}
		public function change(){
		  
			$this->form_validation->set_rules('admin_email','emailid','required');
			if($this->form_validation->run()){
			    
				$email = $this->input->post('admin_email');
				// echo $email;die();
			 $unique = "ADS".(rand(10000,1000000));
			 $subject = 'Adsmenia Reset Password';
			 $message ="Reset Password Click Below Link:\r\n";
			 $message .= base_url()."admin/Login/setNewPassword/".$email."/".$unique;
			 $from_email = 'st.arunpandian@gmail.com'; 
	         $this->load->library('email'); 
	         $this->email->from($from_email, 'Temple'); 
	         $this->email->to($email);
	         $this->email->subject($subject); 
	         $this->email->message($message); 
			 if($this->email->send()){
			 	
				$this->load->model('admin/AdminLogin_Model');
		        $result = $this->AdminLogin_Model->updateForgotCode($email, $unique);
		          echo "hi";die();
		        if($result){
		            $this->session->set_flashdata('success_message', 'Check Your Mail Click The Below Link');
		            redirect ('admin/login');
		        }else{
		            $this->session->set_flashdata('error_message', 'Try Again Later');
		            redirect ('admin/login');
		        }
		    }else{

		    	 $this->session->set_flashdata('error_message', 'Mail Not Send Try Again Later');
		        }
			}else{
			redirect('admin/login');
		}
	}
	
    	public function setNewPassword()
		{
			$this->load->model('admin/AdminLogin_Model');
			$emailid =  $this->uri->segment(4);
	  		$unique =  $this->uri->segment(5);
			$status = 0;
			$updateResult = $this->AdminLogin_Model->checkEmailForgotCode($emailid, $unique);
	
			if($updateResult){
				$this->session->set_flashdata('success_message','Email Verified Successfully.You can reset your password Now.');
				$this->load->view("admin/resetPwd",['updateResult' => $updateResult]);
			}else{
				$this->session->set_flashdata('error_message','Try again Later');
				redirect('admin/login');
			}
		}
		public function resetPassword($email)
		{
		  
			$this->load->model('admin/AdminLogin_Model');
			$emailid =  $this->uri->segment(4);
        	$unique =  $this->uri->segment(5);
			$status = 0;
// 			$updateResult = $this->User_Login_Model->checkEmailForgotCode($emailId, $unique);
// 			if($updateResult){
			      
				$this->form_validation->set_rules('newpwd','New Password','required|min_length[6]');
				$this->form_validation->set_rules('confirmpassword','Confirm Password','required|min_length[6]|matches[newpwd]');
				if($this->form_validation->run()){

					$newPwd = md5($this->input->post('newpwd'));
				// 	echo"$newPwd";die();
					$data = array(
        				'password' => $newPwd,
        				'forgotCode' => '',
        				'forgotStatus' => '0'
        			);
					$resetPasswordResult = $this->AdminLogin_Model->resetPassword($data, $emailid);
					
					if($resetPasswordResult){
						$this->session->set_flashdata('success_message','Password is reset Successfully');
						return redirect('admin/Login');
					}else{
						$this->session->set_flashdata('error_message','Try Again Later');
						$this->load->view('admin/resetPwd');
					}
                    
				}
				
				else{
				   
					$this->load->view('admin/resetPwd');
				}
// 			}else{
// 			     echo"hello";die();
// 				$this->session->set_flashdata('error','Try Again Later');
// 				$this->load->view('temple/resetPwd');
// 			}

		}
}
