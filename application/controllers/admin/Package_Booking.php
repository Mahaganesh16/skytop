<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package_Booking extends CI_Controller {

	
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
		$booking = $this->AdminDashboard_Model->getAllPackage_Booking();
		$this->load->view('admin/package_booking', ['adminDetails' => $adminDetails,'booking' => $booking]);
	}
	 
}