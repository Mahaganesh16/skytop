<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct(){
		parent::__construct();
		 
		if(! $this->session->userdata('adid'))

		redirect('admin/Login');
	}
	
	public function index()
	{
		if(!empty($this->session->userdata('adid'))){
			$this->load->model('admin/AdminDashboard_Model');
			
			$adid = $this->session->userdata('adid');
			$Allworkers = $this->AdminDashboard_Model->GetAllWorkers();
			$workers = $this->AdminDashboard_Model->NumberOfWorkers();
			$user = $this->AdminDashboard_Model->NumberOfUser();
			$pending = $this->AdminDashboard_Model->NumberOfpending();
			$cancelBooking = $this->AdminDashboard_Model->NumberOfcancelBooking();
			$completeBooking = $this->AdminDashboard_Model->NumberOfcompleteBooking();
			$subadmin = $this->AdminDashboard_Model->NumberOfsubadmin();
			$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
			$this->load->view('admin/dashboard', ['adminDetails' => $adminDetails,'workers' => $workers,'user' => $user,'subadmin' => $subadmin,'pending' => $pending,'cancelBooking' => $cancelBooking,'completeBooking' => $completeBooking,'Allworkers' => $Allworkers]);
		}else{
			return redirect('admin/Login');
		}
	}


	public function settings()
	{

		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run()){
        	$name = $this->input->post('name');
        	// $images = $this->input->post('image');
        	// echo $images;die();

        	$config['upload_path']          = 'assets/front/images/profile/admin/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = array('error' => $this->upload->display_errors());
	                $this->load->view('admin/settings',['adminDetails' => $adminDetails,'error' => $error]);
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];

	            }
	        }else{
	        	$image = $adminDetails->image;
	        }

     
	        $updateData = array(
	        	'name' => $name,
	        	'image' => $image
	        );

	        $updateResult = $this->AdminDashboard_Model->updateProfile($updateData,$adid);
	        if($updateResult){
	        	$this->session->set_flashdata('success_message','Profile Updated Successfully');
	        	return redirect('admin/Dashboard/settings',['adminDetails' => $adminDetails]);
	        }else{
	        	$this->session->set_flashdata('error_message','Profile not updated. Try again later');
	        	return redirect('admin/Dashboard/settings',['adminDetails' => $adminDetails]);
	        }
        }else{
			$this->load->view('admin/settings',['adminDetails' => $adminDetails]);
        }
    }

    public function deleteAdminImage($adid)
	{
	 	$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		
		$path = "assets/front_assets/images/profile/admins/".$adminDetails->image;
		if(file_exists($path)){
			unlink($path);
			$updateData = array(
				'image' => ''
			);
			$adminImage = $this->AdminDashboard_Model->updateProfile($updateData,$adid);
			if($adminImage){
				$this->session->set_flashdata('success_message','Admin Image deleted successfully');
				return redirect('admin/Dashboard/settings',['adminDetails' => $adminDetails]);
			}else{
				$this->session->set_flashdata('error_message','Admin Image not deleted.');
				return redirect('admin/Dashboard/settings',['adminDetails' => $adminDetails]);
			}
		}else{
			$this->session->set_flashdata('error_message','Admin Image file is not found');
			return redirect('admin/Dashboard/settings', ['adminDetails' => $adminDetails]);
		}
	}

	public function changePassword()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$this->form_validation->set_rules('currentpwd','Current Password','required|min_length[6]');	
		$this->form_validation->set_rules('newpwd','New Password','required|min_length[6]');
		$this->form_validation->set_rules('confirmpwd','Confirm Password','required|min_length[6]|matches[newpwd]');
		if($this->form_validation->run()){
			$cpassword= md5($this->input->post('currentpwd'));
			$newpwd=$this->input->post('newpwd');
			$adid = $this->session->userdata('adid');
			$this->load->model('admin/AdminDashboard_Model');
			$cpass=$this->AdminDashboard_Model->getCurrentPwd($adid);
			$dbpass=$cpass->password;
			if($dbpass == $cpassword){
				$changePwdResult = $this->AdminDashboard_Model->updatePassword($adid,$newpwd);
				if($changePwdResult){
					$this->session->set_flashdata('success_message','New Password updated successfully');
					return redirect('admin/Dashboard/changePassword');
				}else{
					$this->session->set_flashdata('error_message','Password is not updated. Try Again Later');
					return redirect('admin/Dashboard/changePassword');
				}
			}else{
				$this->session->set_flashdata('error_message','Current Password is not correct');
				return redirect('admin/Dashboard/changePassword');
			}

		}else{
			$this->load->view('admin/changePassword',['adminDetails' => $adminDetails]);
		}		
	}


	public function sitesettings()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$websiteDet = $this->AdminDashboard_Model->getWebsiteDet(1);
		$this->form_validation->set_rules('title', 'Website Title', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('contactno', 'Contact Number', 'required');
		$this->form_validation->set_rules('email', 'Website Email', 'required');
		$this->form_validation->set_rules('aboutus', 'About us', 'required');
		$this->form_validation->set_rules('copyrightstext', 'Copyrights Text', 'required');
        if ($this->form_validation->run()){
        	$title = $this->input->post('title');
        	$address = $this->input->post('address');
        	$contactno = $this->input->post('contactno');
        	$email = $this->input->post('email');
        	$aboutus = $this->input->post('aboutus');
        	$copyrightstext = $this->input->post('copyrightstext');

        	if($this->input->post('fb_link')){
        		$fb_link = $this->input->post('fb_link');
        	}else{
        		$fb_link = '';
        	}
        	if($this->input->post('tw_link')){
        		$tw_link = $this->input->post('tw_link');
        	}else{
        		$tw_link = '';
        	}
        	if($this->input->post('yt_link')){
        		$yt_link = $this->input->post('yt_link');
        	}else{
        		$yt_link = '';
        	}

        	$config['upload_path']          = 'assets/front_assets/images/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['logo']['name'])){
	            if ( ! $this->upload->do_upload('logo'))
	            {
	                $error = array('error' => $this->upload->display_errors());
	                $this->load->view('admin/sitesettings',['adminDetails' => $adminDetails,'websiteDet' => $websiteDet,'error' => $error]);
	            }else
	            {
	                $data = $this->upload->data();
	                $logo = $data['file_name'];
	            }
	        }else{
	        	$logo = $websiteDet->logo;
	        }

	     

	        $updateData = array(
	        	'title' => $title,
	        	'logo' => $logo,
	        	'contactno' => $contactno,
	        	'aboutus' => $aboutus,
	        	'email' => $email,
	        	'address' => $address,
	        	'copyrightstext' => $copyrightstext,
	        	'fb_link' => $fb_link,
	        	'tw_link' => $tw_link,
	        	'yt_link' => $yt_link
	        );

	        $wid = 1;

	        $updateResult = $this->AdminDashboard_Model->updateSiteSettings($updateData,$wid);
	        if($updateResult){
	        	$this->session->set_flashdata('success_message','sitesettings Updated Successfully');
	        	return redirect('admin/Dashboard/sitesettings',['adminDetails' => $adminDetails, 'websiteDet' => $websiteDet]);
	        }else{
	        	$this->session->set_flashdata('error_message','sitesettings not updated. Try again later');
	        	return redirect('admin/Dashboard/sitesettings',['adminDetails' => $adminDetails, 'websiteDet'=> $websiteDet]);
	        }
        }else{
			$this->load->view('admin/sitesettings',['adminDetails' => $adminDetails, 'websiteDet' => $websiteDet]);
        }
	}

	public function websitePublishRequest()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$publishRequests = $this->AdminDashboard_Model->getPublishRequest();
		$this->load->view('admin/publishRequests', ['adminDetails' => $adminDetails, 'publishRequests' => $publishRequests]);
	}

	public function download($rid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$requestDet = $this->AdminDashboard_Model->getRequestDet($rid);
		$themeDet = $this->AdminDashboard_Model->getThemeDet($requestDet->theme_id);

		$dir = $requestDet->folder_name;
		$zip_file = $themeDet->theme_name.'.zip';

		// Get real path for our folder
		$rootPath = realpath($dir);

		// Initialize archive object
		$zip = new ZipArchive();
		$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
		    new RecursiveDirectoryIterator($rootPath),
		    RecursiveIteratorIterator::LEAVES_ONLY
		);

		foreach ($files as $name => $file)
		{
		    // Skip directories (they would be added automatically)
		    if (!$file->isDir())
		    {
		        // Get real and relative path for current file
		        $filePath = $file->getRealPath();
		        $relativePath = substr($filePath, strlen($rootPath) + 1);

		        // Add current file to archive
		        $zip->addFile($filePath, $relativePath);
		    }
		}

		// Zip archive will be created only after closing object
		$zip->close();


		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($zip_file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($zip_file));
		readfile($zip_file);
	}
	public function assign_job_package($bid)
	{
		// $wid = $this->input->post('wid');
		// $bid = $this->input->post('bid');
		$this->load->model('admin/AdminDashboard_Model');
		// $workerDet = $this->AdminDashboard_Model->getworkerDet($wid);
			$bookingDet = $this->AdminDashboard_Model->getbookingDetbyid($bid);
			// print_r($bid);die();
			$updatedata = array(
					'd_name' => $this->input->post('dname'),
					'dmobile_no' => $this->input->post('dmobile_no'),
					'vname' => $this->input->post('vname'),
					'vehicle_no' => $this->input->post('vehicle_no'),
					'status' => 2
			);
			$res = $this->AdminDashboard_Model->updateBookingDetailforPackage($updatedata,$bid);
			// $updatedata1 = array(
			// 		'working_status' => 1
			// );
			// $res1 = $this->AdminDashboard_Model->updateWorker($updatedata1,$wid);
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
			    "integrated_number": "919600262691",
			    "content_type": "template",
			    "payload": {
			        "messaging_product": "whatsapp",
			        "type": "template",
			        "template": {
			            "name": "driver_allocate_msg",
			            "language": {
			                "code": "en",
			                "policy": "deterministic"
			            },
			            "namespace": "96159cf8_0205_4f46_b3be_f13459943755",
			            "to_and_components": [
			                {
			                    "to": [
			                        "91'.$bookingDet->mobile_no.'"
			                    ],
			                    "components": {
			                        "body_1": {
			                            "type": "text",
			                            "value": "'.$bookingDet->name.'"
			                        },
			                        "body_2": {
			                            "type": "text",
			                            "value": "'.$this->input->post('dname').'"
			                        },
			                        "body_3": {
			                            "type": "text",
			                            "value": "'.$this->input->post('dmobile_no').'"
			                        },
			                        "body_4": {
			                            "type": "text",
			                            "value": "'.$this->input->post('vname').'"
	                        },
	                        "body_5": {
	                            "type": "text",
	                            "value": "'.$this->input->post('vehicle_no').'"
	                        }
	                    }
	                }
	            ]
	        }
	    }
	}',
	  CURLOPT_HTTPHEADER => array(
	    'Content-Type: application/json',
	    'authkey: 427947Aua7u29QVutX68653140P1',
	  ),
	));
	$response = curl_exec($curl);
	curl_close($curl);
	echo $response;

	}
	public function assign_job($bid)
	{
		// $wid = $this->input->post('wid');
		// $bid = $this->input->post('bid');
		$this->load->model('admin/AdminDashboard_Model');
		// $workerDet = $this->AdminDashboard_Model->getworkerDet($wid);
		$bookingDet = $this->AdminDashboard_Model->getbookingDet($bid);
		// print_r($bid);die();
		$updatedata = array(
				'd_name' => $this->input->post('dname'),
				'dmobile_no' => $this->input->post('dmobile_no'),
				'vname' => $this->input->post('vname'),
				'vehicle_no' => $this->input->post('vehicle_no'),
				'status' => 2
		);
		$res = $this->AdminDashboard_Model->updateBookingDetail($updatedata,$bid);
		// $updatedata1 = array(
		// 		'working_status' => 1
		// );
		// $res1 = $this->AdminDashboard_Model->updateWorker($updatedata1,$wid);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.msg91.com/api/v5/whatsapp/whatsapp-outbound-message/bulk/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "integrated_number": "919600262691",
		    "content_type": "template",
		    "payload": {
		        "messaging_product": "whatsapp",
		        "type": "template",
		        "template": {
		            "name": "driver_allocate_msg",
		            "language": {
		                "code": "en",
		                "policy": "deterministic"
		            },
		            "namespace": "96159cf8_0205_4f46_b3be_f13459943755",
		            "to_and_components": [
		                {
		                    "to": [
		                        "91'.$bookingDet->mobile_no.'"
		                    ],
		                    "components": {
		                        "body_1": {
		                            "type": "text",
		                            "value": "'.$bookingDet->firstName.'"
		                        },
		                        "body_2": {
		                            "type": "text",
		                            "value": "'.$this->input->post('dname').'"
		                        },
		                        "body_3": {
		                            "type": "text",
		                            "value": "'.$this->input->post('dmobile_no').'"
		                        },
		                        "body_4": {
		                            "type": "text",
		                            "value": "'.$this->input->post('vname').'"
                        },
                        "body_5": {
                            "type": "text",
                            "value": "'.$this->input->post('vehicle_no').'"
                        }
                    }
                }
            ]
        }
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'authkey: 427947Aua7u29QVutX68653140P1',
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;



	}
}
