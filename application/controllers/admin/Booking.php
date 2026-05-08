<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	
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
		$booking = $this->AdminDashboard_Model->getAllBooking();
		$this->load->view('admin/booking', ['adminDetails' => $adminDetails,'booking' => $booking]);
	}
	public function addTestimonial()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$testimonials = $this->AdminDashboard_Model->getAllTestimonials();
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        $this->form_validation->set_rules('review', 'Review', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
        	$name = $this->input->post('name');
        	$designation = $this->input->post('designation');
        	$company = $this->input->post('company');
        	$rating = $this->input->post('rating');
        	$review = $this->input->post('review');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front_assets/images/testimonials/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials'=> $testimonials]);	               	
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
	        	'designation' => $designation,
	        	'company' => $company,
	        	'rating' => $rating,
	        	'review' => $review,
	        	'image' => $image,
	        	'status' => $status
	        );

	        $insertResult = $this->AdminDashboard_Model->insertTestimonial($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Testimonial added successfully');
	        	return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials' => $testimonials]);
	        }else{
	        	$this->session->set_flashdata('error_message','Testimonial not added. Try again later');
	        	return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials' => $testimonials]);
	        }

        }else{
        	$this->load->view('admin/testimonial/addTestimonial', ['adminDetails' => $adminDetails,'testimonials' => $testimonials]);
        }
		
	}

	public function editTestimonial($tid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$testimonials = $this->AdminDashboard_Model->getAllTestimonials();
		$testimonialDet = $this->AdminDashboard_Model->getTestimonialDet($tid);
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');
        $this->form_validation->set_rules('review', 'Review', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
        	$name = $this->input->post('name');
        	$designation = $this->input->post('designation');
        	$company = $this->input->post('company');
        	$rating = $this->input->post('rating');
        	$review = $this->input->post('review');
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front_assets/images/testimonials/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials'=> $testimonials]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = $testimonialDet->image;
	        }

	        $updateData = array(
	        	'name' => $name,
	        	'designation' => $designation,
	        	'company' => $company,
	        	'rating' => $rating,
	        	'review' => $review,
	        	'image' => $image,
	        	'status' => $status
	        );
	        $updateResult = $this->AdminDashboard_Model->updateTestimonial($updateData, $tid);
	        if($updateResult){
	        	$this->session->set_flashdata('success_message','Testimonial Updated successfully');
	        	return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials' => $testimonials]);
	        }else{
	        	$this->session->set_flashdata('error_message','Testimonial not Updated. Try again later');
	        	return redirect('admin/Testimonials',['adminDetails' => $adminDetails, 'testimonials' => $testimonials]);
	        }

        }else{
        	$this->load->view('admin/testimonial/editTestimonial', ['adminDetails' => $adminDetails,'testimonialDet' => $testimonialDet]);
        }
		
	}

	public function deleteTestimonialImage($tid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$testimonials = $this->AdminDashboard_Model->getAllTestimonials();
		$testimonialDet = $this->AdminDashboard_Model->getTestimonialDet($tid);

		$path = "assets/front_assets/images/testimonials/".$testimonialDet->image;
		if(file_exists($path)){
			unlink($path);
			$updateData = array(
				'image' => ''
			);
			$imageUpdate = $this->AdminDashboard_Model->updateTestimonial($updateData,$tid);
			$this->session->set_flashdata('success_message','Image deleted successfully');
			return redirect('admin/Testimonials/editTestimonial/'.$tid,['adminDetails' => $adminDetails,'testimonialDet' => $testimonialDet]);
		}else{
			$this->session->set_flashdata('error_message','Image file is not found');
			return redirect('admin/Testimonials', ['adminDetails' => $adminDetails,'testimonials' => $testimonials]);
		}
	}

	public function deleteTestimonial($tid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$testimonials = $this->AdminDashboard_Model->getAllTestimonials();
		$testimonialDet = $this->AdminDashboard_Model->getTestimonialDet($tid);

		$path = "assets/front_assets/images/testimonials/".$testimonialDet->image;
		if(file_exists($path)){
			unlink($path);
		}
		$deleteTestimonialResult = $this->AdminDashboard_Model->deleteTestimonial($tid);
		if($deleteTestimonialResult){			
			$this->session->set_flashdata('success_message','Testimonial deleted successfully');
			return redirect('admin/Testimonials',['adminDetails' => $adminDetails,'testimonials' => $testimonials]);		
		}else{
			$this->session->set_flashdata('error_message','Testimonial not deleted');
			return redirect('admin/Testimonials',['adminDetails' => $adminDetails,'testimonials' => $testimonials]);		
		}
	}
}