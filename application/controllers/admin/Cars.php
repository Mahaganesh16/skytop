<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {

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
		$cars = $this->AdminDashboard_Model->getAllcars();
		$this->load->view('admin/cars/cars', ['adminDetails' => $adminDetails,'cars' => $cars]);
	}

	public function addCars()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getParentCategories();
		$this->form_validation->set_rules('parent', 'Parent', 'required');
        $this->form_validation->set_rules('car_name', 'Car Name', 'required');
        $this->form_validation->set_rules('car_seats', 'Car Seats', 'required');
        $this->form_validation->set_rules('ac_or_non_ac', 'AC OR NON AC', 'required');
        $this->form_validation->set_rules('luggage', 'Luggage', 'required');
        $this->form_validation->set_rules('km_price', 'KM Price', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run()){

        	$parent = $this->input->post('parent');
        	$car_name = $this->input->post('car_name');
        	$car_seats = htmlspecialchars($this->input->post('car_seats'));
        	$ac_or_non_ac = $this->input->post('ac_or_non_ac');
        	$luggage = $this->input->post('luggage');
        	$km_price = $this->input->post('km_price');
        	$status = $this->input->post('status');
        	$description = htmlspecialchars($this->input->post('description'));

        	$config['upload_path']          = 'assets/images/car_image/';
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
	        	'category' => $parent,
	        	'image' => $image,
	        	'car_name' => $car_name,
	        	'car_seats' => $car_seats,
	        	'ac_or_non_ac' => $ac_or_non_ac,
	        	'luggage' => $luggage,
	        	'km_price' => $km_price,
	        	'status' => $status,
	        	'description' => $description
	        );

	        $insertResult = $this->AdminDashboard_Model->insertCars($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Car added successfully');
	        	return redirect('admin/Cars',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }else{
	        	$this->session->set_flashdata('error_message','Car not added successfully');
	        	return redirect('admin/Cars',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }

        }else{
        	$this->load->view('admin/cars/addCars', ['adminDetails' => $adminDetails, 'categories' => $categories]);
        }		
	}

	public function editCategory($cid)
	{ 

		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getAllCategories();
		$categoryDet = $this->AdminDashboard_Model->getCategoryDet($cid);
		$this->form_validation->set_rules('parent', 'Parent', 'required');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){

        	$parent = $this->input->post('parent');
        	$category_name = $this->input->post('category_name');
        	$description = htmlspecialchars($this->input->post('description'));
        	$status = $this->input->post('status');

        	$config['upload_path']          = 'assets/front/images/categories/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['image']['name'])){
	            if ( ! $this->upload->do_upload('image'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Category',['adminDetails' => $adminDetails, 'categories'=> $categories, 'categoryDet' => $categoryDet]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $image = $data['file_name'];
	            }
	        }else{
	        	$image = $categoryDet->image;
	        }

	        $updateData = array(
	        	'parent' => $parent,
	        	'image' => $image,
	        	'category_name' => $category_name,
	        	'description' => $description,
	        	'status' => $status
	        );

	        $updatedResult = $this->AdminDashboard_Model->updateCategory($updateData, $cid);
	        if($updatedResult){
	        	$this->session->set_flashdata('success_message','Category updated successfully');
	        	return redirect('admin/Category',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }else{
	        	$this->session->set_flashdata('error_message','Category not updated successfully');
	        	return redirect('admin/Category',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }

        }else{
        	$this->load->view('admin/category/editCategory', ['adminDetails' => $adminDetails, 'categories' => $categories, 'categoryDet' => $categoryDet]);
        }		
	}

	public function deleteCategoryImage($cid)
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

	public function deleteCategory($cid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$categories = $this->AdminDashboard_Model->getAllCategories();
		$categoryDet = $this->AdminDashboard_Model->getCategoryDet($cid);

		if(!empty($categoryDet->image)){	
			$path = "assets/front/images/categories/".$categoryDet->image;
			if(file_exists($path)){
				unlink($path);
			}
		}

		$deleteResult = $this->AdminDashboard_Model->deleteCategory($cid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Category Deleted Successfully');
			return redirect('admin/Category',['adminDetails' => $adminDetails, 'categories' => $categories]);
		}else{
			$this->session->set_flashdata('error_message','Category not deleted. Try Again Later');
			return redirect('admin/Category', ['adminDetails' => $adminDetails, 'categories' => $categories]);
		}
	}
	
}