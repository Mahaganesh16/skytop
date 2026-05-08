<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {


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
		$pages = $this->AdminDashboard_Model->getAllPages();
		$this->load->view('admin/page/pages', ['adminDetails' => $adminDetails,'pages' => $pages]);
	}

	public function addPage()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$pages = $this->AdminDashboard_Model->getAllPages();
		$this->form_validation->set_rules('page_name', 'Page Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('page_content', 'Page Content', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
			$page_name = $this->input->post('page_name');
			$slug = $this->input->post('slug');
			$page_content = htmlspecialchars($this->input->post('page_content'));
			$status = $this->input->post('status');

			$config['upload_path']          = 'assets/front_assets/images/page_banners/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['banner']['name'])){
	            if ( ! $this->upload->do_upload('banner'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages'=> $pages]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $banner = $data['file_name'];
	            }
	        }else{
	        	$banner = '';
	        }

	        $insertData = array(
	        	'page_name' => $page_name,
	        	'slug' => $slug,
	        	'page_content' => $page_content,
	        	'banner' => $banner,
	        	'status' => $status
	        );

	        $insertResult = $this->AdminDashboard_Model->insertPage($insertData);

	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Page Added Successfully');
	        	return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages' => $pages]);
	        }else{
	        	$this->session->set_flashdata('error_message','Page Not Added. Try again later');
	        	return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages' => $pages]);
	        }

		}else{
			$this->load->view('admin/page/addPage',['adminDetails' => $adminDetails]);
		}
	}

	public function editPage($pid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$pages = $this->AdminDashboard_Model->getAllPages();
		$pageDetail = $this->AdminDashboard_Model->getPageDetail($pid);
		$this->form_validation->set_rules('page_name', 'Page Name', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('page_content', 'Page Content', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run()){
			$page_name = $this->input->post('page_name');
			$slug = $this->input->post('slug');
			$page_content = htmlspecialchars($this->input->post('page_content'));
			$status = $this->input->post('status');

			$config['upload_path']          = 'assets/front_assets/images/page_banners/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

        	if(!empty($_FILES['banner']['name'])){
	            if ( ! $this->upload->do_upload('banner'))
	            {
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error_message',$error);
	                return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages'=> $pages]);	               	
	            }else
	            {
	                $data = $this->upload->data();
	                $banner = $data['file_name'];
	            }
	        }else{
	        	$banner = $pageDetail->banner;
	        }

	        $updateData = array(
	        	'page_name' => $page_name,
	        	'slug' => $slug,
	        	'page_content' => $page_content,
	        	'banner' => $banner,
	        	'status' => $status
	        );

	        $updateResult = $this->AdminDashboard_Model->updatePage($updateData, $pid);

	        if($updateResult){
	        	$this->session->set_flashdata('success_message','Page Updated Successfully');
	        	return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages' => $pages]);
	        }else{
	        	$this->session->set_flashdata('error_message','Page Not Updated. Try again later');
	        	return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages' => $pages]);
	        }

		}else{
			$this->load->view('admin/page/editPage',['adminDetails' => $adminDetails,'pageDetail' => $pageDetail]);
		}
	}

	public function deleteBannerImage($pid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$pages = $this->AdminDashboard_Model->getAllPages();
		$pageDetail = $this->AdminDashboard_Model->getPageDetail($pid);

		$path = "assets/front_assets/images/page_banners/".$pageDetail->banner;
		
		if(file_exists($path)){
			unlink($path);
			$updateData = array(
				'banner' => ''
			);
			$bannerImage = $this->AdminDashboard_Model->updatePage($updateData,$pid);
			if($bannerImage){
				$this->session->set_flashdata('success_message','Banner deleted successfully');
				return redirect('admin/Pages/editPage/'.$pid,['adminDetails' => $adminDetails,'pageDetail'=>$pageDetail]);
			}else{
				$this->session->set_flashdata('error_message','Banner not deleted.');
				return redirect('admin/Pages/editPage/'.$pid,['adminDetails' => $adminDetails,'pageDetail'=>$pageDetail]);
			}
		}else{
			$this->session->set_flashdata('error_message','Image file is not found');
			return redirect('admin/Pages/editPage/'.$pid,['adminDetails' => $adminDetails,'pageDetail'=>$pageDetail]);
		}
	}

	public function deletePage($pid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$pages = $this->AdminDashboard_Model->getAllPages();
		$pageDetail = $this->AdminDashboard_Model->getPageDetail($pid);

		if(!empty($pageDetail->banner)){			
			$path = "assets/front_assets/images/page_banners/".$pageDetail->banner;
			if(file_exists($path)){
				unlink($path);
			}
		}

		$deleteResult = $this->AdminDashboard_Model->deletePage($pid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Page Deleted Successfully');
			return redirect('admin/Pages',['adminDetails' => $adminDetails, 'pages' => $pages]);
		}else{
			$this->session->set_flashdata('error_message','Page not deleted. Try Again Later');
			return redirect('admin/Pages', ['adminDetails' => $adminDetails, 'pages' => $pages]);
		}
	}
}
