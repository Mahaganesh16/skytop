<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class AdminDashboard_Model extends CI_Model {

		public function getAdminDetails($adid)
		{
			$query = $this->db->select('*')->where(['id' => $adid])->get('admins')->row();
		     ;
		    return $query;
		}

		public function GetAllWorkers()
		{
			$query = $this->db->select('*')->get('worker')->result();
		     ;
		    return $query;
		}
		public function updateProfile($updateData, $adid)
		{
			$query = $this->db->where('id', $adid)->update('admins',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}


		public function getAllcars($value='')
		{
			$query = $this->db->select('*')->get('cars')->result();
		     ;
		    return $query;
		}
		
		public function insertCars($insertData)
		{
			
			$sql_query=$this->db->insert('cars',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function insertAdmin($insertData)
		{
			
			$sql_query=$this->db->insert('admins',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}



		public function deleteSubAdmin($aid)
		{
			$query = $this->db->where('id', $aid)->delete('admins');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllCategories()
		{
			$query = $this->db->select('*')->get('categories')->result();
		     ;
		    return $query;
		}

		public function getParentCategories()
		{
			$query = $this->db->select('*')->where('parent','0')->get('categories')->result();
		     ;
		    return $query;
		}

		public function insertWorker($insertData)
		{
			$sql_query=$this->db->insert('worker',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}
		public function insertCategory($insertData)
		{
			$sql_query=$this->db->insert('categories',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}
		public function getCategoryDet($cid)
		{
			$query = $this->db->select('*')->where(['id' => $cid])->get('categories')->row();
		     
		    return $query;
		}

		public function updateCategory($updateData, $cid)
		{
			$query = $this->db->where('id', $cid)->update('categories',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteCategory($cid)
		{
			$query = $this->db->where('id', $cid)->delete('categories');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllPages()
		{
			$query = $this->db->select('*')->get('pages')->result();
		     ;
		    return $query;
		}

		

		public function insertPage($insertData)
		{
			$sql_query=$this->db->insert('pages',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getPageDetail($pid)
		{
			$query = $this->db->select('*')->where(['id' => $pid])->get('pages')->row();
		     ;
		    return $query;
		}

		public function updatePage($updateData, $pid)
		{
			$query = $this->db->where('id', $pid)->update('pages',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deletePage($pid)
		{
			$query = $this->db->where('id', $pid)->delete('pages');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllMenus()
		{
			$query = $this->db->select('*')->get('menus')->result();
		     ;
		    return $query;
		}
		

		public function insertMenu($insertData)
		{
			$sql_query=$this->db->insert('menus',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getMenuDetail($mid)
		{
			$query = $this->db->select('*')->where(['id' => $mid])->get('menus')->row();
		     ;
		    return $query;
		}

		public function updateMenu($updateData, $mid)
		{
			$query = $this->db->where('id', $mid)->update('menus',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteMenu($mid)
		{
			$query = $this->db->where('id', $mid)->delete('menus');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllBooking()
		{
			$query = $this->db->select('*')->get('level1')->result();
		     ;
		    return $query;
		}
		public function getAllPackage_Booking($value='')
		{
			$query = $this->db->select('*')->get('package_booking')->result();
		     ;
		    return $query;
		}

		public function insertTestimonial($insertData)
		{
			$sql_query=$this->db->insert('testimonials',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getWorkerDet($id)
		{
			$query = $this->db->select('*')->where(['id' => $id])->get('worker')->row();
		     ;
		    return $query;
		}
		public function updateBookingDetailforPackage($updatedata,$bid)
		{
			$query = $this->db->where('id', $bid)->update('package_booking',$updatedata);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}
		public function updateBookingDetail($updatedata,$bid)
		{
			$query = $this->db->where('cid', $bid)->update('level1',$updatedata);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function updateWorker($updateData, $id)
		{
			$query = $this->db->where('id', $id)->update('worker',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteWorker($tid)
		{
			$query = $this->db->where('id', $tid)->delete('worker');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

	
		public function getWebsiteDet($wid)
		{
			$query = $this->db->select('*')->where(['id' => $wid])->get('sitesettings')->row();
		     ;
		    return $query;
		}
		
		public function updateSiteSettings($updateData, $wid)
		{
			$query = $this->db->where('id', $wid)->update('sitesettings',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllPlans()
		{
			$query = $this->db->select('*')->get('plan')->result();
		    return $query;
		}

		public function insertPlan($insertData)
		{
			$sql_query=$this->db->insert('plan',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getPlanDet($pid)
		{
			$query = $this->db->select('*')->where(['id' => $pid])->get('plan')->row();
		     
		    return $query;
		}

		public function updatePlan($updateData, $pid)
		{
			$query = $this->db->where('id', $pid)->update('plan',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deletePlan($pid)
		{
			$query = $this->db->where('id', $pid)->delete('plan');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllworker()
		{
			$query = $this->db->select('*')->get('worker')->result();
		     
		    return $query;
		}

		public function updateSellerStatus($seller_id, $updateData)
		{
			$query = $this->db->where('id', $seller_id)->update('seller',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAllSellersByPlan($plan_id)
		{
			$query = $this->db->select('*')->where(['plan' => $plan_id])->get('seller')->result();
		     
		    return $query;
		}

		public function getSellerDet($seller_id)
		{
			$query = $this->db->select('*')->where(['id' => $seller_id])->get('seller')->row();
		     
		    return $query;
		}

		public function getAllCoupons()
		{
			$query = $this->db->select('*')->get('coupons')->result();
		     
		    return $query;
		}

		public function insertCoupon($insertData)
		{
			$sql_query=$this->db->insert('coupons',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getCouponDet($cid)
		{
			$query = $this->db->select('*')->where(['id' => $cid])->get('coupons')->row();
		     
		    return $query;
		}

		public function updateCoupon($updateData, $cid)
		{
			$query = $this->db->where('id', $cid)->update('coupons',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteCoupon($cid)
		{
			$query = $this->db->where('id', $cid)->delete('coupons');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getAdsBySeller($seller_id)
		{
			$query = $this->db->select('*')->where(['seller_id' => $seller_id])->get('ads')->result();
		     
		    return $query;
		}

		public function insertAd($insertData)
		{
			$sql_query=$this->db->insert('ads',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getAdDet($aid)
		{
			$query = $this->db->select('*')->where(['id' => $aid])->get('ads')->row();
		     
		    return $query;
		}

		public function updateAd($updateData, $aid)
		{
			$query = $this->db->where('id', $aid)->update('ads',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteAd($id)
		{
			$query = $this->db->where('id', $id)->delete('ads');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getNumberofAds($seller_id)
		{
			$query = $this->db->select('*')->where(['seller_id' => $seller_id])->get('ads');
		     
		    return $query->num_rows();
		}
			
		public function getAllAdmins()
		{
			$query = $this->db->select('*')->where('id !=','1')->get('admins')->result();
		     
		    return $query;
		}

		public function getAllThemes()
		{
			$query = $this->db->select('*')->get('themes')->result();
		     
		    return $query;
		}


		public function insertTheme($insertData)
		{
			$sql_query=$this->db->insert('themes',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function getThemeDet($tid)
		{
			$query = $this->db->select('*')->where('id',$tid)->get('themes')->row();
		     
		    return $query;
		}

		public function deleteTheme($tid)
		{
			$query = $this->db->where('id', $tid)->delete('themes');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function getNumberofRowsWebsite($sid)
    	{
    		$query = $this->db->select('*')->where(['sid' => $sid])->get('website');
		     
		    return $query->num_rows();
    	}

    	public function updateWebsite($updateData, $sid)
    	{
    		$query = $this->db->where('sid', $sid)->update('website',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
    	}

    	public function insertWebsite($insertData)
    	{
			$sql_query=$this->db->insert('website',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
    	}

    	public function getWebsite($sid)
    	{
    		$query = $this->db->select('*')->where(['sid' => $sid])->get('website')->row();
		     
		    return $query;
    	}

    	public function getPublishRequest()
    	{
    		$query = $this->db->select('*')->where(['status' => '1'])->get('websitepublishrequest')->result();
		     
		    return $query;
    	}

    	public function getRequestDet($rid)
    	{
    		$query = $this->db->select('*')->where(['id' => $rid])->get('websitepublishrequest')->row();
		     
		    return $query;
    	}
    		public function getAllTemplate()
		{
			$query = $this->db->select('*')->get('email_template')->result();
		     ;
		    return $query;
		}
		
		public function insertTemplate($insertData)
		{
			$sql_query=$this->db->insert('email_template',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}
		public function NumberOfWorkers($value='')
		{
			$query = $this->db->query('SELECT * FROM worker');

			return $query->num_rows();
		}
		public function NumberOfUser($value='')
		{
			$query = $this->db->query('SELECT * FROM user');

			return $query->num_rows();
		}
		public function NumberOfsubadmin($value='')
		{
			$query = $this->db->query("SELECT * FROM admins WHERE type='sub-admin'");

			return $query->num_rows();
		}
		public function NumberOfpending($value='')
		{
			$query = $this->db->query("SELECT * FROM booking WHERE status='pending'");

			return $query->num_rows();
		}
		public function NumberOfcancelBooking($value='')
		{
			$query = $this->db->query("SELECT * FROM booking WHERE status='cancel'");

			return $query->num_rows();
		}
		public function NumberOfcompleteBooking($value='')
		{
			$query = $this->db->query("SELECT * FROM booking WHERE status='complete'");

			return $query->num_rows();
		}

		// Slider 
		public function getAllSliders()
		{
			$query = $this->db->select('*')->get('slider')->result();
		     ;
		    return $query;
		}

		

		public function addSlider($insertData)
		{
			$sql_query=$this->db->insert('slider',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}

		public function geSliderDetail($id)
		{
			$query = $this->db->select('*')->where(['id' => $pid])->get('slider')->row();
		     ;
		    return $query;
		}
		public function getAlltouristPlace($value='')
		{
			$query = $this->db->select('*')->get('tourist_place')->result();
		     ;
		    return $query;
		}
		public function insertTourist_place($insertData)
		{
			$sql_query=$this->db->insert('tourist_place',$insertData);
			if($sql_query){
				return 1;
			}
			else{
				return 0;
			}
		}
		public function getbookingDet($bid)
		{
			$query = $this->db->select('*')->where(['cid' => $bid])->get('level1')->row();
		     ;
		    return $query;
		}
		
		public function getbookingDetbyid($bid)
		{
			$query = $this->db->select('*')->where(['id' => $bid])->get('package_booking')->row();
		     ;
		    return $query;
		}
		public function getTourist_Place($cid)
		{
			$query = $this->db->select('*')->where(['id' => $cid])->get('tourist_place')->row();
		     ;
		    return $query;
		}
		public function deleteTourist_Place($cid)
		{
			$query = $this->db->where('id', $cid)->delete('tourist_place');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}
		public function updateTourist_place($updateData, $cid)
		{
			$query = $this->db->where('id', $cid)->update('tourist_place',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}
		
		public function updateSlider($updateData, $id)
		{
			$query = $this->db->where('id', $pid)->update('slider',$updateData);
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

		public function deleteSlider($id)
		{
			$query = $this->db->where('id', $pid)->delete('slider');
			if($query){
				return 1;
			}else{
				return 0;
			}
		}

	}
?>