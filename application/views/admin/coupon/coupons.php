<!DOCTYPE html>
<html>
<head>
	<title>Coupons | Admin</title>
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
			            <h1 class="m-0 text-dark">Coupons</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active">Coupons</li>
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
				                <h3 class="card-title text-uppercase" style="line-height: 2.5em;font-weight: 700;">Coupons</h3>
				                <span style="float:right;"><a href="<?= base_url('admin/Coupons/addCoupon');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Coupon</a></span>
				            </div>
				            <div class="card-body">		            	
				                <table id="coupons" class="table table-bordered table-striped">
				                  	<thead>
					                  	<tr>
						                    <th>Id</th>
						                    <th>Coupon Name</th>
						                    <th>Coupon Code</th>
						                   
						                    <th>Action</th>
					                  	</tr>
				                  	</thead>
				                  	<tbody>
				                  		<?php
				                  		if(!empty($coupons)){
				                  			$count = 1;
					                  		foreach ($coupons as $coupon) 
					                  		{
					                  		?>
						                  	<tr>
							                    <td><?php echo $count;?></td>
							                   	<td><?php echo $coupon->coupon_name;?></td>
							                   	<td><?php echo $coupon->Coupon_code;?></td>
							                   
							                    <td>
							                    	<?php 
							                    	if($coupon->status == 1){
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
							                    	<a href="<?= base_url('admin/Coupons/editCoupon/'.$coupon->id);?>" target="_blank"><i class="fa fa-edit"></i></a>
							                    	|
							                    	<a href="<?= base_url('admin/Coupons/deleteCoupon/'.$coupon->id);?>"><i class="fa fa-trash"></i></a>
							                    </td>
						                  	</tr>
						                <?php 
						            		$count++;
						            		}
						            	}else{
						            		?>
						            		<tr>
						            			<td>No Coupons Found</td>
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
		    $("#coupons").DataTable();
		});
	</script>

</body>
</html>