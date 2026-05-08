<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Themes extends CI_Controller {

	
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
		$themes = $this->AdminDashboard_Model->getAllThemes();
		$this->load->view('admin/theme/themes', ['adminDetails' => $adminDetails,'themes' => $themes]);
	}

	public function addTheme()
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$themes = $this->AdminDashboard_Model->getAllThemes();
		$this->form_validation->set_rules('theme_name', 'Theme Name', 'required');
		if(empty($_FILES['image']['name'])){
			$this->form_validation->set_rules('image', 'Screenshot Image', 'required');
		}
		if(empty($_FILES['zip']['name'])){
			$this->form_validation->set_rules('zip', 'Screenshot Image', 'required');
		}
		$this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run()){

        	$theme_name = $this->input->post('theme_name');
        	$slug = $this->input->post('slug');
        	$description = htmlspecialchars($this->input->post('description'));
        	$status = $this->input->post('status');

        	//screenshot upload
        	$screenshot_config['upload_path']          = 'assets/builder_assets/themes/';
            $screenshot_config['allowed_types']        = '*';

            $this->load->library('upload', $screenshot_config);

            $this->upload->initialize($screenshot_config);

            if ( ! $this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$error);
                return redirect('admin/Themes',['adminDetails' => $adminDetails, 'themes'=> $themes]);	               	
            }else
            {
                $data = $this->upload->data();
                $image = $data['file_name'];
            }

            
			// Unzip selected zip file
				
			
			$filename = $_FILES['zip']['name'];


			// Get file extension
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			$valid_ext = array('zip');

			// Check extension
			if(in_array(strtolower($ext),$valid_ext)){
			  	$tmp_name = $_FILES['zip']['tmp_name'];

			  	$zip = new ZipArchive;
			  	$res = $zip->open($tmp_name);
			  	if ($res === TRUE) {
			   		$path = "assets/builder_assets/themes/";
				    // Extract file
				    $zip->extractTo($path);
				    $zip->close();
			   		$theme_file = $filename;
			  	} else {
			   		$this->session->set_flashdata('error_message','Zip File Failed to upload. Try Again later');
                	$this->load->view('admin/theme/addTheme', ['adminDetails' => $adminDetails,'themes' => $themes]);
			  	}
			}else{
			  	$this->session->set_flashdata('error_message','Choose Zip File Only');
                $this->load->view('admin/theme/addTheme', ['adminDetails' => $adminDetails,'themes' => $themes]);
			}
			 
			$insertData = array(
				'slug' => $slug,
				'theme_name' => $theme_name,
				'image' => $image,
				'description' => $description,
				'theme_files' => $theme_file,
				'status' => $status
			);

			//echo "<pre>";print_r($insertData);die();

			$insertResult = $this->AdminDashboard_Model->insertTheme($insertData);
	        if($insertResult){
	        	$this->session->set_flashdata('success_message','Theme added successfully');
	        	return redirect('admin/Themes',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }else{
	        	$this->session->set_flashdata('error_message','Theme not added successfully');
	        	return redirect('admin/Themes',['adminDetails' => $adminDetails, 'categories' => $categories]);
	        }

        }else{
        	$this->load->view('admin/theme/addTheme', ['adminDetails' => $adminDetails,'themes' => $themes]);
        }		
	}

	

	public function deleteTheme($tid)
	{
		$this->load->model('admin/AdminDashboard_Model');
		$adid = $this->session->userdata('adid');
		$adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
		$themes = $this->AdminDashboard_Model->getAllThemes();
		$themeDet = $this->AdminDashboard_Model->getThemeDet($tid);

		$file_name = explode('.', $themeDet->theme_files);
		$dirname = 'assets/builder_assets/themes/'.$file_name[0];

		function delete_directory($dirname) {
	         if (is_dir($dirname))
	           $dir_handle = opendir($dirname);
		     if (!$dir_handle)
		          return false;
		     while($file = readdir($dir_handle)) {
		           if ($file != "." && $file != "..") {
		                if (!is_dir($dirname."/".$file))
		                     unlink($dirname."/".$file);
		                else
		                     delete_directory($dirname.'/'.$file);
		           }
		     }
		     closedir($dir_handle);
		     rmdir($dirname);
		     return true;
		}

	    if(delete_directory($dirname)){
	    	$path = "assets/builder_assets/themes/".$themeDet->image;
		
			if(file_exists($path)){
				unlink($path);
			}
	    }

	    $deleteResult = $this->AdminDashboard_Model->deleteTheme($tid);
		if($deleteResult){
			$this->session->set_flashdata('success_message','Theme Deleted Successfully');
			return redirect('admin/Themes',['adminDetails' => $adminDetails,'themes' => $themes]);
		}else{
			$this->session->set_flashdata('error_message','Theme not deleted. Try Again Later');
			return redirect('admin/Themes', ['adminDetails' => $adminDetails,'themes' => $themes]);
		}
	}

	
}