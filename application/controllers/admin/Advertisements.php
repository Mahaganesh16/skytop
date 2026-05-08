<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisements extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		if(! $this->session->userdata('adid'))
		redirect('admin/Login');
	}
	
	public function adbySeller($sid)
	{
		if(!empty($this->session->userdata('adid'))){
			$this->load->model('admin/AdminDashboard_Model');
			$adid = $this->session->userdata('adid');

			$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
			$adsbySeller = $this->AdminDashboard_Model->getAdsBySeller($sid);
			$sellerDet = $this->AdminDashboard_Model->getSellerDet($sid);
			$this->load->view('admin/ads/advertisements', ['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);
		}else{
			return redirect('admin/Login');
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

	public function addAd($sid)
	{
		$this->load->model('HomeModel');
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$adsbySeller = $this->AdminDashboard_Model->getAdsBySeller($sid);
		$sellerDet = $this->AdminDashboard_Model->getSellerDet($sid);
		$mainCategories = $this->HomeModel->getMainCategory(0);

		$this->form_validation->set_rules('ad_name', 'Ad Name', 'required');
        $this->form_validation->set_rules('ad_validity', 'Ad Validity', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('mainCategory', 'Main Category', 'required');
        $this->form_validation->set_rules('subCategory', 'Sub Category', 'required');
        $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
        $this->form_validation->set_rules('validity', 'Coupon Validity', 'required');
        $this->form_validation->set_rules('percentage', 'Coupon Percentage', 'required|numeric|callback__more_than[percentage]');
        $this->form_validation->set_rules('validity', 'Coupon Validity', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){
              $config['mailtype'] = 'html';

        	$ad_name = $this->input->post('ad_name');
        	$ad_validity = $this->input->post('ad_validity');
        	$description = htmlspecialchars($this->input->post('description'));
        	$mainCategory = $this->input->post('mainCategory');
        	$subCategory = $this->input->post('subCategory');
        	$coupon_name = $this->input->post('coupon_name');
        	$coupon_code = $this->input->post('coupon_code');
        	$validity = $this->input->post('validity');
        	$percentage = $this->input->post('percentage');
        	$address = $this->input->post('address');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front_assets/images/ads/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = '';
	        }

	        $insertData = array(
	        	'seller_id' => $sellerDet->id,
	        	'category' => $mainCategory,
	        	'subcategory' => $subCategory,
	        	'ad_name' => $ad_name,
	        	'ad_description' => $description,
	        	'ad_validity' => $ad_validity,
	        	'image' => $image,
	        	'coupon_name' => $coupon_name,
	        	'coupon_code' => $coupon_code,
	        	'percentage' => $percentage,
	        	'validity' => $validity,
	        	'zipcode' => $sellerDet->zipcode,
	        	'address' => $address,
	        	'status' => $status
	        );

	        $html = '
	            <h2>Welcome to Adsmenia</h2>
	        	<h2 align=center>Your Detail</h2><hr><br>
				<p><strong>Name :'.$sellerDet->seller_name.'</strong></p>	
				<p><strong>Email Id:'.$sellerDet->seller_email.'</strong></p>
				<p><strong>Store Name :'.$sellerDet->store_name.'</strong></p>
			    <p><strong>Browse Ads Below The Link Click Here</strong></p> 
			    <a href="https://shreetechhub.com/demosite/adsmenia/Home/allads">https://shreetechhub.com/demosite/adsmenia/Home/allads</a>
				<button><a href="https://shreetechhub.com/demosite/adsmenia/seller/PostAd/Login/">Click the link Login</a></button>
			
					';
					 $adsubject = 'AdsMenia';
					 $subject = 'Adsmenia';
					 $message = $html."\r\n";
					 $from_email = 'st.arunpandian@gmail.com'; 
					 $cc_email = 'arunpandian711@gmail.com';
		   			 $headers = $from_email;
			         //Load email library 
			         $this->load->library('email'); 
			   
        			$this->email->initialize($config);
			         $this->email->from($from_email, 'Shreetech'); 
			         $this->email->to($sellerDet->seller_email);
			       
			         $this->email->subject($subject); 
			         $this->email->message($message); 
					 if($this->email->send()){
					     $html = '
            	            <h2>Advertisement Added Successfully</h2>
            	        	<h2 align=center>Advertisement Detail</h2><hr><br>
            				<p><strong>Name :'.$sellerDet->seller_name.'</strong></p>	
            				<p><strong>Email Id:'.$sellerDet->seller_email.'</strong></p>
            				<p><strong>Store Name :'.$sellerDet->store_name.'</strong></p>
            				<p><strong>Store Name :'.$sellerDet->seller_mobile.'</strong></p>
            				';
            				
            				$mess = $html;
        					 $this->email->from($from_email, 'Shreetech'); 
        			         $this->email->to($from_email);
        			  		  $this->email->cc($cc_email);
        			         $this->email->subject($adsubject); 
        			         $this->email->message($mess); 
        					if($this->email->send()){
        				        $insertResult = $this->AdminDashboard_Model->insertAd($insertData);
        				        if($insertResult){
        				        	$this->session->set_flashdata('success_message','Ad added successfully');
        				        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
        				        }else{
        				        	$this->session->set_flashdata('error_message','Ad not added successfully');
        				        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
        				        }
        
        			        }else{
        			        	$this->session->set_flashdata('error_message','Mail Not Send Try Again Later !');
        				        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
        				    }
        
        			        	
        			     }else{
        				        	$this->session->set_flashdata('error_message','Mail Not Send Try Again Later !');
        				        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
        				        }
        		}else{
        				    	$this->load->view('admin/ads/addAd', ['mainCategories' => $mainCategories,'adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);
        			}
        
        					
    	}

	public function editAd()
	{
		$aid = $this->uri->segment(4);
		$sid = $this->uri->segment(5);
		$this->load->model('HomeModel');
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$adsbySeller = $this->AdminDashboard_Model->getAdsBySeller($sid);
		$sellerDet = $this->AdminDashboard_Model->getSellerDet($sid);
		$adDet = $this->AdminDashboard_Model->getAdDet($aid);
		$mainCategories = $this->HomeModel->getMainCategory(0);


		$this->form_validation->set_rules('ad_name', 'Ad Name', 'required');
        $this->form_validation->set_rules('ad_validity', 'Ad Validity', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('mainCategory', 'Main Category', 'required');
        $this->form_validation->set_rules('subCategory', 'Sub Category', 'required');
        $this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
        $this->form_validation->set_rules('validity', 'Coupon Validity', 'required');
        $this->form_validation->set_rules('percentage', 'Coupon Percentage', 'required|numeric|callback__more_than[percentage]');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){

        	$ad_name = $this->input->post('ad_name');
        	$ad_validity = $this->input->post('ad_validity');
        	$description = htmlspecialchars($this->input->post('description'));
        	$mainCategory = $this->input->post('mainCategory');
        	$subCategory = $this->input->post('subCategory');
        	$coupon_name = $this->input->post('coupon_name');
        	$coupon_code = $this->input->post('coupon_code');
        	$validity = $this->input->post('validity');
        	$percentage = $this->input->post('percentage');
        	$address = $this->input->post('address');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front_assets/images/ads/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = $adDet->image;
	        }

	        $updateData = array(
	        	'seller_id' => $sellerDet->id,
	        	'category' => $mainCategory,
	        	'subcategory' => $subCategory,
	        	'ad_name' => $ad_name,
	        	'ad_description' => $description,
	        	'ad_validity' => $ad_validity,
	        	'image' => $image,
	        	'coupon_name' => $coupon_name,
	        	'coupon_code' => $coupon_code,
	        	'percentage' => $percentage,
	        	'validity' => $validity,
	        	'zipcode' => $sellerDet->zipcode,
	        	'address' => $address,
	        	'status' => $status
	        );
	        //echo "<pre>";print_r($updateData);die();
	        $updateResult = $this->AdminDashboard_Model->updateAd($updateData, $aid);
	        if($updateResult){
	        	$this->session->set_flashdata('success_message','Ad updated successfully');
	        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
	        }else{
	        	$this->session->set_flashdata('error_message','Ad not updated successfully');
	        	return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
	        }

        }else{
        	$this->load->view('admin/ads/editAd', ['mainCategories' => $mainCategories,'adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller, 'adDet' => $adDet]);
        }
	}

	public function deleteAdImage($value='')
	{
		$aid = $this->uri->segment(4);
		$sid = $this->uri->segment(5);
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$adsbySeller = $this->AdminDashboard_Model->getAdsBySeller($sid);
		$sellerDet = $this->AdminDashboard_Model->getSellerDet($sid);
		$adDet = $this->AdminDashboard_Model->getAdDet($aid);

		$path = "assets/front_assets/images/ads/".$adDet->image;
		
		if(file_exists($path)){
			unlink($path);
			$updateData = array(
				'image' => ''
			);
			$adImage = $this->AdminDashboard_Model->updateAd($updateData,$aid);
			if($adImage){
				$this->session->set_flashdata('success_message','Ad Image deleted successfully');
				return redirect('admin/Advertisements/editAd/'.$aid.'/'.$sid, ['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller, 'adDet' => $adDet]);
			}else{
				$this->session->set_flashdata('error_message','Category Image not deleted.');
				return redirect('admin/Advertisements/editAd/'.$aid.'/'.$sid, ['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller, 'adDet' => $adDet]);
			}
		}else{
			$this->session->set_flashdata('error_message','Image file is not found');
			return redirect('admin/Advertisements/editAd/'.$aid.'/'.$sid, ['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller, 'adDet' => $adDet]);
		}
	}

	public function deleteAd()
	{
		$aid = $this->uri->segment(4);
		$sid = $this->uri->segment(5);
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$adsbySeller = $this->AdminDashboard_Model->getAdsBySeller($sid);
		$sellerDet = $this->AdminDashboard_Model->getSellerDet($sid);
		$adDet = $this->AdminDashboard_Model->getAdDet($aid);

		if(!empty($adDet->image)){	
			$path = "assets/front_assets/images/ads/".$adDet->image;
			if(file_exists($path)){
				unlink($path);
			}
		}

		$deleteResult = $this->AdminDashboard_Model->deleteAd($aid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Ad Deleted Successfully');
			return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
		}else{
			$this->session->set_flashdata('error_message','Ad not deleted. Try Again Later');
			return redirect('admin/Advertisements/adbySeller/'.$sellerDet->id,['adminDetails' => $adminDetails, 'sellerDet' => $sellerDet, 'adsbySeller' => $adsbySeller]);	
		}
	}

	public function getSubCategory()
	{
		$cid = $this->input->post('mainCategory');
		$this->load->model('seller/SellerModel');
		$subCategories = $this->SellerModel->getSubCategory($cid);
		foreach($subCategories as $subCategory){
            $option .= '<option value="'.$subCategory->id.'">'. $subCategory->category_name . '</option>';
        }
        echo $option;
	}

}