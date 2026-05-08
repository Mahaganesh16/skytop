<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class CustomerDashboard_Model extends CI_Model {

		public function getAdminDetails($adid)
		{
			$query = $this->db->select('*')->where(['id' => $adid])->get('cab_customer')->row();
		     ;
		    return $query;
		}
	}
