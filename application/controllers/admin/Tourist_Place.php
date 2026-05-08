<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tourist_Place extends CI_Controller {

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
		$tourist_place = $this->AdminDashboard_Model->getAlltouristPlace();
		$this->load->view('admin/tourist_place/touristPlace', ['adminDetails' => $adminDetails,'tourist_place' => $tourist_place]);
	}

	public function addTourist_Place()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getParentCategories();
		$this->form_validation->set_rules('tourist_place', 'Tourist Place', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
      
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
 
        if ($this->form_validation->run()){

        	$config['upload_path']          = 'assets/images/tourist_place/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'categories'=> $categories]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = '';
	        }
	        

	        $insertData = array(
	        	'place' => $this->input->post('tourist_place'),
	        	'district' => $this->input->post('district'),
	        	'image' => $image,
	        	'status' => $this->input->post('status'),
	        	'description' => $this->input->post('description')
	        );

	        $insertResult = $this->AdminDashboard_Model->insertTourist_place($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Tourist Place added successfully');
	        	return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }else{
	        	$this->session->set_flashdata('error_message','Tourist Place not added successfully');
	        	return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }

        }else{
        	$this->load->view('admin/tourist_place/addTouristPlace', ['adminDetails' => $adminDetails, 'categories' => $categories]);
        }		
	}

	public function editTourist_Place($cid)
	{ 

		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		
		$tourist_place = $this->AdminDashboard_Model->getAlltouristPlace();
		$getTourist_PlaceDet = $this->AdminDashboard_Model->getTourist_Place($cid);
		$this->form_validation->set_rules('tourist_place', 'Tourist Place', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
      
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run()){

        	

        	$config['upload_path']          = 'assets/images/tourist_place/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'tourist_place'=> $tourist_place]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = $getTourist_PlaceDet->image;
	        }

	        $updateData = array(
	        	'place' => $this->input->post('tourist_place'),
	        	'district' => $this->input->post('district'),
	        	'image' => $image,
	        	'status' => $this->input->post('status'),
	        	'description' => $this->input->post('description')
	        );

	        $updatedResult = $this->AdminDashboard_Model->updateTourist_place($updateData, $cid);
	        if($updatedResult){
	        	$this->session->set_flashdata('success_message','Tourist Place updated successfully');
	        	return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'tourist_place' => $tourist_place]);
	        }else{
	        	$this->session->set_flashdata('error_message','Tourist Place not updated successfully');
	        	return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'tourist_place' => $tourist_place]);
	        }

        }else{
        	$this->load->view('admin/tourist_place/edittourist_place', ['adminDetails' => $adminDetails, 'tourist_place' => $tourist_place, 'getTourist_PlaceDet' => $getTourist_PlaceDet]);
        }		
	}

	public function deleteTouristPlaceImage($cid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getAllCategories();
		$categoryDet = $this->AdminDashboard_Model->getCategoryDet($cid);

		$path = "assets/front/images/categories/".$categoryDet->image;
		
		if(file_exists($path)){
			unlink($path);
			$updateData = array(
				'image' => ''
			);
			$categoryImage = $this->AdminDashboard_Model->updateCategory($updateData,$cid);
			if($categoryImage){
				$this->session->set_flashdata('success_message','Category Image deleted successfully');
				return redirect('admin/Category/editCategory/'.$cid,['adminDetails' => $adminDetails,'categoryDet'=>$categoryDet, 'categories' => $categories]);
			}else{
				$this->session->set_flashdata('error_message','Category Image not deleted.');
				return redirect('admin/Category/editCategory/'.$cid,['adminDetails' => $adminDetails,'categoryDet'=>$categoryDet, 'categories' => $categories]);
			}
		}else{
			$this->session->set_flashdata('error_message','Image file is not found');
			return redirect('admin/Category/editCategory/'.$cid,['adminDetails' => $adminDetails,'categoryDet'=>$categoryDet, 'categories' => $categories]);
		}
	}

	public function deleteTourist_Place($cid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid'); 
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$tourist_place = $this->AdminDashboard_Model->getAlltouristPlace();
		$getTourist_PlaceDet = $this->AdminDashboard_Model->getTourist_Place($cid);

		if(!empty($getTourist_PlaceDet->image)){	
			$path = "assets/images/tourist_place/".$getTourist_PlaceDet->image;
			if(file_exists($path)){
				unlink($path);
			}
		}

		$deleteResult = $this->AdminDashboard_Model->deleteTourist_Place($cid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Tourist Place Deleted Successfully');
			return redirect('admin/Tourist_Place',['adminDetails' => $adminDetails, 'tourist_place' => $tourist_place]);
		}else{
			$this->session->set_flashdata('error_message','Tourist Place not deleted. Try Again Later');
			return redirect('admin/Tourist_Place', ['adminDetails' => $adminDetails, 'tourist_place' => $tourist_place]);
		}
	}
	
}