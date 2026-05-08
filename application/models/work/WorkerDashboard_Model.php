<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class WorkerDashboard_Model extends CI_Model {


		public function getAvailableWorker()
		{
			$query = $this->db->select('*')->where('working_status',0)->get('worker')->result();
		     ;
		    return $query;
		}
		
	}
