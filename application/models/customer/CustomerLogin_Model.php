<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class CustomerLogin_Model extends CI_Model {

		public function checkEmail($email)
		{
			$query = $this->db->select('*')->where(['email' => $email])->get('cab_customer');
		     ;
		    return $query->num_rows();
		}

		public function checkLoginDetails($email, $password)
		{
			$encryptPassword = md5($password);
			// echo $encryptPassword;die();
			$query = $this->db->select('*')->where(['email' => $email])->get('cab_customer')->row();
		
			if($query->status == 1){

				$checkLoginQuery = $this->db->select('*')->where(['email'=>$email, 'password' => $encryptPassword])->get('cab_customer')->row();
				if(!empty($checkLoginQuery->id)){
					return $checkLoginQuery->id;
				}else{
					return 0;
				}

			}else{
				$this->session->set_flashdata('error_message','You Account is not in active. Contact Main Admin');
				return redirect('login');
			}
		}
		public function updateForgotCode($email, $unique)
		{
			$data = array(
				'forgotCode' => $unique,
				'forgotStatus' => '1'
			);
			$query = $this->db->where(['email'=>$email])
	                ->update('admins',$data);
         
	        if($query){
	        	return 1;
	        }else{
	        	return 0;
	        }
		}
        public function checkEmailForgotCode($emailid, $unique)
		{
			$query=$this->db->where('email',$emailid)
							->where('forgotCode',$unique)
						    ->get('admins');
			return $query->row();
		
		}

		public function resetPassword($data, $emailId)
		{
		  //  echo $emailId;die();
				// echo"<pre>";print_r($emailid);die();
			$query = $this->db->where(['email'=>$emailId])->update('admins',$data);

	        if($query){
	        	return 1;
	        }else{
	        	return 0;
	        }
		}
        public function updatedata($email,$data){
            $result = $this->db->where(['email'=>$email])->update('admins', $data);
            if($result)
            {
            	return 1;
            }else{
            	return 0;
            }
        }

	}
?>