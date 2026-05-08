<!DOCTYPE html>
<html>
<head>
	<title>Ads | Seller</title>
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
			            <h1 class="m-0 text-dark"><?php echo $sellerDet->store_name;?>'s Ads</h1>
			        </div>
			        <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="<?= base_url('admin/Dashboard');?>">Dashboard</a></li>
			              <li class="breadcrumb-item active"><?php echo $sellerDet->store_name;?>'s Ads</li>
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
				                <h3 class="card-title text-uppercase" style="line-height: 2.5em;font-weight: 700;">Ads</h3>
				                <?php
				                	$plan_id = $sellerDet->plan;
				                	$CI = &get_instance();
				                	$CI->load->model('admin/AdminDashboard_Model');
				                	$planDet = $CI->AdminDashboard_Model->getPlanDet($plan_id);
				                	$getnumberofrows = $CI->AdminDashboard_Model->getNumberofAds($sellerDet->id);
				                	if($planDet->amount == '0.00'){
				                		if($getnumberofrows == 1){
				                			echo "<span style='float:right;font-size:20px;color:red;'>This seller is in Free plan.Cant add ad more than one</span>";
				                		}else{
				                			?>
				                			<span style="float:right;"><a href="<?= base_url('admin/Advertisements/addAd/'.$sellerDet->id);?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Ad</a></span>
				                			<?php
				                		}
				                	}else{
				                		?>
				                		<span style="float:right;"><a href="<?= base_url('admin/Advertisements/addAd/'.$sellerDet->id);?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Ad</a></span>
				                		<?php
				                	}
				                ?>
				                 
				            </div>
				            <div class="card-body">		            	
				                <table id="ads" class="table table-bordered table-striped">
				                  	<thead>
					                  	<tr>
						                    <th>Id</th>
						                    <th>Ad Name</th>
						                    <th>Ad Validity</th>
						                    <th>Image</th>
						                    <th>Status</th>
						                    <th>Actions</th>
					                  	</tr>
				                  	</thead>
				                  	<tbody>
				                  		<?php
				                  		if(!empty($adsbySeller)){
				                  			$count = 1;
					                  		foreach ($adsbySeller as $ad) 
					                  		{
					                  		?>
						                  	<tr>
							                    <td><?php echo $count;?></td>
							                   	<td><?php echo $ad->ad_name;?></td>
							                   	<td><?php echo $ad->ad_validity." Day";?></td>
							                   	<td>
							                   		<?php if(!empty($ad->image)){
							                   		?>
							                   		<img src="<?= base_url('assets/front_assets/images/ads/'.$ad->image);?>" width="60px" class="adsimage">
							                   		<?php
							                   		}else{
							                   			echo "No Image";
							                   		}?>
							                   			
							                   	</td>
							                    <td>
							                    	<?php 
							                    	if($ad->status == 1){
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
							                    	<a href="<?= base_url('admin/Advertisements/editAd/'.$ad->id.'/'.$sellerDet->id);?>" target="_blank"><i class="fa fa-edit"></i></a>
							                    	|
							                    	<a href="<?= base_url('admin/Advertisements/deleteAd/'.$ad->id.'/'.$sellerDet->id);?>" target="_blank"><i class="fa fa-trash"></i></a>
							                    </td>
						                  	</tr>
						                <?php 
						            		$count++;
						            		}
						            	}else{
						            		?>
						            		<tr>
						            			<td>No Advertisements Found</td>
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
		$(document).ready(function () {
		    $("#ads").DataTable();
		    $('.card-body div').removeAttr( "id");
		    $('.adsimage').removeAttr("style");
		});
	</script>

</body>
</html>