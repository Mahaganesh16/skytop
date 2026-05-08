<!DOCTYPE html>
<html>
<head>
	<title>Sellers | Admin</title>
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
	<style type="text/css">
		.checked{ color:orange; }
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<?php include APPPATH.'views/admin/includes/header.php';?>
	<?php include APPPATH.'views/admin/includes/sidebar.php';?>
  	<div class="content-wrapper">
  		<div class="content-header">
	      	<div class="container-fluid">
		        <div class="row mb-2">
			        <div class="col-sm-6">
			            <h1 class="m-0 text-dark">Sellers</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Categories</li>
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
				                <h3 class="card-title text-uppercase" style="line-height: 2.5em;font-weight: 700;">Sellers</h3>
				            </div>
				            <div class="card-body">	
					            <form method='post' action='<?= base_url('admin/Seller/updateSellerStatus');?>'>	            	
					                <table id="sellers" class="table table-bordered table-striped">
					                  	<thead>
						                  	<tr>
						                  		<th>#</th>
							                    <th>Id</th>
							                    <th>Plan</th>
							                    <th>Category</th>
							                    <th>Sub Category</th>
							                    <th>Name</th>
							                    <th>Contact No</th>
							                    <th>Store Name</th>
							                    <th>Ads</th>
							                    <th>Status</th>
							                    <th>Action</th>
						                  	</tr>
					                  	</thead>
					                  	<tbody>
					                  		<?php
					                  		if(!empty($sellers)){
					                  			$count = 1;
						                  		foreach ($sellers as $seller) 
						                  		{
						                  		?>
							                  	<tr>
							                  		<td>
							                  			<input type='checkbox' name='users[]' value='<?php echo $seller->id; ?>'>
							                  		</td>
								                    <td><?php echo $count;?></td>
								                    <td>
								                    	<?php
								                    	$CI = &get_instance();
								                    	$CI->load->model('admin/AdminDashboard_Model');
								                    	$planDet = $this->AdminDashboard_Model->getPlanDet($seller->plan);
								                    	echo $planDet->plan_name;
								                    	?>
								                    </td>
								                    <td>
								                    	<?php 
								                    	$CI = &get_instance();
								                    	$CI->load->model('admin/AdminDashboard_Model');
								                    	$mainCategory = $CI->AdminDashboard_Model->getCategoryDet($seller->category);
								                    	echo $mainCategory->category_name;
								                    	?>
								                    </td>
								                    <td>
								                    	<?php 
								                    	$subCategory = $CI->AdminDashboard_Model->getCategoryDet($seller->sub_category);
								                    	echo $subCategory->category_name;
								                    	?>
								                    </td>
								                    <td>
								                    	<?php echo $seller->seller_name;?>
								                    </td>
								                    <td>
								                    	<?php echo $seller->seller_mobile;?>
								                    </td>
								                    <td>
								                    	<?php echo $seller->store_name;?>
								                    </td>
								                    
								                    <td>
								                    	<a href="<?= base_url('admin/Advertisements/adbySeller/'.$seller->id);?>" target="_blank"><i class="fa fa-images"></i> Ads</a>
								                    </td>
								                    <td>
								                    	<?php 
								                    	if($seller->status == 1){
								                    		?>
								                    		
									                    		<span class="badge badge-success">Active</span>
								                    		<?php
								                    	}else{
								                    		?>
								                    		
									                    		<span class="badge badge-danger">In Active</span>
									                    	
								                    		<?php
								                    	}
								                    	?>                    	
								                    </td>
								                    <td>
								                    	<a href="<?= base_url('admin/Seller/viewSeller/'.$seller->id);?>" target="_blank"><i class="fa fa-eye"></i></a>
								                    	<?php
								                    	if($adminDetails->type == 'super-admin'){
								                    	?>
								                    	|
								                    	<a href="<?= base_url('admin/Seller/deleteSeller/'.$seller->id);?>"><i class="fa fa-trash"></i></a>
								                    	<?php
								                    	}
								                    	?>
								                    </td>
							                  	</tr>
							                <?php 
							            		$count++;
							            		}
							            	}else{
							            		?>
							            		<tr>
							            			<td>No Seller Found</td>
							            		</tr>
							            		<?php
							            	}?>
					                  	</tbody>
					                  	<tfoot>
					                  		<div class="row">
					                  			<div class="form-group col-md-4">
								            		<select id="plans" name="plans" class="form-control">
								            			<option value="">Select Status</option>
								            			<?php
								            			if(!empty($plans)){
								            				foreach ($plans as $plan) {
								            				?>
								            				<option value="<?php echo $plan->id?>" <?php if($plan->id == $this->uri->segment(4)) echo "selected";?>><?php echo $plan->plan_name;?></option>
								            				<?php
								            				}
								            			}
								            			?>
								            		</select>
								            	</div>
								            	<div class="form-group col-md-4">
								            		<select id="status" name="status" class="form-control" required>
								            			<option value="">Select Status</option>
								            			<option value="0">In Active</option>
								            			<option value="1">Active</option>
								            		</select>
								            	</div>
								            	<div class="form-group col-md-4">
								            		<button type="submit" class="btn btn-primary">Update Status</button>
								            	</div>
								            </div>
					                  	</tfoot>
					                </table>	
					            </form>				            
				            </div>
            			</div>
          			</div>
			    </div>
			</div>
		</section>
  	</div>

  	</div>
  	<?php include APPPATH.'views/admin/includes/footer.php';?>

	<script src="<?= base_url('assets/panel_assets/plugins/jquery/jquery.min.js');?>"></script>
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
	<script type="text/javascript">
		$(function () {
		    $("#sellers").DataTable();
		});
	</script>

</body>
</html>