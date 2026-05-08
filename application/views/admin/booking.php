<!DOCTYPE html>
<html>
<head>
	<title>Bookings | Admin</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/fontawesome-free/css/all.min.css');?>">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/dist/css/adminlte.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  	<link rel="stylesheet" href="<?= base_url('assets/panel_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<?php include APPPATH.'views/admin/includes/header.php';?>
	<?php include APPPATH.'views/admin/includes/sidebar.php';?>
  	<div class="content-wrapper">
  		<div class="content-header">
	      	<div class="container-fluid">
		        <div class="row mb-2">
			        <div class="col-sm-6">
			            <h1 class="m-0 text-dark">Booking</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Booking</li>
			            </ol>
			        </div>
		        </div>
	      	</div>
	    </div>
	    <section class="content">
      		<div class="container-fluid">
    			<div class="row">
    				<div class="col-md-12">
    					<?php
				    	if(!empty($this->session->userdata('error_message'))){
				    	?>
				    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  	<?php echo $this->session->userdata('error_message');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php }?>
						
						<?php
				    	if(!empty($this->session->userdata('success_message'))){
				    	?>
				    	<div class="alert alert-success alert-dismissible fade show" role="alert">
						  	<?php echo $this->session->userdata('success_message');?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php }?>
    				</div>
          			<div class="col-md-12">
          				<div class="card">
				            <div class="card-header">
				                <h3 class="card-title text-uppercase" style="line-height: 2.5em;font-weight: 700;">Bookings</h3>
				                
				            </div>
				            <div class="card-body">		            	
				                <table id="plans" class="table table-bordered table-striped">
				                  	<thead>
					                  	<tr>
						                    <th>Id</th>
						                    <th>From Address</th>
						                    <th>To Address</th>
						                    <th>Mobile No</th>
						                    <th>Trip Date</th>
						                    <th>status</th>
						                    <th>Available Worker</th>
						                    <th>Action</th>
					                  	</tr>
				                  	</thead>
				                  	<tbody>
				                  		<?php
				                  		if(!empty($booking)){
				                  			$count = 1;
					                  		foreach ($booking as $bookings) 
					                  		{
					                  		?>
						                  	<tr>
							                    <td><?php echo $count;?></td>
							                    <td>
							                    	<?php echo $bookings->from_address;?>
							                    </td>
							                    <td>
							                    	<?php echo $bookings->to_address;?>
							                    </td>
							                     <td>
							                    	<?php echo $bookings->mobile_no;?>
							                    </td>
							                     <td>
							                    	<?php echo $bookings->program_date;?>
							                    </td>
							                    
							                    <td>
							                    	<?php 
							                    	if($bookings->status == ''){
							                    		?>
								                    		<span class="badge badge-info">Pending</span>
							                    		
							                    		<?php
							                    	}else if($bookings->status == '2'){
							                    		?>
							                    		<span class="badge badge-warning">Assigned</span>
							                    	<?php
							                    	}else{
							                    	?>  
							                    		<span class="badge badge-success">Complete</span>
							                    	<?php } ?>                  	
							                    </td>
							                    <td>
							                    <?php 
						                    		if($bookings->status == ''){
						                    	?>
							                    <!-- <select id="worker" class="form-control">
							                    		<option>Select</option>
							                    		<?php 
							                    		
								                    		$CI =& get_instance();
								                          	$CI->load->model('work/WorkerDashboard_Model');
								                         	$AvailableWorker= $CI->WorkerDashboard_Model->getAvailableWorker();
									                        foreach ($AvailableWorker as $AvailableWorkers) {
									                     ?>
									                     <option value="<?php echo $AvailableWorkers->id?>"><?php echo $AvailableWorkers->name?></option>
									                 <?php  } ?>
							                    </select> -->
							                    -
							                    <input type="hidden" name="bid" id="bid" value="<?php echo $bookings->cid?>">
							                	<?php }else if($bookings->status == '2'){
							                	?>
							                			<p align="center">Work Assigned</p>
							                	<?php }else{ ?>
							                		<p align="center">Work Finished</p>
							                    <?php } ?>
							                    </td>
							                    <td align="center">
							                    	<a data-toggle="modal" data-target="#book1_<?php echo $bookings->id?>"><i class="far fa-edit"></i></a> | 
							                    	<a data-toggle="modal" data-target="#book_<?php echo $bookings->id?>" id="workAllocate"><i class="far fa-eye"></i></a>
							                    </td>
						                  	</tr>
						                  	<div class="modal fade" id="book1_<?php echo $bookings->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						                  		<div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLongTitle">Allocate Driver</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											      	<form action="<?php echo base_url('admin/Dashboard/assign_job/'.$bookings->cid)?>" method="post">
												        <div class="form-group">
												        	<label>Driver Name <span style="color: red">*</span></label>
												        	<input type="text" name="dname" id="dname" class="form-control" placeholder="Driver Name *">
												        </div>
												        <div class="form-group">
												        	<label>Driver Mobile No <span style="color: red">*</span></label>
												        	<input type="text" name="dmobile_no" id="dmobile_no" class="form-control" placeholder="Driver Mobile No *">
												        </div>
												        <div class="form-group">
												        	<label>Vehicle Name<span style="color: red">*</span></label>
												        	<input type="text" name="vname" id="vname" class="form-control" placeholder="Vehicle Name *">
												        </div>
												        <div class="form-group">
												        	<label>Vehicle No<span style="color: red">*</span></label>
												        	<input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="TN01 AB1234 *">
												        </div>
												        <div class="form-group text-center ">
												        	<button type="submit" class="btn btn-danger" style="width: 60%">Submit</button>
												        </div>
												    </form>
											        
											      </div>
											      
											    </div>
											  </div>
											</div>
		  
						                <?php 
						            		$count++;

						            		}
						            	}else{
						            		?>
						            		<tr>
						            			<td>No Plans Found</td>
						            		</tr>
						            		<?php
						            	}?>
				                  	</tbody>
				                </table>					            
				            </div>
            			</div>
          			</div>
			    </div>
			</div>

		</section>
  	</div>
  	<?php
  		foreach ($booking as $bookings) 
  		{
  		?>
  	 <div class="modal fade" id="book_<?php echo $bookings->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="text-center"> 
           	<?php
        		$CI =& get_instance(); 
              	$CI->load->model('admin/AdminDashboard_Model');
             	$userdetail= $CI->AdminDashboard_Model->getbookingDet($bookings->cid);
             	$workerdet= $CI->AdminDashboard_Model->getWorkerDet($bookings->worker_id);

                // echo $userdetail->username;

        	?>
           	<!-- <img src="<?php echo base_url('assets/front/images/profile/'.$userdetail->profile) ?>" style="    height: 124px;	"> -->

           </div>
            	
            <!-- <div class="text-center"> -->
            	<table class="table" align="center">
            		<tr>
	  				<td>Name :</td><td><?php  echo $userdetail->firstName.' '.$userdetail->lastName;?>	</td></tr>
	  				<tr><td> Email :</td><td><?php  echo $userdetail->email;?></td></tr>	
	  				<tr><td> Mobile No :</td><td><?php  echo $userdetail->mobile_no;?></td></tr>
	  				<tr><td> Driver Name :</td><td>
	  					<?php
	  						if($workerdet)
	  						{
	  							echo $workerdet->name;
	  						}else{
	  							echo "";
	  						}
	  					?>
	  				</td></tr>
	  				<tr><td> Status :</td>
	  					<td>
	  					<?php 
	                    	if($bookings->status == ''){
	                    		?>
		                    		<span class="badge badge-info">Pending</span>
	                    		
	                    		<?php
	                    	}else if($bookings->status == '2'){
	                    		?>
	                    		<span class="badge badge-warning">Assigned</span>
	                    	<?php
	                    	}else{
	                    	?>  
	                    		<span class="badge badge-success">Complete</span>
	                    	<?php } ?>
	  					 </td></tr>
	  					    <?php 
							if($bookings->status == 'cancel'){
								?>
								<tr><td>Cancel Reason</td><td><?php echo $bookings->comment?></td></tr>
							<?php }else{
								echo "";
							}

	  					 ?>
  				</table><HR>
  				
  			<!-- </div> -->
      			
        </div>

        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="cancel" class="btn btn-success">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
<?php } ?>
  	</div>
  	<?php include APPPATH.'views/admin/includes/footer.php';?>

	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>" ></script>
	<script src="<?= base_url('assets/panel_assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
	
	<script src="<?= base_url('assets/panel_assets/dist/js/adminlte.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/dist/js/demo.js');?>"></script>
	<script src="<?= base_url('assets/panel_assets/app.js');?>"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(function () {
		    $("#plans").DataTable();
		});

$(document).ready(function(){
		$("#worker").change(function(){
			var base_url = '<?php echo base_url('')?>';
			var wid = $('#worker').val();
			var bid = $('#bid').val();
 			// alert(wid);
		  	$.ajax({
            type: "POST", 
            url: base_url+"/admin/Dashboard/assign_job",
            data: { wid : wid,bid:bid },
            success: function(data){
             if(data == 'Mail Not Send')
             {
                alert(data);
                }else{
                swal({title: "Allocated Success", text: "Thank You", icon: "success", type: "success"})
                .then(function(){ 
                        location.reload();
                   }
                );
            }

            },error: function(error){
                alert(error);
            } 
        });
		});
	});
	</script>

</body>
</html>