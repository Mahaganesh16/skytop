<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    Class Slider extends CI_Controller {

        function __construct(){
            parent::__construct();
            if(! $this->session->userdata('adid'))
            redirect('admin/login');
        }

        public function index(){
            $this->load->model('admin/AdminDashboard_Model');
            $adid = $this->session->userdata('adid');
            $adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
            $slider=$this->AdminDashboard_Model->getAllSliders();
            // echo "<pre>"print_r($slider);die();
            $this->load->view('admin/slider/slider',['adminDetails' => $adminDetails,'slider'=>$slider]);
        }

        public function delete($uid)
        {
            $this->load->model('admin/AdminDashboard_Model');
            $this->AdminDashboard_Model->deleteSlider($uid);
            $this->session->set_flashdata('success', 'Slider data deleted');
            redirect('admin/Slider');
        }

        public function addSlider()
        {
            $this->load->model('admin/AdminDashboard_Model');
            $adid = $this->session->userdata('adid');
            $adminDetails = $this->AdminDashboard_Model->getAdminDetails($adid);
            if(empty($_FILES['image']['name'])){
                $this->form_validation->set_rules('image','Slider Image
                    ','required');
            }
            $this->form_validation->set_rules('title','Slider Title','required');
            $this->form_validation->set_rules('description','Slider Description','required');
            $this->form_validation->set_rules('btn_txt','Slider Button Text','required');
            $this->form_validation->set_rules('btn_link','Slider Link','required');
            $this->form_validation->set_rules('status','Status','required');
            
            if($this->form_validation->run()){
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $button = $this->input->post('btn_txt');
                $link = $this->input->post('btn_link');
                $status = $this->input->post('status');

                $config['upload_path'] = 'assets/website/images/slider/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }

                $insertData = array(
                    'image' => $image,
                    'title' => $title,
                    'description' => $description,
                    'button_txt ' => $button,
                    'button_link' => $link,
                    'status' => $status
                );

                $this->load->model('admin/AdminDashboard_Model');
                $result = $this->AdminDashboard_Model->addSlider($insertData);
                if($result){
                    $this->session->set_flashdata('success', 'Added successfully');
                    redirect('admin/Slider');
                }else{
                    $this->session->set_flashdata('error', 'Not Added. Try again later');
                    redirect('admin/Slider/addSlider');
                }
            }else{
                $this->load->view('admin/slider/addslider',['adminDetails' => $adminDetails]);
            }
        }
         public function updateSlider($id)
        {
            
            if(empty($_FILES['image']['name'])){
                $this->form_validation->set_rules('image','Slider Image
                    ','required');
            }
            $this->form_validation->set_rules('title','Slider Title','required');
            $this->form_validation->set_rules('description','Slider Description','required');
            $this->form_validation->set_rules('button','Slider Button Text','required');
            $this->form_validation->set_rules('status','Status','required');
            
            if($this->form_validation->run()){
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $button = $this->input->post('button');
                $status = $this->input->post('status');

                $config['upload_path'] = 'assets/panel_assets/images/slider/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $_FILES['image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }

                $insertData = array(
                    'image' => $image,
                    'title' => $title,
                    'description' => $description,
                    'button' => $button,
                    'status' => $status
                );
                // echo "string";die();
                $this->load->model('admin/AdminDashboard_Model');
                $result = $this->AdminDashboard_Model->updateSlide($id,$insertData);
                if($result){
                    $this->session->set_flashdata('success', 'Updated successfully');
                    redirect('admin/Slider');
                }else{
                    $this->session->set_flashdata('error', 'Not Updated. Try again later');
                    redirect('admin/Slider');
                }
            }else{
                $this->load->view('admin/slider/slider');
            }
        }
        public function edit($id)
    {
        $this->load->model("admin/AdminDashboard_Model");
        $editData=$this->AdminDashboard_Model->editdata($id);    
        $this->load->view("admin/slider/editslide",['editData' => $editData]);
    }
    }