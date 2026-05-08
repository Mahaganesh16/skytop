<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {


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
		$menus = $this->AdminDashboard_Model->getAllMenus();
		$this->load->view('admin/menu/menus', ['adminDetails' => $adminDetails,'menus' => $menus]);
	}

	public function addMenu()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$menus = $this->AdminDashboard_Model->getAllMenus();

		$this->form_validation->set_rules('parent', 'Parent', 'required');
		$this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){

        	$parent = $this->input->post('parent');
        	$menu = $this->input->post('menu');
        	$slug = $this->input->post('slug');
        	$url = $this->input->post('url');
        	$status = $this->input->post('status');

        	$insertData = array(
        		'parent' => $parent,
        		'menu' => $menu,
        		'slug' => $slug,
        		'url' => $url,
        		'status' => $status
        	);
        	$insertResult = $this->AdminDashboard_Model->insertMenu($insertData);
        	if($insertResult){
        		$this->session->set_flashdata('success_message','Menu Added Successfully');
        		return redirect('admin/Menus',['adminDetails' => $adminDetails,'menus' => $menus]);
        	}else{
        		$this->session->set_flashdata('error_message','Menu not added. Try again later');
        		return redirect('admin/Menus',['adminDetails' => $adminDetails, 'menus' => $menus]);
        	}

        }else{
			$this->load->view('admin/menu/addMenu', ['adminDetails' => $adminDetails,'menus' => $menus]);	
        }
	}

	public function editMenu($mid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$menus = $this->AdminDashboard_Model->getAllMenus();
		$menuDetail = $this->AdminDashboard_Model->getMenuDetail($mid); 

		$this->form_validation->set_rules('parent', 'Parent', 'required');
		$this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){

        	$parent = $this->input->post('parent');
        	$menu = $this->input->post('menu');
        	$slug = $this->input->post('slug');
        	$url = $this->input->post('url');
        	$status = $this->input->post('status');

        	$updateData = array(
        		'parent' => $parent,
        		'menu' => $menu,
        		'slug' => $slug,
        		'url' => $url,
        		'status' => $status
        	);
        	$updateResult = $this->AdminDashboard_Model->updateMenu($updateData, $mid);
        	if($updateResult){
        		$this->session->set_flashdata('success_message','Menu Updated Successfully');
        		return redirect('admin/Menus',['adminDetails' => $adminDetails,'menus' => $menus]);
        	}else{
        		$this->session->set_flashdata('error_message','Menu not Updated. Try again later');
        		return redirect('admin/Menus',['adminDetails' => $adminDetails, 'menus' => $menus]);
        	}

        }else{
			$this->load->view('admin/menu/editMenu', ['adminDetails' => $adminDetails,'menus'=>$menus,'menuDetail' => $menuDetail]);	
        }
	}

	public function deleteMenu($mid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$menus = $this->AdminDashboard_Model->getAllMenus();
		
		$deleteResult = $this->AdminDashboard_Model->deleteMenu($mid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Menu Deleted Successfully');
			return redirect('admin/Menus',['adminDetails' => $adminDetails, 'menus' => $menus]);
		}else{
			$this->session->set_flashdata('error_message','Menu not deleted. Try again later');
			return redirect('admin/Menus',['adminDetails' => $adminDetails, 'menus' => $menus]);
		}
	}
}