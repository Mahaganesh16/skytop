 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function bookPackage($pname)
	{
		$this->load->model('Home_Model');
		$unique_id = "SKY".rand(9999,100000);
		$insertCustomerDet = array(
			'cid' => $unique_id, 
			'name' => $this->input->post('name'),
			'mobile_no' => $this->input->post('mnumber1'),
			'package_name' => $pname,
			'address' => $this->input->post('address')
		);
		$result = $this->Home_Model->insert_package_booking($insertCustomerDet);
		if($result)
		{
				redirect('booking_success'); 
		}else{

		}
		
	}
	public function index()
	{
	    
		
		$this->load->model('Home_Model');
		$this->load->model('admin/AdminDashboard_Model');
		$tourist_place = $this->AdminDashboard_Model->getAlltouristPlace();
    	$this->form_validation->set_rules('mobile_number','Mobile Number','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('from_address','From Address','required');
		$this->form_validation->set_rules('to_address','To address','required');
		
		if($this->form_validation->run())
		{ 
			$unique_id = "SKY".rand(9999,100000);
			$insertCustomerDet = array(
				'cid' => $unique_id,
				'firstName' => '',
				'lastName' => '',
				'email' => '',
				'from_address' => $this->input->post('from_address'),
				'to_address' => $this->input->post('to_address'),
				'origin_latlng' => $this->input->post('origin_latlng'),
				'destination_latlng' => $this->input->post('destination_latlng'),
				'mobile_no' => $this->input->post('mobile_number'),
				'program_date' => $this->input->post('datepicker'),
				'drop_off_date' => $this->input->post('drop_off_date'),
				'passenger' => $this->input->post('passenger'),
				
				'address' => '',
				'promo_code' => '',
				'car_type' => $this->input->post('car_type')
			);
			$result = $this->Home_Model->insertCustomerDet($insertCustomerDet);
			if($result)
			{
				
				$this->session->set_userdata('customer_unique_id',$unique_id);
				$this->session->set_userdata('from_address',$this->input->post('from_address'));
				$this->session->set_userdata('to_address',$this->input->post('to_address'));

				$this->session->set_userdata('origin_latlng',$this->input->post('origin_latlng'));
				$this->session->set_userdata('destination_latlng',$this->input->post('destination_latlng'));

				$this->session->set_userdata('mobile_no',$this->input->post('mobile_number'));
				$this->session->set_userdata('date',$this->input->post('datepicker'));
				$this->session->set_userdata('time',$this->input->post('timepicker'));
				$config = array(
                    'protocol'     => 'smtp',
                    'smtp_host'    => 'mail.maduraiskytoptravels.com',
                    'smtp_port'    => 465,
                    'smtp_user'    => 'info@maduraiskytoptravels.com',        // your GoDaddy email
                    'smtp_pass'    => '@Shreetech2019*',          // your email password
                    'smtp_crypto'  => 'ssl',                          // 'ssl' for port 465
                    'mailtype'     => 'html',
                    'charset'      => 'utf-8',
                    'newline'      => "\r\n",
                    'crlf'         => "\r\n"
                );
                $this->load->library('email');
    			$this->email->initialize($config);
    			 $html = '
				<!DOCTYPE html>
				<html>
				<head>
				  <style>
				    body {
				      font-family: Arial, sans-serif;
				      background: #f5f5f5;
				      padding: 20px;
				    }
				    .mail-box {
				      max-width: 600px;
				      
				      background: #ffffff;
				      padding: 20px;
				      border-radius: 8px;
				    }
				    h2 {
				      color: #e53935;
				    }
				    table {
				      width: 100%;
				      border-collapse: collapse;
				      margin-top: 15px;
				    }
				    td {
				      padding: 10px;
				      border-bottom: 1px solid #ddd;
				    }
				    .label {
				      font-weight: bold;
				      color: #555;
				      width: 40%;
				    }
				  </style>
				</head>
				<body>

				<div class="mail-box">
				  <h2>Booking / Request Details</h2>

				  <table>
				    <tr>
				      <td class="label">Booking ID</td>
				      <td>'.$unique_id.'</td>
				    </tr>
				    <tr>
				      <td class="label">Mobile Number</td>
				      <td>'.$this->input->post("mobile_number").'</td>
				    </tr>
				    <tr>
				      <td class="label">Date</td>
				      <td>'.$this->input->post("datepicker").'</td>
				    </tr>
				    <tr>
				      <td class="label">From Address</td>
				      <td>'.$this->input->post("from_address").'</td>
				    </tr>
				    <tr>
				      <td class="label">To Address</td>
				      <td>'.$this->input->post("to_address").'</td>
				    </tr>
				    <tr>
				      <td class="label">Passenger Count</td>
				      <td>'.$this->input->post("passenger").'</td>
				    </tr>
				  </table>

				</div>

				</body>
				</html>';

    			$subject = "Booking / Request Details";
              $message = $html;
              $from_email = "info@maduraiskytoptravels.com"; 
              $to = "praveenshreetech@gmail.com";
              //  $headers = $from_email;  
                                   //Load email library 
            
           
            $this->email->from($from_email, 'Madurai Sky Top Travels'); 
            $this->email->to($to);
           // $this->email->to($company);
            $this->email->subject($subject); 
            $this->email->message($message);      
           
            if($this->email->send()){

                redirect('booking_success');
            }else{
                redirect('booking_success');
            }

					
			}else{
				$this->load->view('index');
			}
			
		}else{
			$this->load->view('index');
		}
		
	}

	public function all_cabs()
	{
		$this->load->model('Home_Model');
		$cars = $this->Home_Model->getAllcars();
		$coupons = $this->Home_Model->getAllCoupons();
		$this->load->view('all_cab',['cars' => $cars,'coupons' => $coupons]);
		
	}
  	public function tourist_place()
	{
		// $this->load->model('Home_Model'); 
		
		$this->load->view('tour_places');
		
	}
	public function cab_booking($cid)
	{
		$this->load->model('Home_Model');
		$address_Det = $this->Home_Model->getaddressDet($cid);
	
		$coupons = $this->Home_Model->getAllCoupons();
		$this->form_validation->set_rules('firstName','First Name','required');
		$this->form_validation->set_rules('lastName','Last Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('mobile_no','Mobile Number','required');
		$this->form_validation->set_rules('address','Address','required');
		if($this->form_validation->run())
		{
			
			$customer_det['firstName'] = $this->input->post('firstName');
			$customer_det['lastName'] = $this->input->post('lastName');
			$customer_det['email'] = $this->input->post('email');
			$customer_det['mobile_no'] = $this->input->post('mobile_no');
			$customer_det['address'] = $this->input->post('address');
			$customer_det['promo_code'] = $this->input->post('promo_code');
			$customer_det['from_address'] = $this->input->post('from_address');
			$customer_det['to_address'] = $this->input->post('to_address');

			$updateaddress = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
				'mobile_no' => $this->input->post('mobile_no'),
				'address' => $this->input->post('address'),
		        'from_address' => $this->input->post('from_address'),
		        'to_address' => $this->input->post('to_address'),
						'promo_code' => $this->input->post('promo_code')
 
			); 
			$result = $this->Home_Model->updateAddress($cid,$updateaddress);
			if($result)
			{
				$config = array(
                    'protocol'     => 'smtp',
                    'smtp_host'    => 'mail.maduraiskytoptravels.com',
                    'smtp_port'    => 465,
                    'smtp_user'    => 'info@maduraiskytoptravels.com',        // your GoDaddy email
                    'smtp_pass'    => '@Shreetech2019*',          // your email password
                    'smtp_crypto'  => 'ssl',                          // 'ssl' for port 465
                    'mailtype'     => 'html',
                    'charset'      => 'utf-8',
                    'newline'      => "\r\n",
                    'crlf'         => "\r\n"
                );
                $this->load->library('email');
    			$this->email->initialize($config);
				$html = '
					<!DOCTYPE html>
					<html>
					<head>
					  <meta charset="UTF-8">
					  <style>
					    body {
					      font-family: Arial, Helvetica, sans-serif;
					      background-color: #f4f6f8;
					      padding: 20px;
					    }
					    .container {
					      max-width: 600px;
					      margin: auto;
					      background: #ffffff;
					      border-radius: 8px;
					      padding: 20px;
					      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
					    }
					    h2 {
					      color: #d32f2f;
					      margin-bottom: 15px;
					    }
					    table {
					      width: 100%;
					      border-collapse: collapse;
					    }
					    td {
					      padding: 10px;
					      border-bottom: 1px solid #e0e0e0;
					      font-size: 14px;
					    }
					    .label {
					      font-weight: bold;
					      color: #555;
					      width: 40%;
					    }
					    .footer {
					      margin-top: 20px;
					      font-size: 12px;
					      color: #888;
					      text-align: center;
					    }
					  </style>
					</head>
					<body>

					<div class="container">
					  <h2>Customer Booking Details</h2>

					  <table>
					    <tr>
					      <td class="label">Customer ID</td>
					      <td>'.$this->session->userdata('customer_unique_id').'</td>
					    </tr>
					    <tr>
					      <td class="label">Customer Name</td>
					      <td>'.$this->input->post('firstName').'</td>
					    </tr>
					    <tr>
					      <td class="label">Mobile Number</td>
					      <td>'.$this->input->post('mobile_no').'</td>
					    </tr>
					    <tr>
					      <td class="label">Program Date</td>
					      <td>'.$address_Det->program_date.'</td>
					    </tr>
					    <tr>
					      <td class="label">From Address</td>
					      <td>'.$this->input->post('from_address').'</td>
					    </tr>
					    <tr>
					      <td class="label">To Address</td>
					      <td>'.$this->input->post('to_address').'</td>
					    </tr>
					  </table>

					  <div class="footer">
					    This email was generated automatically. Please do not reply.
					  </div>
					</div>

					</body>
					</html>';

				$subject = "Booking / Request Details";
	            $message = $html;
	            $from_email = "info@maduraiskytoptravels.com"; 
	            $to = "praveenshreetech@gmail.com";
				$this->email->from($from_email, 'Madurai Sky Top Travels'); 
	            $this->email->to($to);
	           // $this->email->to($company);
	            $this->email->subject($subject); 
	            $this->email->message($message);      
	           
	            if($this->email->send()){
	            	$message1 = '
						<!DOCTYPE html>
						<html>
						<head>
						  <meta charset="UTF-8">
						  <style>
						    body {
						      font-family: Arial, Helvetica, sans-serif;
						      background: #f4f6f8;
						      padding: 20px;
						    }
						    .mail-box {
						      max-width: 500px;
						      margin: auto;
						      background: #ffffff;
						      border-radius: 8px;
						      padding: 20px;
						    }
						    h3 {
						      color: #d32f2f;
						      margin-bottom: 15px;
						    }
						    table {
						      width: 100%;
						      border-collapse: collapse;
						    }
						    td {
						      padding: 10px;
						      border-bottom: 1px solid #e0e0e0;
						      font-size: 14px;
						    }
						    .label {
						      font-weight: bold;
						      color: #555;
						      width: 40%;
						    }
						  </style>
						</head>
						<body>

						<div class="mail-box">
						  <h3>Program Information</h3>

						  <table>
						    <tr>
						      <td class="label">Customer Name</td>
						      <td>'.$this->input->post('firstName').'</td>
						    </tr>
						    <tr>
						      <td class="label">Program Date</td>
						      <td>'.$address_Det->program_date.'</td>
						    </tr>
						    <tr>
						      <td class="label">Customer ID</td>
						      <td>'.$this->session->userdata('customer_unique_id').'</td>
						    </tr>
						  </table>
						</div>

						</body>
						</html>';
						$subject1 = "Booking / Request Details";
			            $message = $message1;
			            $from_email = "info@maduraiskytoptravels.com"; 
			            $to1 = $this->input->post('email');
						$this->email->from($from_email, 'Madurai Sky Top Travels'); 
			            $this->email->to($to1);
			           // $this->email->to($company);
			            $this->email->subject($subject1); 
			            $this->email->message($message1);
			            if($this->email->send()){
			                redirect('booking_success');
			            }else{
			                redirect('booking_success');
			            }
            
        
	      	}else{
				redirect('booking_success');
			}
        }
			
		}else{
			$this->load->view('cab_booking',['coupons' => $coupons,'address_Det' => $address_Det]);
		}
		
	}


	public function payment()
	{
		$this->load->model('Home_Model');
		$customer_id = $this->session->userdata('customer_unique_id');
		$bokkingDet = $this->Home_Model->bookingDetails($customer_id);
		$this->load->view('cab_booking_payment',['bokkingDet' => $bokkingDet]);
	}

	public function updateoriginLatlng($mnumber)
	{
		$this->load->model('Home_Model');
		$latlng = $this->input->post('latlng');
		$oaddress = $this->input->post('oaddress');
		$updatearray = array(
			'origin_latlng' => $latlng,
			'from_address' => $oaddress

		);
		$result = $this->Home_Model->update_origin_Latlng($mnumber,$updatearray);
		$this->session->set_userdata('origin_latlng',$latlng);
		$this->session->set_userdata('from_address',$oaddress);
		echo "success";
	}
	public function updatedestinationLatlng($mnumber)
	{
		$this->load->model('Home_Model');
		$latlng = $this->input->post('latlng');
		$daddress = $this->input->post('daddress');
		$updatearray = array(
			'destination_latlng' => $latlng,
			'to_address' => $daddress
		);
		$result = $this->Home_Model->update_destination_Latlng($mnumber,$updatearray);
		$this->session->set_userdata('destination_latlng',$latlng);
		$this->session->set_userdata('to_address',$daddress);
		echo "success";
	}

	public function booking_success($value='')
	{
		$this->load->model('Home_Model');
		$customer_id = $this->session->userdata('customer_unique_id');
		$bokkingDet = $this->Home_Model->bookingDetails($customer_id);
		$this->load->view('cab_booking_success',['bokkingDet' => $bokkingDet]);
	}

}
