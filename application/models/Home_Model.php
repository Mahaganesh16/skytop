<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home_Model extends CI_Model {

		public function insertCustomerDet($insertCustomerDet)
		{
			$result = $this->db->insert('level1',$insertCustomerDet);

			return $result;
			
			
		}
		public function insert_package_booking($insertCustomerDet)
		{
			$result = $this->db->insert('package_booking',$insertCustomerDet);

			return $result;
		}
		public function getAllcars($value='')
		{
			$query = $this->db->select('*')->get('cars')->result();
		     
		    return $query;
		}

		public function getAllCoupons($value='')
		{
			$query = $this->db->select('*')->get('coupons')->result();
		     
		    return $query;
		}

		// public function getcarDet($id)
		// {
		// 	$query = $this->db->select('*')->where('id',$id)->get('cars')->row();
		     
		//     return $query;
		// }
		public function getUserDetails($value='')
		{
			$query = $this->db->select('*')->where('id',$id)->get('booking')->row();
		     
		    return $query;
		}
		public function getcarDet($id)
		{
			$query = $this->db->select('*')->where('id',$id)->get('cars')->row();
		     
		    return $query;
		}

		public function updatebookingDetail($customer_id,$updatearray)
		{
			$query = $this->db->where('cid',$customer_id)->update('level1',$updatearray);
		     
		    return $query;
		}
		public function updateAddress($customer_id,$updateaddress)
		{
			$query = $this->db->where('cid',$customer_id)->update('level1',$updateaddress);
		     
		    return $query;
		}
		public function bookingDetails($customer_id)
		{
			$query = $this->db->select('*')->where('cid',$customer_id)->get('level1')->row();
		    return $query;
		}
		public function update_origin_Latlng($mnumber,$updatearray)
		{
			$query = $this->db->where('cid',$mnumber)->update('level1',$updatearray);
		     
		    return $query;
		}
		public function update_destination_Latlng($mnumber,$updatearray)
		{
			$query = $this->db->where('mobile_no',$mnumber)->update('level1',$updatearray);
		     
		    return $query;
		}
		public function getaddressDet($cid)
		{
			$query = $this->db->select('*')->where('cid',$cid)->get('level1')->row();
		    return $query;
		}
		
	}
